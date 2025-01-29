@extends('layouts.app')

@section('content')
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Error 401') }}
		</h2>

	<div class="col-12-sm" >
		<a href="{{ url('/dashboard') }}" class="">
			<img src="{{ asset('images/errors/401-error.jpg') }}" class="img-fluid rounded " alt="">
		</a>
	</div>
@endsection
