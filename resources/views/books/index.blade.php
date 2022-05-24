@extends('adminlte::page')

@section('title', 'Download')

@section('content_header')
<h1 class="m-0 text-dark"> Download </h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Books list</div>

                <div class="card-body">

                    <a href="{{ route('books.create') }}" class="btn btn-primary">Add new book</a>
                    <br /><br />

                    <table class="table">
                        <tr>
                            <th>Title</th>
                            <th>Download file</th>
                        </tr>
                        @forelse ($books as $book)
                            <tr>
                                <td>{{ $book->title }}</td>
                                <td><a href="{{ route('books.download', $book->uuid) }}"class="btn btn-primary btn-sm"><i class="fas fa-file-download"></i> Download </a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2">No books found.</td>
                            </tr>
                        @endforelse
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
