<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Employee extends Model
{
    use HasFactory;

    protected $table="employees";

    /**
     * @param array $attributes
     * @return Employee
     */

    public $ruleCreate=[
        'name'=>'required',
        'salary'=>'required',
    ];


    public function createEmployee(array $attributes){

        $employee = new self();
        $employee->name = $attributes["name"];
        $employee->salary = $attributes["salary"];
        $employee->save();
        return $employee;
    }

}
