@extends('layouts.app')

@section('content')
    <div class="row">
        @if (Auth::check() && Auth::user()->role_id == 1)

        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('quickadmin.qa_dashboard')</div>

                <div class="panel-body">
                    @lang('quickadmin.qa_dashboard_text')
                </div>
            </div>
        </div>

        @endif

    </div>
@endsection
