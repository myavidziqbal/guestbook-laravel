<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'nosurat' => 'xxxx/xxx/xxxx',
            'pengirim' => 'PT.xxxxxxxx',
            'penerima' => 'Omad',
            'tujuan' => 'sample',
        ]);
    }
}
