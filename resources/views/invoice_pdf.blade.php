@extends('layouts.app')

@section('title', 'Invoice detail')

@section('content')



    <style>
        html, body {
            font-family: 'DejaVu Sans', sans-serif;
            font-weight: 400;
            margin: 0;
            background: #222222;
            color: #fff;
        }
    </style>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1>Invoice detail: {{$invoices->code}}</h1>
        </div>
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
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Items</h3>
                </div>
                <div class="panel-body">
                    Item: {{$invoices->items}}<br>
                    Price: {{$invoices->price}}
                </div>
            </div>

        </div>

    </div>
</div>

    <a href="/sk/invoice/{{$invoices->id}}/export" class="btn btn-succes">Export</a>



    @endsection