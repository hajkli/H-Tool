@extends('layouts.app')

@section('title', 'Zoznam uloh')

@section('content')



<div class="container">
    <div class="row">



@if (session('status') == 'not_created')      
     <div class='alert alert-danger'>
        @lang('task.task_created_error')
    </div>
@endif

    <form id="add-form" class="form-horizontal form-center" action="/sk/invoice/store" method="post">
        <fieldset>
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name" class="col-lg-2 control-label">Name</label>
                <div class="col-sm-6">
                    <input class="form-control" id="name" name="name" placeholder="Name" type="text">
                </div>
            </div>
            <div class="form-group">
                <label for="items" class="col-lg-2 control-label">Items</label>
                <div class="col-sm-6">
                    <input class="form-control" id="items" name="items" placeholder="Items" type="text">
                </div>
            </div>
            <div class="form-group">
                <label for="price" class="col-lg-2 control-label">Price</label>
                <div class="col-sm-6">
                    <input class="form-control" id="price" name="price" placeholder="Price" type="text">
                </div>
            </div>

            <div class="form-group">
                <label for="date_of_invoicing" class="col-lg-2 control-label">Date of invoicing</label>
                <div class="col-sm-6">
                    <input class="form-control" id="date_of_invoicing" name="date_of_invoicing" placeholder="Date of invoicing" type="date">
                </div>
            </div>
            <div class="form-group">
                <label for="due_date" class="col-lg-2 control-label">Due date</label>
                <div class="col-sm-6">
                    <input class="form-control" id="due_date" name="due_date" placeholder="Due date" type="date">
                </div>
            </div>
            <div class="form-group">
                <label for="code" class="col-lg-2 control-label">Code</label>
                <div class="col-sm-6">
                    <input class="form-control" id="code" name="code" value="{{$data}}" placeholder="Code" type="text">
                </div>
            </div>
            <div class="form-group">
                <label for="symbol" class="col-lg-2 control-label">Symbol</label>
                <div class="col-sm-6">
                    <input class="form-control" id="symbol" value="3008" name="symbol" placeholder="Symbol" type="text">
                </div>
            </div>

            <div class="form-group">
                <label for="customer" class="col-lg-2 control-label">Customer</label>
                <div class="col-sm-6">
                    <select class="form-control" id="customer">
                        <option>0</option>
                        <option>2</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="nameCustomer" class="col-lg-2 control-label">Name</label>
                <div class="col-sm-6">
                    <input class="form-control" id="nameCustomer" name="nameCustomer" placeholder="Company" type="text">
                </div>
            </div>

            <div class="form-group">
                <label for="street" class="col-lg-2 control-label">Street</label>
                <div class="col-sm-6">
                    <input class="form-control" id="street" name="street" placeholder="Street" type="text">
                </div>
            </div>

            <div class="form-group">
                <label for="city" class="col-lg-2 control-label">City</label>
                <div class="col-sm-6">
                    <input class="form-control" id="city" placeholder="City" name="city" type="text">
                </div>
            </div>

            <div class="form-group">
                <label for="zip" class="col-lg-2 control-label">ZIP</label>
                <div class="col-sm-6">
                    <input class="form-control" id="zip" placeholder="ZIP" name="zip" type="text">
                </div>
            </div>

            <div class="form-group">
                <label for="ico" class="col-lg-2 control-label">ICO</label>
                <div class="col-sm-6">
                    <input class="form-control" id="ico" name="ico" placeholder="ICO" type="text">
                </div>
            </div>

            <div class="form-group">
                <label for="dic" class="col-lg-2 control-label">DIC</label>
                <div class="col-sm-6">
                    <input class="form-control" id="dic" name="dic" placeholder="DIC" type="text">
                </div>
            </div>

            <div class="form-group">
                <label for="dic-dph" class="col-lg-2 control-label">DIC DPH</label>
                <div class="col-sm-6">
                    <input class="form-control" id="dic-dph" name="dic-dph" placeholder="DIC DPH" type="text">
                </div>
            </div>

            <br>

            <div class="text-right col-sm-8">
                <button type="submit" value="create" name="send" id="send" class="btn btn-primary">send</button>
            </div>

        </fieldset>

    </form>
</div>
</div>


    @endsection