<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = Task::where('user_id', Auth::id());
    
        if ($request->has('search')) {
            $tasks->where('title', 'like', '%' . $request->input('search') . '%');
        }
    
        $tasks = $tasks->paginate(10);
    
        return view('tasks.index', compact('tasks'));
    }


    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'status' => 'required',
            'priority' => 'required',
            'due_date' => 'nullable|date',
        ]);
    
        $validatedData['user_id'] = Auth::id();
    
        Task::create($validatedData);
    
        Toastr::success('Task created successfully!', 'Success');
        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function show(Task $task)
    {
        $this->authorize('view', $task);
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        if (Auth::user()->role == 'admin') {
            return view('tasks.edit', compact('task'));
        }
    
        if ($task->user_id == Auth::id()) {
            return view('tasks.edit', compact('task'));
        }
    
        return redirect()->back()->with('error', 'You are not authorized to edit this task.');
    }

    public function update(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'status' => 'required',
            'priority' => 'required',
            'due_date' => 'nullable|date',
        ]);
    
        $task->update($validatedData);
    
        Toastr::success('Task updated successfully.', 'Success');
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        if (Auth::user()->role == 'admin') {
            $task->delete();
            return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
        }

        if ($task->user_id == Auth::id()) {
            $task->delete();
            Toastr::success('Task deleted successfully.', 'Success');
            return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
        }
    
        return redirect()->back()->with('error', 'You are not authorized to delete this task.');
    }
}