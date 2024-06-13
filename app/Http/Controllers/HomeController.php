<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard(Request $request)
    {
        $totalTasks = Task::count();
        $pendingTasks = Task::where('status', 'pending')->count();
        $completedTasks = Task::where('status', 'completed')->count();
        $tasks = Task::query();
    
        // Filter by user name
        if ($request->has('user')) {
            $tasks->whereHas('user', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->input('user') . '%');
            });
        }
    
        if ($request->has('search')) {
            $tasks->where('title', 'like', '%' . $request->input('search') . '%');
        }
    
        $tasks = $tasks->with('user')->paginate(10);
        $users = User::pluck('name', 'id');
    
        return view('dashboard', compact('totalTasks', 'pendingTasks', 'completedTasks', 'tasks', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
