<?php
namespace Jobcerto\NovaImportCard\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Jobcerto\NovaImportCard\Models\Import;
use Maatwebsite\Excel\Facades\Excel;

class ImportsController
{
    public function store(Request $request)
    {
        $model = app($request->using);

        $columns = explode(',', $request->columns);

        Excel::import(new Import($model, $columns), $request->file('file'));

        return response()->json(['success' => 'Importação realizada com successo']);
    }
}
