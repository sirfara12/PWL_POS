<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['barang_id' => 1, 'kategori_id' => 1, 'barang_kode' => 'TV001', 'barang_nama' => 'Televisi', 'harga_beli' => 2000000, 'harga_jual' => 2500000],
            ['barang_id' => 2, 'kategori_id' => 1, 'barang_kode' => 'HP001', 'barang_nama' => 'Handphone', 'harga_beli' => 3000000, 'harga_jual' => 3500000],
            ['barang_id' => 3, 'kategori_id' => 2, 'barang_kode' => 'BJS001', 'barang_nama' => 'Baju Kemeja', 'harga_beli' => 150000, 'harga_jual' => 200000],
            ['barang_id' => 4, 'kategori_id' => 2, 'barang_kode' => 'CD001', 'barang_nama' => 'Celana Jeans', 'harga_beli' => 180000, 'harga_jual' => 220000],
            ['barang_id' => 5, 'kategori_id' => 3, 'barang_kode' => 'MIE001', 'barang_nama' => 'Mie Instan', 'harga_beli' => 2500, 'harga_jual' => 3500],
            ['barang_id' => 6, 'kategori_id' => 3, 'barang_kode' => 'NAS001', 'barang_nama' => 'Nasi Kotak', 'harga_beli' => 15000, 'harga_jual' => 20000],
            ['barang_id' => 7, 'kategori_id' => 4, 'barang_kode' => 'PN001', 'barang_nama' => 'Pulpen', 'harga_beli' => 2000, 'harga_jual' => 5000],
            ['barang_id' => 8, 'kategori_id' => 4, 'barang_kode' => 'BKU001', 'barang_nama' => 'Buku Tulis', 'harga_beli' => 10000, 'harga_jual' => 15000],
            ['barang_id' => 9, 'kategori_id' => 5, 'barang_kode' => 'SPT001', 'barang_nama' => 'Sepatu Sneakers', 'harga_beli' => 300000, 'harga_jual' => 400000],
            ['barang_id' => 10, 'kategori_id' => 5, 'barang_kode' => 'SPT002', 'barang_nama' => 'Sepatu Formal', 'harga_beli' => 500000, 'harga_jual' => 600000],
        ];

        DB::table('m_barang')->insert($data);
    }
}
