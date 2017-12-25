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
            <h1>Invoice detail: {{$model->code}}</h1>
        </div>
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Customer detail</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            {{$model->nameCustomer}}
                            <br><br>
                            {{$model->street}}
                            <br>
                            {{$model->city}}, {{$model->zip}}
                            <br>
                            {{$model->state}}
                        </div>
                        <div class="col-md-6">
                            <br>
                            <strong>ICO: </strong>{{$model->ico}}<br>
                            <strong>DIČ: </strong>{{$model->dic}}<br>
                            <strong>DIČ DPH: </strong>{{$model->dic_dph}}
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
                    <strong>Code: </strong>{{$model->code}}<br>
                    <strong>Symbol: </strong>{{$model->symbol}}<br>
                    <strong>Date of invoicing:</strong><br>
                    {{$model->date_of_invoicing}}<br>
                    <strong>Due date:</strong><br>
                    {{$model->due_date}}
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
                    Item: {{$model->items}}<br>
                    Price: {{$model->price}}
                </div>
            </div>

        </div>

    </div>
</div>

    <a href="/sk/invoice/{{$model->id}}/export" class="btn btn-succes">Export</a>



    @endsection