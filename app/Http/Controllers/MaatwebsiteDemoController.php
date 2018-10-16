<?php

namespace App\Http\Controllers;

use App\Item;

use DB;

// use Excel;

use Illuminate\Http\Request;

use App\Exports\UsersExport;

use Maatwebsite\Excel\Facades\Excel;

class MaatwebsiteDemoController extends Controller
{
        /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function importExport()

    {

        return view('importExport');

    }



    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function downloadExcel($type)

    {

        $data = Item::get()->toArray();

        // dd($data);

        return Excel::download('test_example', function($excel) use ($data) {

            $excel->sheet('mySheet', function($sheet) use ($data)

            {

                $sheet->fromArray($data);

            });

        })->download($type);

    }


    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function importExcel(Request $request)

    {

        $request->validate([

            'import_file' => 'required'

        ]);



        $path = $request->file('import_file')->getRealPath();

        $data = Excel::load($path)->get();



        if($data->count()){

            foreach ($data as $key => $value) {

                $arr[] = ['title' => $value->title, 'description' => $value->description];

            }



            if(!empty($arr)){

                Item::insert($arr);

            }

        }



        return back()->with('success', 'Insert Record successfully.');

    }


    public function exportUser()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function exportUserByExportable()
    {
        return (new UsersExport)->download('users_exportable.xlsx');
    }

    public function export(Excel $excel, UsersExport $export)
    {
        return $excel->download($export, 'invoices.xlsx');
    }

    public function exportExamplePhpSpreadSheet()
    {
        return view('inspection.showExcel');
    }



}
