@extends('layouts/admin')

@section('title')
    <title>Add Source</title>
@endsection

@section('content')
<div id="wrapper">
    @include('admin.panel')
    <div id="page-wrapper">
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <form action="{{route('add.source')}}" method="post">
                        @csrf
                        <br class="form-group">
                            <label>Name</label>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
                        @enderror
                            <input class="form-control" name="name" required="required" value="{{old('name')}}">
                            <label>Url</label>
                        @error('url')
                        <div class="alert alert-danger">{{ $message }}<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
                        @enderror
                            <input class="form-control" name="url" required="required" value="{{old('url')}}">
                        <br class="form-group">
                        <button class="btn btn-success" type="submit">Add</button>
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
