<?php

use Illuminate\Database\Seeder;

class PelangganTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pelanggan')->insert(
            ['id_user' => '1', 'nama_depan'=>'Jack', 'nama_belakang'=>'Pelanggan', 'alamat'=>'palawija', 'tempat_lahir'=>'palawija', 'tgl_lahir'=>'1990-10-10', 'status'=>1,'jenis_kelamin'=>1]
        );
    }
}
