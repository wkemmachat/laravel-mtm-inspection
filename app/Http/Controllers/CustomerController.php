<?php

namespace App\Http\Controllers;
use App\Customer;
use Illuminate\Http\Request;
use Session;

class CustomerController extends Controller
{

    public function __construct() {
        // $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        // $questions = Question::with('user')->latest()->paginate(10);

        return view('customer.index') ->with('customerArray',Customer::orderby('updated_at', 'desc')->take(10)->get());

    }

    public function data()
    {
        // $questions = Question::with('user')->latest()->paginate(10);
        // $posts = Post::orderBy('id', 'desc')->paginate(6);
        $customerArray = Customer::orderBy('updated_at', 'desc')->paginate(10);


        return view('customer.data') ->with('customerArray',$customerArray);

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

    public function destroy(Inspection $inspection)
    {
        // $questions = Question::with('user')->latest()->paginate(10);
        $customer->delete();
        Session::flash('success', 'You succesfully delete data.');

        return view('customer.index') ->with('customerArray',Customer::orderby('updated_at', 'desc')->take(10)->get());


    }
    */

    public function store(Request $request)
    {


        // dd($request->all());
        if($request->user()==null){

            Session::flash('error', 'Please Login');

            return view('customer.index');
        }else{


            $request->validate([
                'size' => 'required',
                'customer_name' => 'required',
            ]);


            if($request->remark1==null){
                $request->remark1 = "";
            }
            if($request->remark2==null){
                $request->remark2 = "";
            }
            if($request->remark3==null){
                $request->remark3 = "";
            }

            $customer = new Customer();

            $customer->size               = $request->size;
            $customer->customer_name      = $request->customer_name;
            $customer->remark1            = $request->remark1;
            $customer->remark2            = $request->remark2;
            $customer->remark3            = $request->remark3;
            $customer->user_id            = $request->user()->id;
            $customer->isActive           = 'Y';

            $customer->save();

            // dd($request->factory_name);
            // $request->user()->inspections()->create($request->only('size', date("d-m-Y", strtotime($request->retest_date))));
            Session::flash('success', 'Your customer has been submitted');
            return view('customer.index')->with('customerArray',Customer::orderby('updated_at', 'desc')->take(10)->get());

        }

    }

    public function edit(Request $request, $id)
    {

        $customer = Customer::find($id);
        // dd($customer);
        return view("customer.edit")->with('customer',$customer);
    }

    public function editsave(Request $request)
    {
        $editId = $request->editId;
        $customerObj = Customer::find($editId);

        if($request->remark1==null){
            $request->remark1 = "";
        }
        if($request->remark2==null){
            $request->remark2 = "";
        }
        if($request->remark3==null){
            $request->remark3 = "";
        }

        if($customerObj!=null){

            $customerObj->size               = $request->size;
            $customerObj->customer_name      = $request->customer_name;
            $customerObj->remark1            = $request->remark1;
            $customerObj->remark2            = $request->remark2;
            $customerObj->remark3            = $request->remark3;
            $customerObj->user_id            = $request->user()->id;
            $customerObj->isActive           = $request->isActive;
            $customerObj->save();

            Session::flash('success', 'Customer has been edited');
            return view('customer.index')->with('customerArray',Customer::orderby('updated_at', 'desc')->take(10)->get());

        }else{

            Session::flash('error', 'Error edited');
            return view('customer.index')->with('customerArray',Customer::orderby('updated_at', 'desc')->take(10)->get());

        }

    }

}
