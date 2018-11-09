<?php

namespace App\Http\Controllers;

use App\Dot;
use App\Customer;

use Illuminate\Http\Request;
use App\Http\Requests\AskQuestionRequest;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\InspectionsExport;
use App\Exports\UsersExport;
use Session;

class DotController extends Controller
{

    public function __construct() {
        // $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        // $questions = Question::with('user')->latest()->paginate(10);

        return view('dot.index') ->with('dotArray',Dot::orderby('updated_at', 'desc')->take(10)->get())
                                ->with('customerActiveArray',Customer::where('isActive', 'Y')->orderby('customer_name','asc')->get())
                                ->with('dateShow',Carbon::now());

    }
    public function show_fg()
    {
        $dotArray = Dot::whereNotNull('user_key_fg_id')->orderby('updated_at', 'desc')->take(10)->get();
        // dd($dotArray);
        return view('dot.show_fg') ->with('dotArray',$dotArray)
                                ->with('customerActiveArray',Customer::where('isActive', 'Y')->orderby('customer_name','asc')->get())
                                ->with('dateShow',Carbon::now());

    }

    public function fg_store(Request $request)
    {
        // dd($request->all());
        if($request->user()==null){

            Session::flash('error', 'Please Login');

            return view('login');
        }else{


            $request->validate([
                'customer_id' => 'required',
                'serial_number' => 'required',
                'tare_weight' => 'required',

            ]);

            //check duplicate serial_number customer_id
            $dotObj = Dot::where([
                ['customer_id', '=', $request->customer_id],
                ['serial_number', '=', $request->serial_number]
            ])->get();

            if($dotObj->count()==1){

                // update data
                $dotObj[0]->fg_date       = Carbon::now();
                $dotObj[0]->tare_weight   = $request->tare_weight;
                $dotObj[0]->user_key_fg_id  = $request->user()->id;
                $dotObj[0]->save();

                Session::flash('success', 'Successfully added Data');

                $dotArray = Dot::whereNotNull('user_key_fg_id')->orderby('updated_at', 'desc')->take(10)->get();

                return view('dot.show_fg') ->with('dotArray',$dotArray)
                                ->with('customerActiveArray',Customer::where('isActive', 'Y')->orderby('customer_name','asc')->get())
                                ->with('customer_id_send_back',$request->customer_id)
                                ->with('dateShow',Carbon::now());


            }else{

                //insert data or check
                /*
                $dot = new Dot();
                $dot->serial_number = $request->serial_number;
                $dot->weld_date     = Carbon::now();
                $dot->fg_date       = Carbon::now();
                $dot->tare_weight   = $request->tare_weight;
                $dot->customer_id   = $request->customer_id;
                $dot->top           = $request->top;
                $dot->bottom        = $request->bottom;
                $dot->spud          = $request->spud;
                $dot->collar        = $request->collar;
                $dot->footring      = $request->footring;
                $dot->circle        = $request->circle;
                $dot->longitudinal  = 0;
                $dot->user_id       = $request->user()->id;

                $dot->save();

                */
                Session::flash('error', 'No serial matched !!');


                $dotArray = Dot::whereNotNull('user_key_fg_id')->orderby('updated_at', 'desc')->take(10)->get();

                return view('dot.show_fg') ->with('dotArray',$dotArray)
                                ->with('customerActiveArray',Customer::where('isActive', 'Y')->orderby('customer_name','asc')->get())
                                ->with('dateShow',Carbon::now());

            }



        }
    }

    public function data()
    {
        // $questions = Question::with('user')->latest()->paginate(10);
        // $posts = Post::orderBy('id', 'desc')->paginate(6);
        $dotArray = Dot::orderBy('updated_at', 'desc')->paginate(10);


        return view('dot.data') ->with('dotArray',$inspectionArray);

    }
    /*
    public function exportInspection(Request $request)
    {
        return Excel::download(new InspectionsExport($request), 'inspections.xlsx');
    }

    public function exportUser()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
    */
    public function destroy(Dot $dot)
    {
        // $questions = Question::with('user')->latest()->paginate(10);
        $dot->delete();
        Session::flash('success', 'You succesfully delete data.');

        return view('dot.index') ->with('dotArray',Dot::orderby('updated_at', 'desc')->take(10)->get())
                                 ->with('customerActiveArray',Customer::where('isActive', 'Y')->orderby('customer_name','asc')->get())
                                 ->with('dateShow',Carbon::now());

    }

    public function store(Request $request)
    {


        // dd($request->all());
        if($request->user()==null){

            Session::flash('error', 'Please Login');

            return view('login');
        }else{


            $request->validate([
                'customer_id' => 'required',
                'serial_number' => 'required',
                'top' => 'required',
                'bottom' => 'required',
                'spud' => 'required',
                'collar' => 'required',
                'footring' => 'required',
                'circle' => 'required',
            ]);

            //check duplicate serial_number customer_id
            $dotObj = Dot::where([
                ['customer_id', '=', $request->customer_id],
                ['serial_number', '=', $request->serial_number]
            ])->get();

            if($dotObj->count()>=1){
                Session::flash('error', 'Your serial number is duplicated');
                return view('dot.index')->with('dotArray',Dot::orderby('updated_at', 'desc')->take(10)->get())
                                        ->with('circle_send_back',$request->circle)
                                        ->with('customer_id_send_back',$request->customer_id)
                                        ->with('customerActiveArray',Customer::where('isActive', 'Y')->orderby('customer_name','asc')->get())
                                        ->with('dateShow',Carbon::now());


            }else{
                //insert data
                $dot = new Dot();
                $dot->serial_number = $request->serial_number;
                $dot->weld_date     = Carbon::now();
                $dot->fg_date       = null;
                $dot->tare_weight   = 0.0;
                $dot->customer_id   = $request->customer_id;
                $dot->top           = $request->top;
                $dot->bottom        = $request->bottom;
                $dot->spud          = $request->spud;
                $dot->collar        = $request->collar;
                $dot->footring      = $request->footring;
                $dot->circle        = $request->circle;
                $dot->longitudinal  = 0;
                $dot->user_id       = $request->user()->id;
                $dot->user_key_fg_id  = null;

                $dot->save();
                Session::flash('success', 'Your data has been submitted');
                return view('dot.index')->with('dotArray',Dot::orderby('updated_at', 'desc')->take(10)->get())
                                        ->with('circle_send_back',$request->circle)
                                        ->with('customer_id_send_back',$request->customer_id)
                                        ->with('customerActiveArray',Customer::where('isActive', 'Y')->orderby('customer_name','asc')->get())
                                        ->with('dateShow',Carbon::now());

            }



        }

    }


}
