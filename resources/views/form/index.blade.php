@extends('adminlte::page')

@section('title', 'Form')

@section('content_header')
<h1 class="m-0 text-dark"> Tempat Daerah CCTV </h1>
@stop

@section('content')
<form class="card" action="{{ route('form.index') }}" method="GET">
    {{ csrf_field() }}
     <div class="card-body">
        <table class="table table-bordered table-striped" id="table" style="width: 100%;">
            <thead>
                <tr>
                    <th> Tempat CCTV </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($place as $detail)
                    <tr>
                        <td>{{ $detail->place }}</td>
                        <td> <a href="{{ route('form.create', $detail->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-angle-right"></i> Place </a> </td>
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
