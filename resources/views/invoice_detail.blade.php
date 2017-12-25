@extends('layouts.app')

@section('title', 'Zoznam uloh')

@section('content')



<div class="crudCont crudForm form-group">



@if (session('status') == 'error')      
     <div class='alert alert-danger'>
        @lang('task.task_update_error')
    </div>
@endif

    <form id="add-form" action="/sk/task/update" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$model->id}}">
        <label for="name">Task name</label>
        <input type="text" name="name" value="{{$model->name}}"
               class="form-control">
                    {{$model->valMsg['name']}}
        <br>
        <label for="desc">Task description</label>
        <button type="submit" value="Update" name="send"
                id="send" class="btn btn-primary">send</button>
    </form>
</div>

    @endsection