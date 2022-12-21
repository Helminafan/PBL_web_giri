<?php

namespace App\Http\Controllers;

use App\Exports\Admin\MultipleExport;
use App\Exports\KelurahanExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
public function export()
{
        $data = Excel::download(new MultipleExport, 'DataWargaMiskin.xlsx');
        ob_end_clean();
        return $data;
}
}
