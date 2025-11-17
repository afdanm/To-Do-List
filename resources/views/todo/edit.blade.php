@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit To-Do List</h2>

    <form action="{{ route('lists.update', $list->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">List Name</label>
            <input type="text" 
                   name="name" 
                   class="form-control" 
                   value="{{ old('name', $list->name) }}">

            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button class="btn btn-warning">Update</button>
        <a href="{{ route('lists.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
