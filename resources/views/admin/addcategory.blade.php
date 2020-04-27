@extends('adminlte::page')

@section('title', 'Add category')

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('content_header')

@if ($errors->has('created'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-check"></i> Success!</h5>
    {{ $errors->first('created') }}
</div>
@endif

<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Add a new Category</h3>
    </div>
    <form class="form-horizontal" action="category" method="POST" autocomplete="off">
        @csrf
        <div class="card-body">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Category Name</label>
                <div class="col-sm-10">
                    <input autocomplete="new-password" minlength="2" type="text" class="form-control" required
                        id="name" name="name" placeholder="Category Name">
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="reset" class="btn btn-default float-left">Cancel</button>
            <button type="submit" class="btn btn-info float-right">Add Category</button>
        </div>
    </form>
</div>
@stop

@section('content')

@stop


@section('js')

@stop