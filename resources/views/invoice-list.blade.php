@extends('layouts.app')

@section('title', 'Zoznam faktur')

@section('content')

<div class="container ">
    <h1>@lang('task.listheadline')</h1>

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

            @foreach($data as $task => $value)
                <div id="item{{$value->id}}" class="list-group">
                    <a href="{{ URL::to('/sk/task/edit/' . $value->id) }}" class="list-group-item">
                        <h4 class="list-group-item-heading">{{ $value->name }}</h4>
                    </a>
                </div>
            @endforeach





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