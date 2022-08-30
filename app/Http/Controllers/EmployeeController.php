<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected $employee;

    public function __construct(Employee $employee){
        $this->employee = $employee;
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|unique:employees|max:255',
            'salary' => 'required|numeric|min:2000000|max:10000000',
        ]);

        $employee = $this->employee->createEmployee($request->all());
        
        return response()->json($employee);
    }

}
