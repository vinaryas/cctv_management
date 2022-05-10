@extends('adminlte::page')

@section('title', 'Form')

@section('content_header')
<h1 class="m-0 text-dark">Form</h1>
@stop

@section('content')
<form class="card" action="{{ route('form.store') }}" method="POST">
    {{ csrf_field() }}
    <div class="card-body">
        <div class="card-header">
            <label>Tempat CCTV</label>
            <div class="row">
                @foreach ( $place as $places)
                    <div class='col-md-2'>
                        <input class="checkbox" type="checkbox" name="place_id[]" id="place_id" value="{{ $places->id }}">
                        <label class="checkbox">{{ $places->place }}</label>
                    </div>
                        @if ($places->id == 1)
                        <select name="area_id" id="area_id" class="form-control" aria-label="Text input with checkbox">
                            <option> Kode Toko </option>
                            @foreach ($store as $stores)
                            <option value="{{ $stores->id }}">{{ $stores->name }}</option>
                            @endforeach
                        </select>
                        <input type="text" name="cctv_id" id="cctv_id" class="form-control" aria-label="Text input with checkbox" placeholder="Area CCTV">
                        @else
                        <input type="text" name="area_id" id="area_id" class="form-control" aria-label="Text input with checkbox" placeholder="Daerah Kantor">
                        <input type="text" name="cctv_id" id="cctv_id" class="form-control" aria-label="Text input with checkbox" placeholder="Area CCTV">
                        @endif
                @endforeach
            </div>
        </div>
        <div class="form-group row">
            <label>Name</label>
            <input type="text" value="{{ $user->name }}" name="name" id="name" class="form-control" readonly>
            <label>NIK</label>
            <input type="text" value="{{ $user->nik }}" id="nik" name="nik" class="form-control" readonly>
            <label>Region</label>
            <select name="region_id" id="region_id" class="form-control">
                @foreach ($region as $regions)
                <option value="{{ $regions->id }}">{{ $regions->name }}</option>
                @endforeach
            </select>
            <label>Departemen</label>
            <select name="departemen_id" id="departemen_id" class="form-control">
                @foreach ($departemen as $departemens)
                <option value="{{ $departemens->id }}">{{ $departemens->name }}</option>
                @endforeach
            </select>
            <label> Waktu </label>
            <input type="date" name="date" id="date" class="form-control">
            <input type="time" name="time" id="time" class="form-control">
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
