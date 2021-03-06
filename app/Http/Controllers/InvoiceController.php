<?php

namespace App\Http\Controllers;

//use App\Task;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Storage;
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
        $currentYear = date("Y");
        $currentYearForCode =  date("y");

        $count = \App\Invoice::where('year', $currentYear)->count();
            if($count <= 9){
                $count = '0'.($count+1);
            } else{
                $count = $count+1;
            }

        $newCode = $currentYearForCode.''.$count ;
        return view('create_invoice',['data' => $newCode,'curYear'=>$currentYear]);
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

        $items = $request->input('items');
        $implodetItems = implode(", ", $items);

        $price = $request->input('price');;
        $implodetPrice = implode(", ",$price);

        $invoices->name = $request->input('name');
        $invoices->items = $implodetItems;
        $invoices->price = $implodetPrice;
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

        $invoices->year = $request->input('year');

        $itemsExplodet = explode(", ", $invoices->items);
        $priceExplodet = explode(", ", $invoices->price);
        $priceSum =  array_sum ($price );


        if($invoices->save()){
            PDF::loadView('invoice_pdf', compact('invoices', 'items', 'price', 'priceSum', 'itemsExplodet', 'priceExplodet'))->save("../storage/invoices/$invoices->code.pdf")->stream("$invoices->code.pdf");
            return redirect("/sk/invoice/$invoices->id ")->with('status', 'succes');
        }else{
            return redirect("/sk/invoice/create")->with('status', 'not_created');
        }
    }

    public function download($id)
    {
        $invoices = \App\Invoice::find($id);


//        $url = Storage::url("$invoices->code.pdf")->download();
//        return $url;

        $path = storage_path("invoices/$invoices->code.pdf");
        return response()->download($path);

    }

    public function detail($invoiceId)
    {

        $invoices = \App\Invoice::find($invoiceId);

        $items = explode(", ", $invoices->items);
        $price = explode(", ", $invoices->price);
        $priceSum =  array_sum ($price );

            if(isset($invoiceId)){

                return view('invoice_detail',['invoices' => $invoices, 'price' => $price, 'items' => $items, 'priceSum' => $priceSum]);
            } else {
                return redirect('/sk/');
            }
    }

    public function preview($invoiceId)
    {

        $invoices = \App\Invoice::find($invoiceId);

        $invoices = \App\Invoice::find($invoiceId);
        $itemsExplodet = explode(", ", $invoices->items);
        $priceExplodet = explode(", ", $invoices->price);
        $priceSum =  array_sum ($priceExplodet );


//        $invoices = \App\Invoice::where('id' , $id)->first();
        if(isset($invoiceId)){
            return view('invoice_pdf',['invoices' => $invoices, 'priceExplodet' => $priceExplodet, 'itemsExplodet' => $itemsExplodet, 'priceSum' => $priceSum]);
        } else {
            return redirect('/sk/');
        }
    }

    public function export($invoiceId)
    {
        $invoices = \App\Invoice::find($invoiceId);
        $itemsExplodet = explode(", ", $invoices->items);
        $priceExplodet = explode(", ", $invoices->price);
        $priceSum =  array_sum ($priceExplodet );

            PDF::loadView('invoice_pdf', compact('invoices', 'itemsExplodet', 'priceExplodet', 'priceSum'))->save("../storage/invoices/$invoices->code.pdf");
        return view('invoice_detail',['invoices' => $invoices, 'price' => $priceExplodet, 'items' => $itemsExplodet, 'priceSum' => $priceSum]);
    }

    public function paid($invoiceId)
    {
        $invoices = \App\Invoice::find($invoiceId);

        $invoices->status = 2;

        if($invoices->save()){
            return redirect("/sk/invoice/$invoiceId")->with('status', 'success');
        }else{
            return redirect("/sk/invoice/$invoiceId")->with('status', 'error');
        }
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */

    public function edit($invoiceId)
    {

        $invoice = \App\Invoice::find($invoiceId);

        $currentYear = $invoice->year;

        $newCode = $invoice->code;

        $items = explode(", ", $invoice->items);
        $price = explode(", ", $invoice->price);





        if(isset($invoiceId)){
            return view('edit_invoice',['invoice' => $invoice, 'data' => $newCode,'curYear'=>$currentYear, 'items' => $items, 'price' => $price ]);
        } else {
            return redirect('/sk/');
        }
    }




    public function update(Request $request)
    {

        $invoices =\App\Invoice::find($request->input('id'));

        $items = $request->input('items');
        $implodetItems = implode(", ", $items);

        $price = $request->input('price');;
        $implodetPrice = implode(", ",$price);

        $invoices->name = $request->input('name');
        $invoices->items = $implodetItems;
        $invoices->price = $implodetPrice;
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

        $invoices->year = $request->input('year');





        if($invoices->save()){
            return redirect('/sk/listall')->with('status', 'success');
        }else{
            return view('edit-task',['model' => $invoices]);
        }
    }
}
