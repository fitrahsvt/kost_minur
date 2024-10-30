<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        // Mendapatkan semua fasilitas untuk dropdown
        $facilities = Facility::all();

        // Filter berdasarkan fasilitas (jika ada)
        $facilityId = $request->get('facility_id');
        $priceOrder = $request->get('price_order'); // Mendapatkan filter urutan harga

        $rooms = Room::with('facilities');

        // Jika filter fasilitas dipilih
        if ($facilityId) {
            $rooms = $rooms->whereHas('facilities', function ($query) use ($facilityId) {
                $query->where('facilities.id', $facilityId);
            });
        }

        // Jika filter urutan harga dipilih
        if ($priceOrder) {
            $rooms = $rooms->orderBy('harga', $priceOrder === 'high' ? 'desc' : 'asc');
        }

        // Dapatkan semua data kamar berdasarkan filter yang diterapkan
        $rooms = $rooms->get();

        return view('room.index', compact('rooms', 'facilities', 'facilityId', 'priceOrder'));
    }

    public function show($id)
    {
        $room = Room::where('id', $id)->with('facilities')->first();

        $related = Room::where('status_ketersediaan', 'ada')->where('harga', $room->harga)->inRandomOrder()->limit(4)->get();

        if ($room) {
            return view('room.show', compact('room', 'related'));
        } else {
            abort(404);
        }

    }

    public function create()
    {
        $facilities = Facility::all(); // Mengambil semua fasilitas dari database
        return view('room.create', compact('facilities'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nomor' => 'required|integer|unique:rooms,nomor',
            'ukuran' => 'required|string|min:3',
            'harga' => 'required|integer',
            'foto' => 'required|image|mimes:jpeg,png,jpg,jfif|max:2048',
            'facilities' => 'nullable|array',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        // ubah nama file gambar dengan angka random
        $fotoName = time().'.'.$request->foto->extension();

        // upload file gambar ke folder room
        Storage::putFileAs('public/room', $request->file('foto'), $fotoName);

        // insert data ke table rooms
        $room = Room::create([
            'nomor' => $request->nomor,
            'ukuran' => $request->ukuran,
            'harga' => $request->harga,
            'foto' => $fotoName,
        ]);

        if ($request->has('facilities')) {
            $room->facilities()->attach($request->input('facilities'));
        }

        // alihkan halaman ke halaman room.index
        return redirect()->route('room.index')->with('success', 'Room created successfully!');
    }

    public function destroy($id)
    {
        $room = Room::find($id);

        // Hapus relasi di tabel pivot
        $room->facilities()->detach();

        // Hapus gambar dari storage
        Storage::delete('public/room/'.$room->foto);

        // Hapus data kamar
        $room->delete();

        return redirect()->route('room.index')->with('success', 'Room deleted successfully');
    }

    public function edit($id)
    {
        $facilities = Facility::all();
        $room = Room::with('facilities')->find($id); // pastikan room memuat fasilitas yang terkait
        return view('room.edit', compact('room', 'facilities'));
    }

    public function update(Request $request, $id)
    {
        // Validasi
        $validator = Validator::make($request->all(),[
            'nomor' => 'required|integer|unique:rooms,nomor,'.$id,
            'ukuran' => 'required|string|min:3',
            'harga' => 'required|integer',
            'foto' => 'image|mimes:jpeg,png,jpg,jfif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        // Cek apakah ada upload gambar
        if ($request->hasFile('foto')) {
            // Ambil nama file gambar lama dari database
            $gambar_lama = Room::find($id)->foto;

            // Hapus file gambar lama
            Storage::delete('public/room/'.$gambar_lama);

            // Ubah nama file baru
            $fotoName = time().'.'.$request->foto->extension();

            // Upload file baru
            Storage::putFileAs('public/room', $request->file('foto'), $fotoName);

            // Update data kamar termasuk foto
            Room::where('id', $id)->update([
                'nomor' => $request->nomor,
                'ukuran' => $request->ukuran,
                'harga' => $request->harga,
                'foto' => $fotoName,
            ]);
        } else {
            // Update data kamar tanpa foto
            Room::where('id', $id)->update([
                'nomor' => $request->nomor,
                'ukuran' => $request->ukuran,
                'harga' => $request->harga,
            ]);
        }

        // Update fasilitas
        $room = Room::find($id);

        // Jika ada fasilitas yang dipilih, update hubungan many-to-many
        if ($request->has('facilities')) {
            // Sync fasilitas, mengganti semua fasilitas lama dengan yang baru
            $room->facilities()->sync($request->facilities);
        } else {
            // Jika tidak ada fasilitas yang dipilih, kosongkan semua fasilitas yang terhubung
            $room->facilities()->sync([]);
        }

        return redirect()->route('room.index')->with('success', 'Room updated successfully');
    }

}
