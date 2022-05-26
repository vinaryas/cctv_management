@extends('adminlte::page')

@section('title', 'History')

@section('content_header')
    <h1 class="m-0 text-dark font-weight-bolder"> History </h1>
@stop

@section('content')
<form class="card" action="{{ route('history.index') }}" method="GET" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="card-body">
        <table class="table table-bordered table-striped" id="table" style="width: 100%;">
            <thead>
                <tr>
                    <th> Tgl finish </th>
                    <th> created_by </th>
                    <th> approved_by </th>
                    <th> status </th>
                    <th> File </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $detail)
                    <tr>
                        <td>{{ $detail->created_at }}</td>
                        <td>{{ $detail->created_name }}</td>
                        <td>{{ $detail->approved_name }}</td>
                        <td>{{ $detail->status }}</td>
                        <td><a href="{{ route('video.download', $detail->uuid) }}" class="btn btn-primary btn-sm"><i class="fas fa-file-download"></i> Download  </a></td>
                        {{-- <td> <a href="" class="btn btn-primary btn-sm"><i class="fas fa-angle-right"></i> Download </a> </td> --}}
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
