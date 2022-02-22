@extends('layouts/admin')

@section('title')
    <title>Profile</title>
@endsection

@section('content')
<div id="wrapper">
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
@endsection
