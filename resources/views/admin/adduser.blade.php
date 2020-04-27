@extends('adminlte::page')

@section('title', 'Add User')

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
        <h3 class="card-title">Add a new Candidate</h3>
    </div>
    <form class="form-horizontal" action="user" method="POST" autocomplete="off">
        @csrf
        <div class="card-body">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input autocomplete="new-password" minlength="4" type="text" class="form-control" required
                        id="name" name="name" placeholder="Name">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">
                <select class="form-control" name="category" id="category" data-parsley-required="true">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->cat_id }}">{{ $category->cat_name }}</option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input autocomplete="new-password" minlength="4" type="text" class="form-control" required
                        id="username" name="username" placeholder="Username">
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" minlength="4" class="form-control" required id="password" name="password"
                        placeholder="Password">
                </div>
            </div>
            <div class="form-group row">
                <label for="con_password" class="col-sm-2 col-form-label">Confirm Password</label>
                <div class="col-sm-10">
                    <input type="password" minlength="4" class="form-control" required id="con_password"
                        name="con_password" placeholder="Confirm Password">
                </div>
            </div>
            @if ($errors->has('password_error'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-ban"></i> Error!</h5>
                {{ $errors->first('password_error') }}
            </div>
            @endif
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="reset" class="btn btn-default float-left">Cancel</button>
            <button type="submit" class="btn btn-info float-right">Add User</button>
        </div>
    </form>
</div>
@stop

@section('content')

@stop


@section('js')

@stop