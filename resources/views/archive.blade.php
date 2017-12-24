@extends('layouts.app')

@section('title', 'Zoznam uloh')

@section('content')
<!--
<div class="crudCont crudForm form-group">
    <form id="add-form" action="inc/add.php<?php if (isset($updateTask)) echo '?update&id=' . $id; ?>" method="post">
        <label for="name">Task name</label>
        <input type="text" name="name" value="<?php if (isset($updateTask)) echo $updateTask['name']; ?>"
               class="form-control">
        <br>
        <label for="desc">Task description</label>
      <textarea name="desc" id="desc" cols="30" class="form-control"
                rows="10"><?php if (isset($updateTask)) echo $updateTask['desc']; ?></textarea>
        <button type="submit" value="<?php if (isset($updateTask)) echo 'update'; else echo 'send'; ?>" name="send"
                id="send" class="btn btn-primary">send</button>
    </form>
</div>
-->

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
            <ul class="grid">
                @foreach($data as $task => $value)
                    <li>
                        <div id="item{{$value->id}}" class="panel panel-default">
                            <div class="panel-heading">{{ $value->name }}</div>
                            <div class="panel-body">
                                {{ $value->desc }}
                            </div>
                            <div class="panel-footer">
                                <a href="{{ URL::to('/sk/task/restore/' . $value->id) }}" class="btn btn-outline-warning">Restore</a>
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