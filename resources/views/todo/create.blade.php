@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create New To-Do List</h2>

    <form action="{{ route('lists.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">List Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">

            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button class="btn btn-primary">Create</button>
        <a href="{{ route('lists.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
