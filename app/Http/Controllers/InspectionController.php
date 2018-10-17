<?php

namespace App\Http\Controllers;

use App\Question;
use App\Inspection;

use Illuminate\Http\Request;
use App\Http\Requests\AskQuestionRequest;
use Carbon\Carbon;

use Session;

class InspectionController extends Controller
{

    public function __construct() {
        // $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        // $questions = Question::with('user')->latest()->paginate(10);

        return view('inspection.index') ->with('inspectionArray',Inspection::orderby('created_at', 'desc')->take(2)->get());

    }

    public function data()
    {
        // $questions = Question::with('user')->latest()->paginate(10);
        // $posts = Post::orderBy('id', 'desc')->paginate(6);
        $inspectionArray = Inspection::orderBy('created_at', 'desc')->paginate(2);


        return view('inspection.data') ->with('inspectionArray',$inspectionArray);

    }

    public function destroy(Inspection $inspection)
    {
        // $questions = Question::with('user')->latest()->paginate(10);
        $inspection->delete();
        Session::flash('success', 'You succesfully delete data.');

        return view('inspection.index') ->with('inspectionArray',Inspection::orderby('created_at', 'desc')->take(2)->get());


    }

    public function store(Request $request)
    {
        /*
        protected $fillable = ['size', 'hydro_or_expand','factory_name'
        ,'retest_date','manu_month','manu_year'
        ,'serial_number','manufacturer_name'
        ,'pass_or_not','volumn1','volumn2'];
        */

        // dd($request->all());
        if($request->user()==null){

            Session::flash('error', 'Please Login');

            return view('inspection.index');
        }else{

            // $format = 'd-m-Y';
            // $date = Carbon::createFromFormat($format, $request->retest_date);
            // dd($date);


            $request->validate([
                'size' => 'required',
                'hydro_or_expand' => 'required',
                'factory_name' => 'required',
                'retest_date' => 'required',
                'manu_month_year' => 'required',
                'serial_number' => 'required',
                'manufacturer_name' => 'required',
                'pass_or_not' => 'required',

            ]);


            if(strcasecmp($request->hydro_or_expand ,'expand')==0){
                if(strlen(trim($request->volumn1))==0||strlen(trim($request->volumn2))==0){
                    Session::flash('error', 'Please fill V1 and V2');
                    return view('inspection.index')->with('inspectionArray',Inspection::orderby('created_at', 'desc')->take(2)->get());

                }
            }

            if(strlen(trim($request->serial_number))<>12){
                Session::flash('error', 'Serial is invalid');
                return view('inspection.index')->with('inspectionArray',Inspection::orderby('created_at', 'desc')->take(2)->get());
            }

            if(strlen(trim($request->manu_month_year))<>5){
                Session::flash('error', 'Manufacturing month and year is invalid');
                return view('inspection.index')->with('inspectionArray',Inspection::orderby('created_at', 'desc')->take(2)->get());
            }

            try {
                $date = Carbon::createFromFormat('d-m-Y', $request->retest_date)->format('Y-m-d');
            }
            catch (\Exception $e) {
                Session::flash('error', 'Retest date is invalid');
                return view('inspection.index')->with('inspectionArray',Inspection::orderby('created_at', 'desc')->take(2)->get());
            }

            $inspection = new Inspection();

            $inspection->size               = $request->size;
            $inspection->hydro_or_expand    = $request->hydro_or_expand;
            $inspection->factory_name       = $request->factory_name;
            $inspection->retest_date        = Carbon::createFromFormat('d-m-Y', $request->retest_date)->format('Y-m-d');
            $inspection->manu_month_year    = $request->manu_month_year; //"01-18";
            $inspection->serial_number      = $request->serial_number; //"001-001-001";
            $inspection->manufacturer_name  = $request->manufacturer_name; //"MTM";
            $inspection->pass_or_not        = $request->pass_or_not; //"pass";
            $inspection->volumn1            = $request->volumn1; //"10";
            $inspection->volumn2            = $request->volumn2; //"1";
            $inspection->user_id            = $request->user()->id;

            $inspection->save();

            // dd($request->factory_name);
            // $request->user()->inspections()->create($request->only('size', date("d-m-Y", strtotime($request->retest_date))));
            Session::flash('success', 'Your inspection has been submitted');
            return view('inspection.index')->with('inspectionArray',Inspection::orderby('created_at', 'desc')->take(2)->get())
                                           ->with('factory_name_send_back',$request->factory_name)
                                           ->with('size_send_back',$request->size)
                                           ->with('retest_date_send_back',$request->retest_date);

        }

    }

    /*
    public function __construct() {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $questions = Question::with('user')->latest()->paginate(10);

        return view('questions.index', compact('questions'));
    }

    public function create()
    {
        $question = new Question();

        return view('questions.create', compact('question'));
    }


    public function store(AskQuestionRequest $request)
    {
        $request->user()->questions()->create($request->only('title', 'body'));

        return redirect()->route('questions.index')->with('success', "Your question has been submitted");
    }

    public function show(Question $question)
    {
        $question->increment('views');

        return view('questions.show', compact('question'));
    }

    public function edit(Question $question)
    {
        $this->authorize("update", $question);
        return view("questions.edit", compact('question'));
    }

    public function update(AskQuestionRequest $request, Question $question)
    {
        $this->authorize("update", $question);

        $question->update($request->only('title', 'body'));

        return redirect('/questions')->with('success', "Your question has been updated.");
    }

    public function destroy(Question $question)
    {
        $this->authorize("delete", $question);

        $question->delete();

        return redirect('/questions')->with('success', "Your question has been deleted.");
    }
    */
}
