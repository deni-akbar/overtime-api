<?php

namespace App\Http\Controllers;

use App\Models\Overtime;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class OvertimeController extends Controller
{
    protected $overtime;

    public function __construct(Overtime $overtime){
        $this->overtime = $overtime;
    }
        
    public function store(Request $request){
        
        $request->validate([
            'date' => 'required|unique:overtimes'
        ]);

        $overtime = $this->overtime->createOvertime($request->all());
        
        return response()->json($overtime);
    }

    public function overtimePays($month){
        
        $overtime = $this->overtime->getCalculate($month);
        if($overtime){
            return response()->json($overtime);
        }
        return response()->json(["msg"=>"overtime not found"],404);
    }

}
