<?php

namespace App\Imports;

use App\Models\Guest;
use Maatwebsite\Excel\Concerns\ToModel;

class TamuImport implements ToModel
{
    /**
    // * @param array $row
    *
    // * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Guest([
            //
            'nama' => $row[1],
            'jenis_kel' => $row[2],
            'telepon' => $row[3],
            'foto' => $row[4],
        ]);

    }
}
