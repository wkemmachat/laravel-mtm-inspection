<?php

namespace App\Exports;

use App\Inspection;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class InspectionsExport implements FromQuery, WithMapping, WithHeadings,WithColumnFormatting, ShouldAutoSize
{
    use Exportable;

    protected $startDate;
    protected $endDate;

    public function __construct($request)
    {
        $this->startDate = Carbon::createFromFormat('d-m-Y', $request->startDate)->format('Y-m-d');
        $this->endDate = Carbon::createFromFormat('d-m-Y', $request->endDate)->format('Y-m-d');

        // $this->startDate = $request->startDate;
        // $this->endDate = $request->endDate;
        // dd($request->startDate);
    }



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
        return Inspection::where('retest_date','>=',$this->startDate)->where('retest_date','<=',$this->endDate);
    }

    public function map($inspection): array
    {

        /*
        protected $fillable = ['size', 'hydro_or_expand','factory_name'
        ,'retest_date','manu_month','manu_year'
        ,'serial_number','manufacturer_name'
        ,'pass_or_not','volumn1','volumn2'];
        */

        return [
            ''.$inspection->id,
            $inspection->size,
            $inspection->factory_name,
            $inspection->hydro_or_expand,
            Date::dateTimeToExcel($inspection->retest_date),
            $inspection->manu_month_year,
            $inspection->serial_number,
            $inspection->manufacturer_name,
            $inspection->volumn1,
            $inspection->volumn2,
            $inspection->pass_or_not,
            $inspection->user->name,
            Date::dateTimeToExcel($inspection->created_at),

        ];
    }

    public function headings(): array
    {
        return [
            'Id',
            'Size',
            'Factory_name',
            'Hydro_or_expand',
            'Retest Date',
            'Manufacturing Date',
            'Serial Nr.',
            'Manufacturing Name',
            'Volumn1',
            'Volumn2',
            'Pass Or Not',
            'User',
            'Created_at',
        ];
    }

    public function columnFormats(): array
    {
        return [
            'E' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'M' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }
}
