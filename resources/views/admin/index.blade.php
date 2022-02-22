@extends('layouts/admin')

@section('title')
    <title>Admin Panel</title>
@endsection

@section('content')
<div id="wrapper">
    @include('admin.panel')
    <div id="page-wrapper" class="min-height">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h1>Hello, {{\Illuminate\Support\Facades\Auth::user()->name}}!</h1>
            </div>
            <div class="panel-body">
                <h2>Welcome to Admin Panel.</h2>
            </div>
            <div class="panel-footer">
                Your Welcome:)
            </div>
        </div>
    </div>
</div>
@endsection
