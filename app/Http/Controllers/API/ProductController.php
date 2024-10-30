<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return response()->json([
            'success' => true,
            'message' => 'Daftar data product',
            'data' => $products
        ], 200);
    }

    public function show($id)
    {
        $product = Product::find($id);

        if ($product) {
            return response()->json([
                'success' => true,
                'message' => 'Daftar data product',
                'data' => $product
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Data product tidak ditemukan',
                'data' => ''
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'category' => 'required',
            'name' => 'required|string|min:3',
            'price' => 'required|integer',
            'brand' => 'required',
            'desc' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Data yang dikirim tidak valid',
                'data' => $validator->errors()
            ], 401);
        }
        $product = Product::create([
            'category_id' => $request->category,
            'name' => $request->name,
            'image' => '1686536852.jpg',
            'desc' => $request->desc,
            'price' => $request->price,
            'brand_id' => $request->brand,
            'created_by' => 2,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditambahkan',
            'data' => $product
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $validator = Validator::make($request->all(),[
            'category' => 'required',
            'name' => 'required|string|min:3',
            'price' => 'required|integer',
            'brand' => 'required|string',
            'desc' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Data yang dikirim tidak valid',
                'data' => $validator->errors()
            ], 422);
        }
        if ($product) {
            $products = $product->update([
                'category_id' => $request->category,
                'name' => $request->name,
                'image' => '1686536852.jpg',
                'desc' => $request->desc,
                'price' => $request->price,
                'brand_id' => $request->brand,
                'created_by' => 2,
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil diupdate',
                'data' => $product
            ], 200);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Product tidak ditemukan',
                'data' => ''
            ], 404);
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data berhasil dihapus',
                'data' => null
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Product tidak ditemukan',
                'data' => ''
            ], 404);
        }
    }
}
