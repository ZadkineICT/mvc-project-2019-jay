<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Http\Requests\StoreEmployeesRequest;
use App\Http\Requests\UpdateEmployeesRequest;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create employees',['only' => ['create', 'store']]);
        $this->middleware('permission:edit employees',['only' => ['edit', 'update']]);
        $this->middleware('permission:delete employees',['only' => ['delete', 'destroy']]);
    }

    public function index()
    {
        //
        $employees = Employee::all();

        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()//
    {
        //
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeesRequest $request)
    {
        //
        $employee = new Employee();
        $employee->date_of_birth = $request->date_of_birth;
        $employee->position = $request->position;
        $employee->user_id = $request->user_id;
        $employee->hotel_id = $request->hotel_id;

        $employee->save();

        return redirect()->route('employees.index')->with('status', 'Added Employee');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeesRequest $request, Employee $employee)
    {
        //
        $employee->date_of_birth = $request->date_of_birth;
        $employee->position = $request->position;
        $employee->user_id = $request->user_id;
        $employee->hotel_id = $request->hotel_id;

        $employee->save();

        return redirect()->route('employees.index')->with('status', 'Updated Employee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function delete(Employee $employee)
    {
        //
        return view('employees.delete', compact('employee'));
    }

    public function destroy(Employee $employee)
    {
        //
        $employee->delete();
        return redirect()->route('employees.index')->with('status', 'Employee deleted');
    }
}
