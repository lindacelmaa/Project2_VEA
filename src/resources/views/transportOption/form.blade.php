@extends('layout')
@section('content')
	<h1>{{ $title }}</h1>
	@if ($errors->any())
		<div class="alert alert-danger">Please fix the errors!</div>
	@endif
	<form method="post" action="{{ $transportOption->exists ? '/transportOptions/patch/' . $transportOption->id : '/transportOptions/put' }}">
		@csrf
		<div class="mb-3">
			<label for="transportOption-name" class="form-label">Transport option name</label>
			<input
				type="text"
				class="form-control @error('name') is-invalid @enderror"
				id="transportOption-name"
				name="name"
				value="{{ old('name', $transportOption->name) }}">
			@error('name')
				<p class="invalid-feedback">{{ $errors->first('name') }}</p>
			@enderror
		</div>
		<button type="submit" class="btn btn-primary">Save</button>
	</form>
@endsection
