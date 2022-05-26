@extends('adminlte::page')

@section('title', 'Departemen Head')

@section('content_header')
<h1 class="m-0 text-dark"> Departemen Head </h1>
@stop

@section('content')
<form class="card" action="{{ route('dep_head.index') }}" method="GET">
    {{ csrf_field() }}
     <div class="card-body">
        <table class="table table-bordered table-striped" id="table" style="width: 100%;">
            <thead>
                <tr>
                    <th> Nama </th>
                    <th> Departemen </th>
                    <th> detail </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $detail)
                    <tr>
                        <td>{{ $detail->user_name }}</td>
                        <td> <a href="{{ route('dep_head.detail', $detail->user_id) }}" class="btn btn-info btn-sm"> Detail <i class="fas fa-info-circle"></i> </a>   </td>
                        <td> <a href="{{ route('dep_head.create', $detail->user_id) }}" class="btn btn-primary btn-sm"> Select Departemen <i class="fas fa-angle-right"></i> </a> </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
