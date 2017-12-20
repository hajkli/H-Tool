@extends('layouts.app')

@section('title', 'Zoznam uloh')

@section('content')

<div class="container ">
    <h1>@lang('task.listheadline')</h1>

    <form action="/sk/login/do" method="post">
        {{ csrf_field() }}

        <label for="username">E-mail
            <input name="username" type="email" id="username">
        </label>
        <label for="password">Heslo
            <input name="password" type="password" id="password">
        </label>
        <input type="submit" value="Login">
    </form>

</div>

    @endsection