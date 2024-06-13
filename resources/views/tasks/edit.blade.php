@extends('layouts.app')

@section('content')
<div class="container">
@foreach (['error', 'warning', 'info', 'success'] as $key)
        @if (Session::has($key))
            <div class="alert alert-{{ $key }}">
                {!! Session::get($key) !!}
            </div>
        @endif
    @endforeach
    <h1>Edit Task</h1>

    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $task->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control">{{ $task->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>
        <div class="form-group">
            <label for="priority">Priority</label>
            <select name="priority" id="priority" class="form-control">
                <option value="low" {{ $task->priority == 'low' ? 'selected' : '' }}>Low</option>
                <option value="medium" {{ $task->priority == 'medium' ? 'selected' : '' }}>Medium</option>
                <option value="high" {{ $task->priority == 'high' ? 'selected' : '' }}>High</option>
            </select>
        </div>
        <div class="form-group">
            <label for="due_date">Due Date</label>
            <input type="date" name="due_date" id="due_date" class="form-control" value="{{ $task->due_date }}">
        </div>
        <button type="submit" class="btn btn-primary">Update Task</button>
    </form>
</div>
@endsection
