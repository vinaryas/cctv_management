@extends('adminlte::page')

@section('title', 'Form')

@section('content_header')
<h1 class="m-0 text-dark">Form</h1>
@stop

@section('content')
<form class="card" action="{{ route('role.store') }}" method="POST">
    {{ csrf_field() }}
    <div class="card-body">
        <div class="form-group">
            <input type="hidden" value="{{ $user->id }}" name="user_id" id="user_id">
            <label> Name </label>
            <input type="text" value="{{ $user->name }}" name="name" id="name" class="form-control" readonly>
            <label> NIK </label>
            <input type="text" value="{{ $user->nik }}" id="nik" name="nik" class="form-control" readonly>
            <label> Role </label>
            <select name="role_id" id="role_id" class="select2 form-control">
                @foreach ($role as $roles)
                <option value="{{ $roles->id }}">{{ $roles->display_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="float-left">
            <a href="{{ route('role.index') }}" class="btn btn-primary"><i class="fas fa-angle-left"></i> <b>Batal</b> </a>
        </div>
        <div class="float-right">
            <button type="submit" class="btn btn-danger" name="delete" id="delete">
                <i class="fas fa-trash"></i> <b> Delete Role </b>
            </button>
            <button type="submit" class="btn btn-primary" name="update" id="update">
                <i class="fas fa-arrow-alt-circle-up"></i> <b> Update Role </b>
            </button>
            <button type="submit" class="btn btn-success" name="save" id="save">
                <i class="fas fa-save"></i> <b> Simpan </b>
            </button>
        </div>
    </div>
</form>

@stop
