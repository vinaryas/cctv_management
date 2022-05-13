@extends('adminlte::page')

@section('title', 'Approval')

@section('content_header')
<h1 class="m-0 text-dark"> Approval </h1>
@stop

@section('content')
<form class="card" action="{{ route('approval.index') }}" method="GET">
    {{ csrf_field() }}
     <div class="card-body">
        <table class="table table-bordered table-striped" id="table" style="width: 100%;">
            <thead>
                <tr>
                    <th> Nama </th>
                    <th> NIK </th>
                    <th> Departemen </th>
                    <th> detail </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($form as $detail)
                    <tr>
                        <td>{{ $detail->name }}</td>
                        <td>{{ $detail->nik }}</td>
                        <td>{{ $detail->departemens_name }}</td>
                        <td> <a href="{{ route('approval.create', $detail->form_id) }}" class="btn btn-primary btn-sm"><i class="fas fa-angle-right"></i> Place </a> </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
    </div>
</form>

@stop

@section('js')
    <script>
        $(document).ready(function () {
            console.log('teast');
            $('#table').DataTable();
        });
    </script>
@stop
