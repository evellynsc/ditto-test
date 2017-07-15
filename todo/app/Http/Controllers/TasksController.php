<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $todo = auth()->user()->tasks()->where('done', false)->get();

        return view('tasks.index', compact('todo'));
    }

    public function show($id)
    {

    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'title' => 'required'
        ]);

        Task::create([
            'title' => request('title'),
            'description' => request('description'),
            'user_id' => auth()->id()
        ]);

        return redirect('/tasks');
    }

    public function done($id)
    {
        Task::where('id', $id)->update(['done' => true]);

        return redirect('tasks');
    }
}
