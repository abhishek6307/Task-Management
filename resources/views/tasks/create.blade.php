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
    <h1>Create Task</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control" required>
            <option value="pending">Pending</option>
            <option value="completed">Completed</option>
        </select>
    </div>
    <div class="form-group">
        <label for="priority">Priority</label>
        <select name="priority" id="priority" class="form-control">
            <option value="low">Low</option>
            <option value="medium">Medium</option>
            <option value="high">High</option>
        </select>
    </div>
    <div class="form-group">
        <label for="due_date">Due Date</label>
        <input type="date" name="due_date" id="due_date" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Save Task</button>
</form>

</div>
@endsection
