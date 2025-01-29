@extends('layout')

@section('content')
    <h1>{{ $title }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">Please fix the validation errors!</div>
    @endif

    <form method="post" action="{{ $visit->exists ? '/visits/patch/' . $visit->id : '/visits/put' }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="destination_country" class="form-label">Destination Country</label>
            <input 
                type="text" 
                id="destination_country" 
                name="destination_country" 
                value="{{ old('destination_country', $visit->destination_country) }}" 
                class="form-control @error('destination_country') is-invalid @enderror">
            @error('destination_country')
                <p class="invalid-feedback">{{ $errors->first('destination_country') }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="event_name" class="form-label">Event Name</label>
            <input 
                type="text" 
                id="event_name" 
                name="event_name" 
                value="{{ old('event_name', $visit->event_name) }}" 
                class="form-control @error('event_name') is-invalid @enderror">
            @error('event_name')
                <p class="invalid-feedback">{{ $errors->first('event_name') }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="leader_id" class="form-label">Leader</label>
            <select 
                id="leader_id" 
                name="leader_id" 
                class="form-select @error('leader_id') is-invalid @enderror">
                <option value="">Choose the leader</option>
                @foreach($leaders as $leader)
                    <option value="{{ $leader->id }}" 
                        @if ($leader->id == old('leader_id', $visit->leader_id ?? false)) selected @endif>
                        {{ $leader->name }}
                    </option>
                @endforeach
            </select>
            @error('leader_id')
                <p class="invalid-feedback">{{ $errors->first('leader_id') }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input 
                type="date" 
                id="start_date" 
                name="start_date" 
                value="{{ old('start_date', $visit->start_date) }}" 
                class="form-control @error('start_date') is-invalid @enderror">
            @error('start_date')
                <p class="invalid-feedback">{{ $errors->first('start_date') }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">End Date</label>
            <input 
                type="date" 
                id="end_date" 
                name="end_date" 
                value="{{ old('end_date', $visit->end_date) }}" 
                class="form-control @error('end_date') is-invalid @enderror">
            @error('end_date')
                <p class="invalid-feedback">{{ $errors->first('end_date') }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea 
                id="description" 
                name="description" 
                class="form-control @error('description') is-invalid @enderror">{{ old('description', $visit->description) }}</textarea>
            @error('description')
                <p class="invalid-feedback">{{ $errors->first('description') }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="cost" class="form-label">Cost</label>
            <input 
                type="number" 
                min="0.00" step="0.01" 
                id="cost" 
                name="cost" 
                value="{{ old('cost', $visit->cost) }}" 
                class="form-control @error('cost') is-invalid @enderror">
            @error('cost')
                <p class="invalid-feedback">{{ $errors->first('cost') }}</p>
            @enderror
        </div>
		
		<div class="mb-3">
			<label for="visit-image" class="form-label">Image</label>
			@if ($visit->image)
				<img
					src="{{ asset('images/' . $visit->image) }}"
					class="img-fluid img-thumbnail d-block mb-2"
					alt="{{ $visit->name }}"
				>
			@endif
			<input
				type="file" accept="image/png, image/webp, image/jpeg"
				id="visit-image"
				name="image"
				class="form-control @error('image') is-invalid @enderror"
			>
			@error('image')
				<p class="invalid-feedback">{{ $errors->first('image') }}</p>
			@enderror
		</div>


        <div class="mb-3">
            <div class="form-check">
                <input 
                    type="checkbox" 
                    id="display" 
                    name="display" 
                    value="1" 
                    class="form-check-input @error('display') is-invalid @enderror" 
                    @if (old('display', $visit->display)) checked @endif>
                <label class="form-check-label" for="display">
                    Publish
                </label>
                @error('display')
                    <p class="invalid-feedback">{{ $errors->first('display') }}</p>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary">
            {{ $visit->exists ? 'Update' : 'Create' }}
        </button>
    </form>
@endsection