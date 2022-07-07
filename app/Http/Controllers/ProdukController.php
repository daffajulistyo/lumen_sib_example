<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ProdukController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //

    }
    // Tamppil data
    public function index()
    {
        $produk = Produk::all();
        return response()->json(
            [
                'success' => true,
                'messaage' => 'Data Produk Berhasil Ditampilkan',
                'data' => $produk
            ],
            200
        );
    }

    //input data
    public function store(Request $request)
    {
        // validasi data
        $validator = Validator::make($request->all(), [
            'namaProduk' => 'required',
            'deskripsiProduk' => 'required',
            'hargaProduk' => 'required',
            'kategoriProduk' => 'required',

        ]);

        if ($validator->fails()) {

            return response()->json(
                [
                    'success' => false,
                    'message' => 'Semua Kolom Wajib Diisi',
                    'data' => $validator->errors(),
                ],
                401
            );
        } else {
            $produk = Produk::create([
                'namaProduk' => $request->input('namaProduk'),
                'deskripsiProduk' => $request->input('deskripsiProduk'),
                'hargaProduk' => $request->input('hargaProduk'),
                'kategoriProduk' => $request->input('kategoriProduk'),
            ]);
            if ($produk) {
                return response()->json(
                    [
                        'success' => true,
                        'messaage' => 'Data Produk Berhasil Ditambahkan',
                        'data' => $produk
                    ],
                    201
                );
            } else {
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'Produk Gagal Disimpan',

                    ],
                    400
                );
            }
        }
    }

    public function update(Request $request, $id)
    {
        // validasi data
        $validator = Validator::make($request->all(), [
            'namaProduk' => 'required',
            'deskripsiProduk' => 'required',
            'hargaProduk' => 'required',
            'kategoriProduk' => 'required',

        ]);

        if ($validator->fails()) {

            return response()->json(
                [
                    'success' => false,
                    'message' => 'Semua Kolom Wajib Diisi',
                    'data' => $validator->errors(),
                ],
                401
            );
        } else {
            $produk = Produk::whereId($id)->update([
                'namaProduk' => $request->input('namaProduk'),
                'deskripsiProduk' => $request->input('deskripsiProduk'),
                'hargaProduk' => $request->input('hargaProduk'),
                'kategoriProduk' => $request->input('kategoriProduk')
            ]);

            if ($produk) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Produk Berhasil Di Update',
                    'data' => $produk
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Produk Gagal Di Update',

                ], 400);
            }
        }
    }

    public function destroy($id)
    {
        $produk = Produk::whereId($id)->first();
        $produk->delete();
        if ($produk) {
            return response()->json([
                'success' => true,
                'message' => 'Produk Berhasil Dihapus!',
            ], 200);
        }
    }
}
