@extends('layouts/admin')
        <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sources</title>
</head>
<body>

<div id="wrapper">
    @include('admin.panel')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sources</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    @if (session()->exists('message'))
                        <div class="alert alert-success">{{ session('message') }}<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
                    @endif
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Sources Table
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <a href="{{route('add.source.form')}}"><button class="btn btn-success" type="submit">Add Source</button></a>
                            <div class="br-bot"></div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Url</th>
                                        <th>Active</th>
                                        <th>TO DO</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sources as $source)
                                    <tr class="odd gradeX">
                                        <td>{{$source->id}}</td>
                                        <td>{{$source->name}}</td>
                                        <td><a href="{{$source->url}}" target="_blank">{{$source->url}}</a></td>
                                        <td>
                                            @if($source->is_active == 1)
                                                <p>Yes</p>
                                            @else
                                                <p>No</p>
                                            @endif
                                        </td>
                                        <td class="center">
                                            <div class="col-lg-4">
                                                <a href="{{route('edit.source.form', $source->id)}}"><button class="btn btn-outline btn-info" type="submit">Edit</button></a>
                                            </div>
                                            <div class="col-lg-offset-2">
                                            <form action="{{route('delete.source', $source->id)}}" method="post" onsubmit="return confirm('Are u sure to delete source?')">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-outline btn-danger" type="submit">Delete</button>
                                            </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{$sources->links()}}
                            </div>

                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->

</div>
</body>
</html>