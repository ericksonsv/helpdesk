<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::with('assignedTo:id,first_name,last_name','requestedBy:id,first_name,last_name')->get();
        $employees = Employee::all();
        return view('tasks.index', compact('employees','tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::select('id','first_name','last_name')->get();
        return view('tasks.create', compact('employees'));
    }

    /**     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required','string','max:50','min:6'],
            'requested' => ['required'],
            'assigned' => ['required'],
            'status' => ['required']
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.index')->with('success', __('Task created'));
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
    public function edit(Task $task)
    {
        $employees = Employee::select('id','first_name','last_name')->get();
        return view('tasks.edit', compact('task','employees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title'         => ['required','string','max:50','min:6'],
            'assigned'      => ['required'],
            'status'     => ['required']
        ]);

        $task->title = $request->title;
        $task->description = $request->description;
        $task->assigned = $request->assigned;
        $task->status = $request->status;
        $task->save();

        return redirect()->route('tasks.index')->with('success', __('Task updated'));
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
