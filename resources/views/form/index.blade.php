@extends('adminlte::page')

@section('title', 'Form')

@section('content_header')
    <h1 class="m-0 text-dark font-weight-bolder"> Form CCTV </h1>
@stop

@section('content')
    @foreach ($place as $detail)
        <div class="row">
            <div class="col-lg-12 col-12">
                <a href="{{ route('form.create', $detail->id) }}">
                    <div class="small-box bg-info">
                        <div class="inner text-center">
                            <h1> {{ $detail->place }} </h1>
                            <br>
                        </div>
                        <div class="icon">
                            <i class="fas fa-laptop-house" style="color: rgb(255, 255, 255);"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    @endforeach
<div class="card">
    <div class="row justify-content-center">
        <h1 class="m-0 text-dark font-weight-bolder"> History </h1>
    </div>
    <form class="" action="{{ route('form.index') }}" method="GET">
        {{ csrf_field() }}
        <div class="card-body">
            <table class="table table-bordered table-striped" id="table" style="width: 100%;">
                <thead>
                    <tr>
                        <th> created_at </th>
                        <th> Nama </th>
                        <th> NIK </th>
                        <th> detail </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($form as $detail)
                        <tr>
                            <td>{{ $detail->created_at }}</td>
                            <td>{{ $detail->name }}</td>
                            <td>{{ $detail->nik }}</td>
                            <td> <a href="{{ route('form.detail', $detail->form_id) }}" class="btn btn-primary btn-sm"><i class="fas fa-angle-right"></i> Detail </a> </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </form>
</div>

@stop

@section('js')
    <script>
        $(document).ready(function () {
            console.log('teast');
            $('#table').DataTable();
        });
    </script>
@stop
