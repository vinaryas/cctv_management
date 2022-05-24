@extends('adminlte::page')

@section('title', 'Approval')

@section('content_header')
<h1 class="m-0 text-dark"> Approval </h1>
@stop

@section('content')
<form class="card" action="{{ route('approval.store') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="card-body">
        <input type="hidden" value="{{ $form->form_id }}" name="form_id" id="form_id">
        <input type="hidden" value="{{ $form->created_by }}" name="created_by" id="created_by">
        <div class="form-group row">
            <label>Name</label>
            <input type="text" value="{{ $form->name }}" name="name" id="name" class="form-control" readonly>
            <label>NIK</label>
            <input type="text" value="{{ $form->nik }}" id="nik" name="nik" class="form-control" readonly>
            <label>Region</label>
            <select name="region_id" id="region_id" class="form-control" readonly>
                <option value="{{ $form->region_id }}">{{ $form->regions_name }}</option>
            </select>
            <label>Departemen</label>
            <select name="departemen_id" id="departemen_id" class="form-control" readonly>
                <option value="{{ $form->departemen_id }}">{{ $form->departemens_name }}</option>
            </select>
            <label> Tanggal </label>
            <input type="date" name="date" id="date" value="{{ $form->date }}" class="form-control" readonly>
            <label> Rentan Waktu </label>
            <label> Waktu Awal </label>
            <input type="time" name="time_first" id="time" value="{{ $form->time_first }}" class="form-control" readonly>
            <label> Waktu Akhir </label>
            <input type="time" name="time_last" id="time" value="{{ $form->time_last }}" class="form-control" readonly>
            <label> Area </label>
            <select id="place" name="place" class="form-control" readonly>
                <option value="{{ $form->place_id }}"> {{ $form->place }} </option>
            </select>
            <label> Daerah CCTV </label>
            @if ($form->place_id == 1)
            <select name="store_id" id="store_id" class="form-control" readonly>
                <option value="{{ $form->store_id }}">{{ $form->store_name }}</option>
            </select>
            @else
            <select name="bo_id" id="bo_id" class="form-control" readonly>
                <option value="{{ $form->bo_id }}">{{ $form->bo_name }}</option>
            </select>
            @endif
            <label> Area CCTV </label>
            <input type="text" name="tempat_cctv" id="tempat_cctv" value="{{ $form->tempat_cctv }}" class="form-control" readonly>
            <label>Keterangan</label>
            <textarea class="form-control form-control-sm" name="description" id="description"  cols="30" rows="10" readonly> {{ $form->description }} </textarea>
        </div>
        <div class="float-left">
            <a href="{{ route('approval.index') }}" class="btn btn-primary"><i class="fas fa-angle-left"></i> <b>Kembali</b> </a>
        </div>
        <div class="float-right">
            <button type="submit" class="btn btn-danger" name="disapprove" id="disapprove">
                <i class="fas fa-times"></i> Disapprove
            </button>
            <button type="submit" class="btn btn-success" name="approve" id="approve">
                <i class="fas fa-save"></i> Approve
            </button>
        </div>
    </div>
</form>

@stop
