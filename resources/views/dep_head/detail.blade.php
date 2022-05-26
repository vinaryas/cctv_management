@extends('adminlte::page')

@section('title', 'dep_head')

@section('content_header')
<h1 class="m-0 text-dark"> dep_head </h1>
@stop

@section('content')
<form class="card" action="{{ route('dep_head.delete') }}" method="POST">
    {{ csrf_field() }}
    <div class="card-body">
        <input type="hidden" value="{{ $user->user_id }}" name="user_id" id="user_id">
        <div class="form-group row">
            <label>Name</label>
            <input type="text" value="{{ $user->user_name }}" name="name" id="name" class="form-control" readonly>
            <label> Departemen </label>
            <select name="departemen_id" id="departemen_id" class="form-control" readonly>
                <option value="{{ $user->departemen_id }}">{{ $user->departemen_name }}</option>
            </select>
        </div>
        <div class="float-left">
            <a href="{{ route('dep_head.index') }}" class="btn btn-primary"><i class="fas fa-angle-left"></i> <b>Kembali</b> </a>
        </div>
        <div class="float-right">
            <button type="submit" class="btn btn-danger" name="delete" id="delete">
                <i class="fas fa-times"></i> Delete
            </button>
        </div>
    </div>
</form>

@stop
