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
    <div id="page-wrapper">
        <div class="panel panel-info" style="width: 50%; height: 100%;">
            <div class="panel-heading">
                <h1>{{$user->name}}<i class="fa fa-fw" aria-hidden="true" title="Copy to use odnoklassniki"></i></h1>
            </div>
            <div class="panel-body">
                <img src="https://regnum.ru/uploads/pictures/news/2019/07/25/regnum_picture_156402552568061_normal.jpg" style="width: 50%;">
            </div>
            <div class="panel-footer">
                Oh, you are goose? :)
            </div>
        </div>
</div>
</div>
</body>
</html>