<?php

namespace App\Exports\Admin;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
class MultipleExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        $sheets = [
            new BoyolanguExport(),
            new MojopanggungExport(),
            new GiriExport(),
            new GrogolExport(),
            new JembersariExport(),
            new PenatabanExport(),
        ];
        return $sheets;
    }
}
