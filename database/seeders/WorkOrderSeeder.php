<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('work_orders')->insert([
            'name_req' => 'Harianto',
            'dept' => 'HRGA',
            'priority' => 'Urgent',
            'name_receipt' => 'Joko R',
            'issue' => 'Pembuatan Kopi',
            'action' => 'Beli kopi di ALFA',
            'status' => ''
        ]);
    }
}
