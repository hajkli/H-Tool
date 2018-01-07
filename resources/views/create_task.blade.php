@extends('layouts.app')

@section('title', 'Zoznam uloh')

@section('content')



<div class="crudCont crudForm form-group">



@if (session('status') == 'not_created')      
     <div class='alert alert-danger'>
        @lang('task.task_created_error')
    </div>
@endif


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {!! Form::open(['url' => '/sk/task/store', 'id' => 'add-form']) !!}

        {!! Form::label('name', 'Task name') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
            <br><br>
        {!! Form::label('desc', 'Task name') !!}
        {!! Form::textarea('desc', null, ['class' => 'form-control', 'rows' => '10', 'cols' => '30', 'id' => 'desc']) !!}

        {!! Form::button('Send', ['type' => 'submut', 'class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}


</div>

    @endsection