<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */


    // public function collection()
    // {
    //     return User::all();
    // }

    private $user;

    public function collection()
    {
        return $this->$user = User::all();
    }

    public function map($user): array
    {
        return [
            $this->$user->invoice_number,
            Date::dateTimeToExcel($invoice->created_at),
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Name',
            'Email',
            'Created At',
            'Updated At',
        ];
    }
}
