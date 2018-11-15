<?php

namespace App\Exports;


use App\Dot;
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

class DotExport implements FromQuery, WithMapping, WithHeadings,WithColumnFormatting, ShouldAutoSize
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
        return Dot::where('created_at','>=',$this->startDate)->where('created_at','<=',$this->endDate);
    }

    public function map($dot): array
    {

        /*
        protected $fillable = ['size', 'hydro_or_expand','factory_name'
        ,'retest_date','manu_month','manu_year'
        ,'serial_number','manufacturer_name'
        ,'pass_or_not','volumn1','volumn2'];
        */

        return [
            ''.$dot->id,
            $dot->serial_number,
            Date::dateTimeToExcel($dot->weld_date),
            empty($dot->fg_date)?"":Date::dateTimeToExcel($dot->fg_date),
            $dot->customer->customer_name,
            $dot->customer->size,
            $dot->top,
            $dot->bottom,
            $dot->spud,
            $dot->collar,
            $dot->footring,
            $dot->circle,
            $dot->longitudinal,
            $dot->tare_weight,
            $dot->user->name,
            empty($dot->user_key_fg)?"":$dot->user_key_fg->name,
            Date::dateTimeToExcel($dot->created_at),
            Date::dateTimeToExcel($dot->updated_at),
        ];
    }

    public function headings(): array
    {
        return [
            'Id',
            'Serial Nr.',
            'Welding Date',
            'FG Date',
            'Customer Name',
            'Size',
            'Top',
            'Bottom',
            'Spud',
            'Collar',
            'Footring',
            'Circle',
            'Longitudinal',
            'Tare Weight',
            'Welding User',
            'FG Key-In User',
            'Created_at',
            'Updated_at',
        ];
    }

    public function columnFormats(): array
    {
        return [
            'C' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'D' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'Q' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'R' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }
}
