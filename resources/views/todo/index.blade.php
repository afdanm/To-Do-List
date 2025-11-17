@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">To-Do Lists</h2>

    <a href="{{ route('lists.create') }}" class="btn btn-primary mb-3">+ Add New List</a>

    @foreach ($lists as $list)
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between">
                <strong>{{ $list->name }}</strong>
                <div>
                    <a href="{{ route('lists.edit', $list->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    
                    <form action="{{ route('lists.destroy', $list->id) }}" 
                          method="POST" 
                          style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Delete this list?')" 
                                class="btn btn-sm btn-danger">
                            Delete
                        </button>
                    </form>
                </div>
            </div>

            <div class="card-body">
                <h5>Tasks</h5>

                {{-- Task List --}}
                @if ($list->tasks->count() > 0)
                    <ul class="list-group mb-3">
                        @foreach ($list->tasks as $task)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    @if ($task->is_done)
                                        <del>{{ $task->name }}</del>
                                        <span class="badge bg-success">Done</span>
                                    @else
                                        {{ $task->name }}
                                    @endif
                                </div>

                                <div>
                                    {{-- Mark Done --}}
                                    @if (!$task->is_done)
                                    <form action="{{ route('tasks.done', $task->id) }}" 
                                          method="POST" 
                                          style="display:inline">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-sm btn-success">Done</button>
                                    </form>
                                    @endif

                                    {{-- Delete Task --}}
                                    <form action="{{ route('tasks.destroy', $task->id) }}" 
                                          method="POST" 
                                          style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted">No tasks yet.</p>
                @endif

                {{-- Add Task --}}
                <form action="{{ route('tasks.store', $list->id) }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <input type="text" 
                               name="name" 
                               class="form-control" 
                               placeholder="New task...">
                        <button class="btn btn-primary">Add Task</button>
                    </div>

                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
