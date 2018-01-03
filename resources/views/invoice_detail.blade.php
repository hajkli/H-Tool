@extends('layouts.app')

@section('title', 'Invoice detail')

@section('content')





<div class="container">

    @if (session('status') == 'success')
        <div class="alert alert-success">
            Úšpešne si exportoval fakturu
        </div>

    @endif

    <div class="row">
        <div class="col-sm-8">
            <h1>Invoice detail: {{$invoices->code}}</h1>
        </div>
        <div class="col-sm-4 text-right">
            @if($invoices->status == 1)
                <a href="/sk/invoice/{{$invoices->id}}/paid" class="btn btn-danger paid">Zaplatena</a>
            @else
                <div class="btn btn-disabled paid">Zaplatené</div>
            @endif
        </div>
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Parameters</h3>
                </div>
                <div class="panel-body">
                    <strong>Code: </strong>{{$invoices->code}}<br>
                    <strong>Symbol: </strong>{{$invoices->symbol}}<br>
                    <strong>Date of invoicing:</strong><br>
                    {{$invoices->date_of_invoicing}}<br>
                    <strong>Due date:</strong><br>
                    {{$invoices->due_date}}
                </div>
            </div>

        </div>
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Items</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-8 thin-border-bottom">
                            @foreach ($items as $value)
                                {{$value}} <br>
                            @endforeach
                        </div>
                        <div class="col-sm-4">
                            @foreach ($price as $value)
                                {{$value}} &euro; <br>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                   <div class="row">
                       <div class="col-sm-8">
                           Spolu:
                       </div>
                       <div class="col-sm-4">
                           {{$priceSum}} &euro;
                       </div>
                   </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Customer detail</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            {{$invoices->nameCustomer}}
                            <br><br>
                            {{$invoices->street}}
                            <br>
                            {{$invoices->city}}, {{$invoices->zip}}
                            <br>
                            {{$invoices->state}}
                        </div>
                        <div class="col-md-6">
                            <br>
                            <strong>ICO: </strong>{{$invoices->ico}}<br>
                            <strong>DIČ: </strong>{{$invoices->dic}}<br>
                            <strong>DIČ DPH: </strong>{{$invoices->dic_dph}}
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
        <a href="/sk/invoice/{{$invoices->id}}/download" target="_blank" class="btn btn-primary">Download</a>
        <a href="/sk/invoice/{{$invoices->id}}/preview" class="btn btn-primary">Preview</a>
        <a href="/sk/invoice/{{$invoices->id}}/export"  class="btn btn-primary">Export new</a>
        @if($invoices->status == 2)
            <a href="/sk/invoice/{{$invoices->id}}/edit"  class="btn btn-primary">Edit</a>
        @endif


</div>





@endsection