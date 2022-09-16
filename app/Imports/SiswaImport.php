<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel, WithHeadingRow, WithCalculatedFormulas
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $findSiswa = User::where('nisn', $row['nisn'])->first();
        if ($findSiswa) {
        } else {
            return new User([
                'nisn' => $row['nisn'],
                'name' => $row['nama'],
                'password' => Hash::make($row['password']),
                'kelas' => $row['kelas']
            ]);
        }
    }
}
