@extends('layouts.app')

@section('title', 'Zoznam uloh')

@section('content')

<div class="container ">
    <h1>Customer list</h1>

    <div class="row">
        <div class="col-sm-12">

@if (session('status') == 'success')
    <div class="alert alert-success">
        @lang('task.task_update_success')
    </div>
@elseif (session('status') == 'created')      
    <div class="alert alert-succes">
    @lang('task.task_created_succes')
    </div>
@elseif (session('status') == 'error')      
     <div class="alert alert-error">
        @lang('task.task_update_error')
    </div>
@endif
            <ul class="grid">
                @foreach($data as $customer => $value)
                    <li>
                        <div id="item{{$value->id}}" class="panel panel-default">
                            <div class="panel-heading">{{ $value->name }}</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        {{$value->street}}
                                        <br>
                                        {{$value->city}}, {{$value->zip}}
                                    </div>
                                    <div class="col-sm-6">
                                        <strong>ICO:</strong> {{$value->ico}}
                                        <br>
                                        <strong>DIC:</strong> {{$value->dic}}
                                        <br>
                                        <strong>DIC DPH:</strong> {{$value->dic_dph}}
                                        <br>
                                        <strong>IBAN:</strong> {{$value->iban}}
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <a href="{{ URL::to('/sk/customer/edit/' . $value->id) }}" class="btn btn-outline-warning">update</a>
                                <a href="{{ URL::to('/sk/customer/delete/' . $value->id) }}" class="btn btn-outline-danger">delete</a>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<script>
    new AwesomeGrid('ul.grid')
            .gutters({
                column: 15,
                row: 15
            }).grid(2)
</script>
    @endsection