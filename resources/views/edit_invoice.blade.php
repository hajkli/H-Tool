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
        <form id="add-form" class=" form-center" action="/sk/invoice/update" method="post">
            <fieldset>
                {{ csrf_field() }}
                <input name="year" id="year" type="text" value="{{$curYear}}">
                <div class="col-sm-6">
                    <h2>Invoice parameters</h2>
                    <div class="form-group">
                        <label for="name" class=" control-label">Name</label>
                        <div class="n">
                            <input class="form-control" id="name" name="name" placeholder="Name" value="{{$invoice->name}}" type="text">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="date_of_invoicing" class=" control-label">Date of invoicing</label>
                        <div class="n">
                            <input class="form-control" id="date_of_invoicing" name="date_of_invoicing" value="{{date('Y-d-m', strtotime($invoice->date_of_invoicing))}}" placeholder="Date of invoicing" type="date">
                    </div>
                        </div>
                    <div class="form-group">
                        <label for="due_date" class=" control-label">Due date</label>
                        <div class="n">
                            <input class="form-control" id="due_date" name="due_date" value="{{$invoice->due_date}}" placeholder="Due date" type="date">
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
                            <input class="form-control" id="symbol" value="{{$invoice->symbol}}" name="symbol" placeholder="Symbol" type="text">
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
                          <input class="form-control" id="nameCustomer" name="nameCustomer" value="{{$invoice->nameCustomer}}" placeholder="Company" type="text">
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="street" class=" control-label">Street</label>
                      <div class="n">
                          <input class="form-control" id="street" name="street" placeholder="Street" value="{{$invoice->street}}" type="text">
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="city" class=" control-label">City</label>
                      <div class="n">
                          <input class="form-control" id="city" placeholder="City" name="city" value="{{$invoice->city}}" type="text">
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="zip" class=" control-label">ZIP</label>
                      <div class="n">
                          <input class="form-control" id="zip" placeholder="ZIP" name="zip" value="{{$invoice->zip}}" type="text">
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="ico" class=" control-label">ICO</label>
                      <div class="n">
                          <input class="form-control" id="ico" name="ico" placeholder="ICO" value="{{$invoice->ico}}" type="text">
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="dic" class=" control-label">DIC</label>
                      <div class="n">
                          <input class="form-control" id="dic" name="dic" placeholder="DIC" value="{{$invoice->dic}}" type="text">
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="dic-dph" class=" control-label">DIC DPH</label>
                      <div class="n">
                          <input class="form-control" id="dic-dph" name="dic-dph" placeholder="DIC DPH" value="{{$invoice->dic_dph}}" type="text">
                      </div>
                  </div>
              </div>
                <div class="col-sm-12">

                    <h3 class="text-center"> Invoice items</h3>
                        <div class="row">
                            <div class="col-sm-8">

                                <div class="form-group">
                                    @foreach ($items as $value)
                                        <label for="items" class=" control-label">Item</label>
                                        <div class="n">
                                            <input class="form-control" id="items" name="items[]" placeholder="Items"  value="{{$value}}" type="text">
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                @foreach ($price as $value)
                                        <label for="price" class=" control-label">Price</label>
                                        <div class="n">
                                            <input class="form-control" id="price" value="{{$value}}" name="price[]" placeholder="Price" type="text">
                                        </div>
                                @endforeach
                                </div>
                            </div>
                        </div>
                    <div id="forduplicate">
                        <div class="row">
                            <div class="col-sm-8">

                                <div class="form-group">
                                    <label for="items" class=" control-label">Item</label>
                                    <div class="n">
                                        <input class="form-control" id="items" name="items[]" placeholder="Items" type="text">
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="price" class=" control-label">Price</label>
                                    <div class="n">
                                        <input class="form-control" id="price" name="price[]" placeholder="Price" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="button" id="addnew" class="btn btn-success ">Pridať ďalší predmet</button>

                </div>



                <br>

                <div class="text-center col-sm-12">
                    <button type="submit" value="create" name="send" id="send" class="btn btn-primary">send</button>
                </div>

            </fieldset>

        </form>
</div>
</div>

<script></script>

    @endsection