@extends('adminlte::page')

@section('title', 'Upload')

@section('content_header')
<h1 class="m-0 text-dark"> Upload </h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">

                <div class="card-header">Add new book</div>

                <div class="card-body">

                    <a href="{{ route('books.index') }}" class="btn btn-primary">Return</a>
                    <br /><br />

                    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        Title:
                        <br>
                        <input type="text" name="title" class="form-control">

                        <br>

                        Cover File:
                        <br>
                        <input type="file" name="cover">

                        <br><br>

                        <button type="submit" class="btn btn-info" name="approve" id="approve">
                            <i class="fas fa-file-upload"></i> Upload
                        </button>


                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
