@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Dashboard</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Tasks</h5>
                    <p class="card-text">{{ $totalTasks }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Pending Tasks</h5>
                    <p class="card-text">{{ $pendingTasks }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Completed Tasks</h5>
                    <p class="card-text">{{ $completedTasks }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">

    <h1>All  Tasks</h1>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Add Task</a>

    <div class="table-responsive mt-3">
    <form action="{{ route('dashboard') }}" method="GET" class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
    <select class="form-control mr-sm-2" name="user">
        <option value="">All Users</option>
        @foreach ($users as $userId => $userName)
            <option value="{{ $userName }}">{{ $userName }}</option>
        @endforeach
    </select>
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Filter</button>
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Priority</th>
            <th>Due Date</th>
            <th>User</th>
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
                        {{ $task->priority }}
                    </span>
                </td>
                <td>{{ $task->due_date }}</td>
                <td>{{ $task->user->name }}</td>
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
                <td colspan="8">No tasks available.</td>
            </tr>
        @endforelse
    </tbody>
</table>
    </div>
</div>
@endsection
