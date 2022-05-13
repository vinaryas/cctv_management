@extends('adminlte::page')

@section('title', 'Form')

@section('content_header')
<h1 class="m-0 text-dark">Form</h1>
@stop

@section('content')
<form class="card" action="{{ route('form.store') }}" method="POST">
    {{ csrf_field() }}
    <div class="card-body">
        <input type="hidden" value="{{ $place->id }}" name="place_id" id="place_id">
        <div class="form-group row">
            <label>Name</label>
            <input type="text" value="{{ $user->name }}" name="name" id="name" class="form-control" readonly>
            <label>NIK</label>
            <input type="text" value="{{ $user->nik }}" id="nik" name="nik" class="form-control" readonly>
            <label>Region</label>
            <select name="region_id" id="region_id" class="form-control" required>
                @foreach ($region as $regions)
                <option value="{{ $regions->id }}">{{ $regions->name }}</option>
                @endforeach
            </select>
            <label>Departemen</label>
            <select name="departemen_id" id="departemen_id" class="form-control" required>
                @foreach ($departemen as $departemens)
                <option value="{{ $departemens->id }}">{{ $departemens->name }}</option>
                @endforeach
            </select>
            <label> Tanggal </label>
            <input type="date" name="date" id="date" class="form-control" required>
            <label> Rentan Waktu </label>
                <label> Waktu Awal </label>
                <input type="time" name="time_first" id="time" class="form-control">
                <label> Waktu Akhir </label>
                <input type="time" name="time_last" id="time" class="form-control">
            <label> Daerah CCTV </label>
            @if ($place->id == 1)
            <select name="area_id" id="area_id" class="form-control" required>
                @foreach ($store as $stores)
                <option value="{{ $stores->id }}">{{ $stores->name }}</option>
                @endforeach
            </select>
            @else
            <select name="area_id" id="area_id" class="form-control" required>
                @foreach ($areaKantor as $kantor)
                <option value="{{ $kantor->id }}">{{ $kantor->area }}</option>
                @endforeach
            </select>
            @endif
            <label> Area CCTV </label>
            <input type="text" name="tempat_cctv" id="tempat_cctv" class="form-control" placeholder="Area CCTV" required>
            <label>Keterangan</label>
            <textarea class="form-control form-control-sm" name="description" id="description" cols="30" rows="10"></textarea>
        </div>
        <div class="float-left">
            <a href="{{ route('form.index') }}" class="btn btn-danger"><i class="fas fa-times"></i> <b>Batal</b> </a>
        </div>
        <div class="float-right">
            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> <b>Simpan</b>
            </button>
        </div>
    </div>
</form>

@stop
