@extends('layouts.app')

@section('title', 'Zoznam uloh')

@section('content')



<div class="container">

@if (session('status') == 'not_created')      
     <div class='alert alert-danger'>
        @lang('task.task_created_error')
    </div>
@endif

        <h1 class="text-center">Create new invoice number: {{$data}}</h1>

    <div class="row">
        <form id="add-form" class=" form-center" action="/sk/invoice/store" method="post">
            <fieldset>
                {{ csrf_field() }}
                <input name="year" id="year" type="hidden" value="{{$curYear}}">
                <div class="col-sm-6">
                    <h2>Invoice parameters</h2>
                    <div class="form-group">
                        <label for="name" class=" control-label">Name</label>
                        <div class="n">
                            <input class="form-control" id="name" name="name" placeholder="Name" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="items" class=" control-label">Items</label>
                        <div class="n">
                            <input class="form-control" id="items" name="items" placeholder="Items" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price" class=" control-label">Price</label>
                        <div class="n">
                            <input class="form-control" id="price" name="price" placeholder="Price" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="date_of_invoicing" class=" control-label">Date of invoicing</label>
                        <div class="n">
                            <input class="form-control" id="date_of_invoicing" name="date_of_invoicing" placeholder="Date of invoicing" type="date">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="due_date" class=" control-label">Due date</label>
                        <div class="n">
                            <input class="form-control" id="due_date" name="due_date" placeholder="Due date" type="date">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="code" class=" control-label">Code</label>
                        <div class="n">
                            <input class="form-control" id="code" name="code" value="{{$data}}"  placeholder="Code" type="text" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="symbol" class=" control-label">Symbol</label>
                        <div class="n">
                            <input class="form-control" id="symbol" value="3008" name="symbol" placeholder="Symbol" type="text">
                        </div>
                    </div>
                </div>
              <div class="col-sm-6">

                  <h2>Customer details</h2>
                  <div class="form-group">
                      <label for="customer" class=" control-label">Customer</label>
                      <div class="n">
                          <select class="form-control" id="customer">
                              <option>0</option>
                              <option>2</option>
                          </select>
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="nameCustomer" class=" control-label">Name</label>
                      <div class="n">
                          <input class="form-control" id="nameCustomer" name="nameCustomer" placeholder="Company" type="text">
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="street" class=" control-label">Street</label>
                      <div class="n">
                          <input class="form-control" id="street" name="street" placeholder="Street" type="text">
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="city" class=" control-label">City</label>
                      <div class="n">
                          <input class="form-control" id="city" placeholder="City" name="city" type="text">
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="zip" class=" control-label">ZIP</label>
                      <div class="n">
                          <input class="form-control" id="zip" placeholder="ZIP" name="zip" type="text">
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="ico" class=" control-label">ICO</label>
                      <div class="n">
                          <input class="form-control" id="ico" name="ico" placeholder="ICO" type="text">
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="dic" class=" control-label">DIC</label>
                      <div class="n">
                          <input class="form-control" id="dic" name="dic" placeholder="DIC" type="text">
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="dic-dph" class=" control-label">DIC DPH</label>
                      <div class="n">
                          <input class="form-control" id="dic-dph" name="dic-dph" placeholder="DIC DPH" type="text">
                      </div>
                  </div>
              </div>



                <br>

                <div class="text-center col-sm-12">
                    <button type="submit" value="create" name="send" id="send" class="btn btn-primary">send</button>
                </div>

            </fieldset>

        </form>
</div>
</div>


    @endsection