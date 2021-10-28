<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected $employee;

    public function __construct(Employee $employee)
    {
        $this->employee = $employee;
    }

    public function index()
    {
        return view('pages.employees.index', ["employees" => $this->employee->orderBy('id', 'DESC')->get()]);
    }

    public function form($id = null)
    {
        return view('pages.employees.form', ['data' => $this->employee->find($id) ?? null]);
    }

    public function save(Request $request)
    {
        $this->employee->updateOrCreate(['id' => $request->id], $request->all());
        return redirect()->route('employees')->with(['message' => 'Employee saved successfully']);
    }

}
