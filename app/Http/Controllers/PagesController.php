<?php

namespace App\Http\Controllers;

use App\Company;
use App\Department;
use App\Employee;
use App\Task;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function allTasks()
    {
    	// $tasks = Task::with(
    	// 	'requestedBy:id,company_id,department_id,first_name,last_name','requestedBy.company:id,name','requestedBy.department:id,company_id,name',
    	// 	'assignedTo:id,company_id,department_id,first_name,last_name','assignedTo.company:id,name','assignedTo.department:id,company_id,name'
    	// )->get();
        $tasks = Task::orderBy('created_at','DESC')->get();
    	return view('pages.tasks', compact('tasks'));
    }

    public function directory()
    {
        $companies = Company::all();
    	return view('pages.directory', compact('companies'));
    }

    public function signatures()
    {
        $employees = Employee::all();
        return view('pages.plain-signatures', compact('employees'));
    }

    public function seeders()
    {
        return view('seeders', [
            'companies'     => Company::all(),
            'departments'   => Department::all(),
            'employees'     => Employee::all()
        ]);
    }
}
