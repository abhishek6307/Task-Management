@extends('layouts.app')

@section('content')
<div class="container mt-4">
@foreach (['error', 'warning', 'info', 'success'] as $key)
        @if (Session::has($key))
            <div class="alert alert-{{ $key }}">
                {!! Session::get($key) !!}
            </div>
        @endif
    @endforeach
    <h1 class="mb-4">Task Details</h1>
    
    <!-- Task Details Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Field</th>
                    <th scope="col">Details</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Title</th>
                    <td>{{ $task->title }}</td>
                </tr>
                <tr>
                    <th scope="row">Description</th>
                    <td>{{ $task->description }}</td>
                </tr>
                <tr>
                    <th scope="row">Status</th>
                    <td>{{ $task->status }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Action Buttons -->
    <div class="d-flex justify-content-between mt-3">
        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning">
            <i class="fas fa-edit"></i> Edit
        </a>
        <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this task?');" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">
                <i class="fas fa-trash-alt"></i> Delete
            </button>
        </form>
    </div>
</div>
@endsection
