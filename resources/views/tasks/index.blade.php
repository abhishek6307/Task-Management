@extends('layouts.app')

@section('content')
<div class="container mt-5">
    @foreach (['error', 'warning', 'info', 'success'] as $key)
        @if (Session::has($key))
            <div class="alert alert-{{ $key }}">
                {!! Session::get($key) !!}
            </div>
        @endif
    @endforeach
    <form action="{{ route('tasks.index') }}" method="GET" class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>

    <h1>Your Tasks</h1>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Add Task</a>

    <div class="table-responsive mt-3">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Priority</th>
                    <th>Due Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tasks as $task)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>
                            <span class="badge badge-{{ $task->status == 'completed' ? 'success' : 'warning' }}">
                                {{ ucfirst($task->status) }}
                            </span>
                        </td>
                        <td>
                            <span class="badge badge-{{ $task->priority == 'high' ? 'danger' : ($task->priority == 'medium' ? 'warning' : 'primary') }}">
                                {{ $task->priority}}
                            </span>
                        </td>
                        <td>{{ $task->due_date }}</td>
                        <td>
                            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">No tasks available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
