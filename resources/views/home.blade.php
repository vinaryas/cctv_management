@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
<div class="row">
	<div class="col-lg-12 col-12">
        <a href="{{ route('form.index') }}">
            <div class="small-box bg-info">
                <div class="inner text-center">
                    <h1> Form CCTV </h1>
                    <br>
                </div>
                <div class="icon">
                    <i class="fas fa-file-invoice" style="color: rgb(255, 255, 255);"></i>
                </div>
            </div>
        </a>
	</div>

	{{-- <div class="col-lg-4 col-6">
		<div class="small-box bg-info">
			<div class="inner text-center">
                <h3>test</h3>
                <p>Test</p>
			</div>
			<div class="icon">
				<i class="fas fa-file" style="color: rgba(255, 255, 255, 0.5);"></i>
			</div>
		</div>
	</div>

	<div class="col-lg-4 col-6">
		<div class="small-box bg-info">
			<div class="inner text-center">
                <h3>test</h3>
                <p>Test</p>
			</div>
			<div class="icon">
				<i class="fas fa-file" style="color: rgba(255, 255, 255, 0.5);"></i>
			</div>
		</div>
	</div> --}}
</div>

@stop

@section('css')
@stop

@section('js')
@stop
