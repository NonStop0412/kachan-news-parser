@extends('layouts/admin')

@section('title')
    <title>Edit Source</title>
@endsection

@section('content')
<div id="wrapper">
    @include('admin.panel')
    <div id="page-wrapper">
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <form action="{{route('edit.source')}}" method="post">
                        @csrf
                        <input class="form-control" name="id" required="required" value="{{$source->id}}" type="hidden">
                        <br class="form-group">
                        <label>Name</label>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
                        @enderror
                        <input class="form-control" name="name" required="required" value="{{$source->name}}">
                        <label>Url</label>
                        @error('url')
                        <div class="alert alert-danger">{{ $message }}<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
                        @enderror
                        <input class="form-control" name="url" required="required" value="{{$source->url}}">
                        <label>Active</label>
                        <input type="checkbox" name="active" value="1"
                        @if($source->is_active == 1)
                            checked="checked"
                        @endif
                        >
                        <br class="form-group">
                        <button class="btn btn-success" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@endsection
