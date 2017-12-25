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
        $invoices->items = $request->input('items');
        $invoices->price = $request->input('price');
        $invoices->date_of_invoicing = $request->input('date_of_invoicing');
        $invoices->due_date = $request->input('due_date');
        $invoices->code = $request->input('code');
        $invoices->symbol = $request->input('symbol');

        $invoices->customer = $request->input('customer');
        $invoices->nameCustomer = $request->input('nameCustomer');
        $invoices->street = $request->input('street');
        $invoices->city = $request->input('city');
        $invoices->zip = $request->input('zip');
        $invoices->ico = $request->input('ico');
        $invoices->dic = $request->input('dic');
        $invoices->dic_dph = $request->input('dic-dph');



        if($invoices->save()){
            return redirect('/sk/invoice/listall')->with('status', 'created');
        }else{
            return redirect("/sk/invoice/create")->with('status', 'not_created');
        }   
    }

    public function detail(\App\Invoice $invoiceId)
    {


//        $invoices = \App\Invoice::where('id' , $id)->first();
            if(isset($invoiceId)){
                return view('invoice_detail',['model' => $invoiceId]);
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
