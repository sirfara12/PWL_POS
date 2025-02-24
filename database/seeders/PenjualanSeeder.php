<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];
        for ($i = 1; $i <= 10; $i++) {
            $data[] = [
                'penjualan_id' => $i,
                'user_id' => 1,
                'pembeli' => 'Pelanggan ' . $i,
                'penjualan_kode' => 'PJ' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'penjualan_tanggal' => Carbon::now(),
            ];
        }

        DB::table('t_penjualan')->insert($data);
    }
}
