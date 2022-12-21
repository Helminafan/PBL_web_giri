<?php

namespace App\Exports\Admin;

use App\Models\warga;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\FromCollection;

class JembersariExport implements FromQuery, WithMapping, ShouldAutoSize, WithTitle, WithHeadings, WithEvents
{
    use Exportable;
    public function query()
    {
        return warga::query()->where('kelurahan', '=', 'Jembersari');
    }
    public function map($warga): array
    {
        return [
            $warga->nik,
            $warga->nama_warga,
            $warga->alamat,
            $warga->kelurahan,
            $warga->no_hp
        ];
    }
    public function headings(): array
    {
        return [
            'No KK',
            'Nama Warga',
            'Alamat',
            'Kelurahan',
            'Nomor Handphone'
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:E1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);
            }
        ];
    }
    public function title(): string
    {
        return "Jembersari";
    }
}
