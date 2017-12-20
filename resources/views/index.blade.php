@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    {{--{{ app()->getLocale() }}--}}

    <div class="container">
        <h1 class="text-center" style="">@lang('task.dashboar')</h1>



        @if (session('status') == 'success')
            <div class="alert alert-success">
                Uspesne si sa prihlasil! Vyborne!
            </div>

        @endif

        <div class="row">
            <div class="col-sm-4">
                @lang('task.tasks_count_all')
            </div>
            <div class="col-sm-8">
                {{$countAll}}
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                @lang('task.tasks_count_open')
            </div>
            <div class="col-sm-8">
                {{$countOpen}}
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                @lang('task.tasks_count_in_progress')
            </div>
            <div class="col-sm-8">
                {{$countInProgress}}
            </div>
        </div>
    </div>



@endsection
