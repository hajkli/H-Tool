<?php

namespace App\Http\Controllers;

//use App\Task;
use Illuminate\Http\Request;


class InvoiceController extends Controller
{


    public function __construct(){

            session_start();

        if(isset($_SESSION["isLogged"])){
                return true;
            } else {
                header('Location: /sk/login');
                exit();
            }
    }


    /**
     * Display a dashboard of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $invoices = \App\Invoice::all();

        $countAll = \App\Invoice::where('isActive', 1)->count();
        $countOpen = \App\Invoice::where('status', 1)->where('isActive', 1)->count();
        $countInProgress = \App\Invoice::where('status', 2)->where('isActive', 1)->count();
        return view('index', ['countAll' => $countAll, 'countOpen' => $countOpen, 'countInProgress' => $countInProgress]);
    }
    /**
     * Display a list all of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listAll()
    {
        $invoices = \App\Invoice::where('isActive' , 1)->get();

        return view('invoice-list', ['data' => $invoices]);
    }
    public function archive()
    {
        $invoices = \App\Invoice::where('isActive' , 0)->get();

        return view('archive', ['data' => $invoices]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('create_invoice');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $invoices = new \App\Invoice();
        $invoices->name = $request->input('name');
        $invoices->name = $request->input('items');
        $invoices->name = $request->input('price');
        $invoices->name = $request->input('date_of_invoicing');
        $invoices->name = $request->input('due_date');
        $invoices->name = $request->input('code');

        $invoices->name = $request->input('customer');
        $invoices->name = $request->input('name');
        $invoices->name = $request->input('street');
        $invoices->name = $request->input('city');
        $invoices->name = $request->input('zip');
        $invoices->name = $request->input('ico');
        $invoices->name = $request->input('dic');
        $invoices->name = $request->input('dic-dph');







        if($invoices->validate() && $invoices->save()){
            return redirect('/sk/listall')->with('status', 'created');
        }else{
            return redirect("/sk/task/create")->with('status', 'not_created');
        }   
    }

    public function edit(\App\Invoice $task)
    {


//        $invoices = \App\Invoice::where('id' , $id)->first();
            if(isset($task)){
                return view('edit-task',['model' => $task]);
            } else {
                return redirect('/sk/');
            }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $invoices =\App\Invoice::find($request->input('id'));
        $invoices->name = $request->input('name');
        $invoices->desc = $request->input('desc');

        if($invoices->validate() && $invoices->save()){
            return redirect('/sk/listall')->with('status', 'success');
        }else{
            return view('edit-task',['model' => $invoices]);
            
            // return redirect("/sk/task/edit/$id")->with('status', 'error');
        }
    }
}
