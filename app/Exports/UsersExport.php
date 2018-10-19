<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UsersExport implements FromQuery, WithMapping, WithHeadings,WithColumnFormatting, ShouldAutoSize
{
    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */


    // public function collection()
    // {
    //     return User::all();
    // }

    // implement fromCollection
    // public function collection()
    // {
    //     return User::select('id','name')->where('id','>',25)->get();
    // }

    // implement fromQuery
    // public function query()
    // {
    //     return User::select('id','name')->where('id','>',25);
    // }

    public function query()
    {
        return User::where('id','>',25);
    }

    public function map($user): array
    {
        return [
            'custom text '.$user->name,
            Date::dateTimeToExcel($user->created_at),
            $user->email,
        ];
    }

    public function headings(): array
    {
        return [
            'Name',
            'Date',
            'Email',
        ];
    }

    public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }
}
