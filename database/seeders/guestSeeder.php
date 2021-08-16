<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class guestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('guests')->insert([
            'nama' => 'Maulana iqbal',
            'jenis_kel' => 'laki',
            'telepon' => '08123123123'
        ]);
    }
}
