@extends('layouts/admin')
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>
</head>
<body>
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
</body>
</html>