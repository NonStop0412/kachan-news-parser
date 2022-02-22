@extends('layouts/admin')

@section('title')
    <title>Sources</title>
@endsection

@section('content')
<div id="wrapper">
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
                                                <div class="col-lg-4">
                                                    <p id="{{$source->id}}">Yes</p>
                                                </div>
                                                <div class="col-lg-offset-2">
                                                        <button class="btn btn-outline btn-danger" id="btn{{$source->id}}" onclick="changeStatus({{$source->id}})" style="width:40%">Deactivate</button>
                                                </div>
                                            @else
                                                <div class="col-lg-4">
                                                    <p id="{{$source->id}}">No</p>
                                                </div>
                                                <div class="col-lg-offset-2">
                                                        <button class="btn btn-outline btn-success" id="btn{{$source->id}}" onclick="changeStatus({{$source->id}})" style="width:40%">Activate</button>
                                                </div>
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
            </div>
        </div>
    </div>
            </div>
        </div>
    </div>
</div>

<script>
        function changeStatus (id)
        {
            var url = "{{route('change-status.source', '')}}"+"/"+id;
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id
                },
                success: function(data) {
                    console.log(data);
                    if (data.status) {
                        var status = document.getElementById(id);
                        status.innerHTML = "Yes";

                        var button = document.getElementById("btn" + id);
                        button.innerHTML = "Deactivate";
                        button.className = "btn btn-outline btn-danger";
                    } else {
                        var status = document.getElementById(id);
                        status.innerHTML = "No";

                        var button = document.getElementById("btn" + id);
                        button.innerHTML = "Activate";
                        button.className = "btn btn-outline btn-success";
                    }
                },
                error : function(data) {
                    alert('Error');
                }
            });
        }
</script>
@endsection
