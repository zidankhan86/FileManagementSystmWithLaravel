@extends('layouts.auth')

@section('content')

<div class="row h-100 w-100" style="justify-content:center;display:flex; background-color: #e6e6e6;" id="login-box">
    <div class="col-md-5">
        <div class="panel panel-default" style="box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5); background-color: #e6e6e6;">
            <div class="panel-heading"></div>
            <div class="panel-body">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Oops!</strong> @lang('quickadmin.qa_there_were_problems_with_input')
                    <br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form class="form-horizontal"
                      role="form"
                      method="POST"
                      action="{{ url('login') }}">
                    <input type="hidden"
                           name="_token"
                           value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label class="col-md-4 control-label">@lang('quickadmin.qa_email')</label>

                        <div class="col-md-6">
                            <input type="email"
                                   class="form-control"
                                   name="email"
                                   value="{{ old('email') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">@lang('quickadmin.qa_password')</label>

                        <div class="col-md-6">
                            <input type="password"
                                   class="form-control"
                                   name="password">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <a href="#">@lang('quickadmin.qa_forgot_password')</a>
                            <br>
                            <a href="#">@lang('quickadmin.qa_registration')</a>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <label>
                                <input type="checkbox"
                                       name="remember"> @lang('quickadmin.qa_remember_me')
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                    <div class="col-md-6 col-md-offset-4" style="text-align: right;">
                        <button type="submit" style="margin-right: 15px;">OK</button>
                        <button type="button" style="margin-right: 15px;">Cancel</button>
                    </div>
                </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
