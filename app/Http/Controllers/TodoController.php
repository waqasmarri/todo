<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (session()->has('timezone') || $request->filled('timezone')) {
            Session::put('timezone', $request->timezone);
            $todos = Todo::all();
            return view('todo', compact('todos'));
        } else {
            return redirect()->route('checktimezone');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required|string',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
        ]);

        $todo = new Todo();
        $todo->task = $request->task;
        $todo->deadline = $request->date . ' ' .  $request->time;
        $todo->save();

        return back()->with('status', 'Task Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function complete(Todo $todo)
    {
        $todo->status = 1;
        $todo->save();

        return back()->with('status', 'Task Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();

        return back()->with('status', 'Task Added');
    }
}
