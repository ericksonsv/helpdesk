<?php

namespace App\Http\Controllers;

use App\Company;
use App\Department;
use App\Employee;
use App\Task;
use Illuminate\Http\Request;

class DashboardController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard.index', [
            'companies'         => Company::count(),
            'departments'       => Department::count(),
            'employees'         => Employee::count(),
            'tasks'             => Task::count(),
            'incompletedTasks'  => Task::where('status', 0)->paginate(5)
        ]);
    }
}
