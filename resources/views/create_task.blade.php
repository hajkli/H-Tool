@extends('layouts.app')

@section('title', 'Zoznam uloh')

@section('content')



<div class="crudCont crudForm form-group">



@if (session('status') == 'not_created')      
     <div class='alert alert-danger'>
        @lang('task.task_created_error')
    </div>
@endif

    <form id="add-form" action="/sk/task/store" method="post">
        {{ csrf_field() }}
        <label for="name">Task name</label>
        <input type="text" name="name" value=""
               class="form-control">
        <br>
        <label for="desc">Task description</label>
      <textarea name="desc" id="desc" cols="30" class="form-control"
                rows="10"></textarea>
        <button type="submit" value="create" name="send"
                id="send" class="btn btn-primary">send</button>
    </form>
</div>

    @endsection