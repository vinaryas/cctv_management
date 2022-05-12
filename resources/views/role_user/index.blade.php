@extends('adminlte::page')

@section('title', 'Form')

@section('content_header')
<h1 class="m-0 text-dark">Role User</h1>
@stop

@section('content')
<form class="card" action="{{ route('role.index') }}" method="GET">
    {{ csrf_field() }}
     <div class="card-body">
        <table class="table table-bordered table-striped" id="table" style="width: 100%;">
            <thead>
                <tr>
                    <th> Nik </th>
                    <th> Name </th>
                    <th> Email </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $detail)
                    <tr>
                        <td>{{ $detail->nik }}</td>
                        <td>{{ $detail->name }}</td>
                        <td>{{ $detail->email }}</td>
                        <td> <a href="{{ route('role.create', $detail->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-angle-right"></i> Role </a> </td>
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
