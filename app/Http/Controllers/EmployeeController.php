<?php

namespace App\Http\Controllers;

use App\Company;
use App\Department;
use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
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
        $employees = Employee::with(['company:id,name','department:id,name'])->get();
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::pluck('name','id');
        return view('employees.create', compact('companies'));
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
            'company'    => ['required'],
            'department' => ['required'],
            'first_name'    => ['required','string','min:3','max:25'],
            'last_name'     => ['required','string','min:3','max:25'],
            'position'      => ['required','string']
        ]);

        $employee = Employee::create([
            'company_id'    => $request->company,
            'department_id' => $request->department,
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'avatar'        => $request->avatar,
            'email'         => $request->email,
            'position'      => $request->position,
            'extension'     => $request->extension,
            'mobile'        => $request->mobile,
            'skype'        => $request->skype,
        ]);

        return redirect()->route('employees.index')->with('success', __('Employee created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return $employee;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $companies = Company::pluck('name','id');
        return view('employees.edit', compact('employee','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'company'    => ['required'],
            'department' => ['required'],
            'first_name' => ['required','string','min:3','max:25'],
            'last_name'  => ['required','string','min:3','max:25'],
            'position'   => ['required','string']
        ]);

        $employee->update([
            'company_id'    => $request->company,
            'department_id' => $request->department,
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'avatar'     => $request->avatar,
            'email'         => $request->email,
            'position'      => $request->position,
            'extension'     => $request->extension,
            'mobile'        => $request->mobile,
            'skype'         => $request->skype,
        ]);

        return redirect()->route('employees.index')->with('success', __('Employee updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        // return $employee;

        $employee->delete();

        return redirect()->route('employees.index')->with('success', __('Employee deleted'));
    }

}
