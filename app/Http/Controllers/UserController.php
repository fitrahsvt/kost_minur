<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Mendapatkan input filter dari request
        $search = $request->input('search'); // Filter berdasarkan nama
        $jenis = $request->input('jenis');   // Filter berdasarkan status (aktif atau non-aktif)
        $roomId = $request->input('room');   // Filter berdasarkan kamar

        // Query dasar mengambil data user dengan relasi role dan room
        $query = User::with('role', 'room');

        // Jika ada input pencarian nama, tambahkan ke query
        if ($search) {
            $query->where('nama', 'like', '%' . $search . '%');
        }

        // Jika ada filter jenis, sesuaikan query berdasarkan status penyewa
        if ($jenis === 'regular') {
            $query->where('jenis_penyewa', 'regular'); // Anggap yang 'aktif' adalah yang memiliki kamar
        } elseif ($jenis === 'expired') {
            $query->where('jenis_penyewa', 'expired'); // Anggap yang 'non-aktif' adalah yang tidak memiliki kamar
        }

        // Jika ada filter kamar, tambahkan ke query
        if ($roomId) {
            $query->where('kamar_id', $roomId);
        }

        // Mengambil data users dengan paginasi setelah semua filter diterapkan
        $users = $query->paginate(10);

        // Mengambil semua data rooms untuk dropdown
        $rooms = Room::all();

        // Menghitung jumlah role untuk keperluan tampilan
        $rolecount = Role::count();

        // Mengirim data ke view
        return view('user.index', compact('users', 'rooms', 'search', 'jenis', 'roomId', 'rolecount'));
    }

    public function create()
    {
        $role = Role::all();
        return view('user.create', compact('role'));
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'role' => 'required',
            'nama' => 'required|string|min:3',
            'email' => 'required|email|unique:users',
            'no_hp' => 'required',
            'password' => 'required|string|min:8',
            'alamat' => 'required|string|min:10',
            'birth' => 'required',
            'ktp' => 'required|image|mimes:jpeg,png,jpg,jfif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        // ubah nama file gambar dengan angka random
        $imageName = time().'.'.$request->ktp->extension();

        // upload file gambar ke folder slider
        Storage::putFileAs('public/user', $request->file('ktp'), $imageName);

        $user = User::create([
            'role_id' => $request->role,
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'password' => Hash::make($request->password),
            'ktp' => $imageName,
            'alamat' => $request->alamat,
            'birth' => $request->birth
        ]);
        return redirect()->route('user.index');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $role = Role::all();
        return view('user.edit', compact('user', 'role'));
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(),[
            'role' => 'required',
            'nama' => 'required|string|min:3',
            'no_hp' => 'required',
            'password' => 'required|string|min:8',
            'alamat' => 'required|string|min:10',
            'birth' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        if ($request->hasFile('ktp')) {
            // ambil nama file gambar lama dari database
            $gambar_lama = User::find($id)->ktp;

            //hapus file gambar lama
            Storage::delete('public/user/'.$gambar_lama);

            // ubah nama file gambar dengan angka random
            $imageName = time().'.'.$request->ktp->extension();

            // upload file gambar ke folder slider
            Storage::putFileAs('public/user', $request->file('ktp'), $imageName);

            User::where('id', $id)->update([
                'role_id' => $request->role,
                'nama' => $request->nama,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'password' => $request->password,
                'ktp' => $imageName,
                'alamat' => $request->alamat,
                'birth' => $request->birth
            ]);

        }else{
            User::where('id', $id)->update([
                'role_id' => $request->role,
                'nama' => $request->nama,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'password' => $request->password,
                'alamat' => $request->alamat,
                'birth' => $request->birth
            ]);
        }

        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        Storage::delete('public/user/'.$user->ktp);

        User::where('id', $id)->delete();
        return redirect()->route('user.index');
    }

    public function editprofile($id){
        $user = User::find($id);
        return view('user.editprofile', compact('user'));
    }

    public function updateprofile(Request $request, $id)
    {

        $validator = Validator::make($request->all(),[
            'alamat' => 'required|string|min:10',
            'birth' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        if ($request->hasFile('ktp')) {
            // ambil nama file gambar lama dari database
            $gambar_lama = User::find($id)->ktp;

            //hapus file gambar lama
            Storage::delete('public/user/'.$gambar_lama);

            // ubah nama file gambar dengan angka random
            $imageName = time().'.'.$request->ktp->extension();

            // upload file gambar ke folder slider
            Storage::putFileAs('public/user', $request->file('ktp'), $imageName);

            User::where('id', $id)->update([
                'ktp' => $imageName,
                'alamat' => $request->alamat,
                'birth' => $request->birth
            ]);

        }else{
            User::where('id', $id)->update([
                'alamat' => $request->alamat,
                'birth' => $request->birth
            ]);
        }

        return redirect()->route('dashboard');
    }

    public function detail($id)
    {
        $user = User::with('role', 'room')->find($id);

        return view('user.detail', compact('user'));
    }

}
