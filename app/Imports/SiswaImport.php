<?php

namespace App\Imports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;

class SiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Siswa([
            //
            'siswa_id' => $row[0],
            'nis'     => $row[1],
            'nisn'    => $row[2],
            'nama_siswa'    => $row[3],
            'kelas_id'    => $row[4],
            'alamat'    => $row[5],
            'no_hp'    => $row[6],
            'status_siswa'    => $row[7],
        ]);
    }
}
