<?php

namespace App\Http\Controllers;

use App\Company;
use App\Department;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DepartmentController extends Controller
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
        $departments = Department::with('company:id,name')->get();
        return view('departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::pluck('name','id');
        return view('departments.create', compact('companies'));
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
            'company' => ['required'],
            'name' => [
                'required',
                'string',
                'max:25',
                'min:6',
                Rule::unique('departments')->where(function($query){
                    return $query->where('company_id', request()->company);
                })
            ]
        ]);

        Department::create([
            'company_id' => $request->company,
            'name' => $request->name
        ]);

        return redirect()->route('departments.index')->with('success',__('Department Created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        return $department;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        $companies = Company::pluck('name','id');
        return view('departments.edit', compact('department','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $request->validate([
            'company' => ['required'],
            'name' => [
                'required',
                'string',
                'max:25',
                'min:6',
                Rule::unique('departments')->ignore($department->id)->where(function($query){
                    return $query->where('company_id', request()->company);
                })
            ]
        ]);

        $department->update([
            'company_id' => $request->company,
            'name' => $request->name
        ]);

        return redirect()->route('departments.index')->with('success',__('Department Updated'));
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
