<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('produk')->insert(
            [
                [
                    'namaProduk' => 'Mie Goreng',
                    'deskripsiProduk' => 'Mie goreng adalah makanan yang terbuat dari daging sapi yang diperebus dan dihaluskan serta disirup dengan bumbu-bumbu yang dapat dikombinasikan dengan bahan lain seperti telur, sayur, atau biji-bijian.',
                    'hargaProduk' => 10000,
                    'kategoriProduk' => 'makanan',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                [
                    'namaProduk' => 'Nasi Goreng',
                    'deskripsiProduk' => 'Nasi goreng adalah makanan yang terbuat dari daging sapi yang diperebus dan dihaluskan serta disirup dengan bumbu-bumbu yang dapat dikombinasikan dengan bahan lain seperti telur, sayur, atau biji-bijian.',
                    'hargaProduk' => 10000,
                    'kategoriProduk' => 'makanan',
                    'created_at' => null,
                    'updated_at' => null,
                ],
                
                
            ]
        );
    }
}
