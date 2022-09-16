<?php

namespace App\Http\Controllers;

use App\Imports\SiswaImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends ResponseController
{
    public function userImport(Request $request)
    {

        $this->validate($request, [
            'file' => 'required|mimes:csv,xlsx,xls'
        ]);

        $file = $request->file('file');

        $fileName = str_replace([' ', '-'], '_',  rand() . $file->getClientOriginalName());
        $file->storeAs('public/import_siswa', $fileName);

        Excel::import(new SiswaImport, $file);

        return $this->successResponse('', 'Message successfully upload');
    }
}
