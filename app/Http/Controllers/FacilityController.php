<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function index()
    {
        $facilities = Facility::all();

        return view('facility.index', compact('facilities'));
    }

    // function store untuk menyimpan data ke table
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'name' => 'required|string|min:3',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        // insert data ke table brands
        $facility = Facility::create([
            'nama' => $request->name,
        ]);

        // alihkan halaman ke halaman brands
        return redirect()->route('facility.index');
    }

    // function edit untuk menampilkan form edit data
    public function edit($id)
    {
        // cari data berdasarkan id menggunakan find()
        // find() merupakan fungsi eloquent untuk mencari data berdasarkan primary key
        $facility = Facility::find($id);

        // load view edit.blade.php dan passing data brand
        return view('facility.edit', compact('facility'));
    }

    // function update untuk mengupdate data yang sudah ada
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(),[
            'name' => 'required|string|min:3',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        // update data brands
        Facility::where('id', $id)->update([
            'nama' => $request->name,
        ]);

        // alihkan halaman ke halaman brands
        return redirect()->route('facility.index');
    }

    // function destroy untuk menghapus data yang sudah ada
    public function destroy($id)
    {
        // ambil data category berdasarkan id
        $facility = Facility::find($id);

        // hapus data category
        $facility->delete();

        // alihkan halaman ke halaman brands
        return redirect()->route('facility.index');
    }
}
