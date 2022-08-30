<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Overtime extends Model
{
    use HasFactory;

    protected $table="overtimes";

    /**
     * @param array $attributes
     * @return Overtime
     */
    public function createOvertime(array $attributes){
        $overtime = new self();
        $overtime->employee_id = $attributes["employee_id"];
        $overtime->date = $attributes["date"];
        $overtime->time_started = $attributes["time_started"];
        $overtime->time_ended = $attributes["time_ended"];
        $overtime->save();
        return $overtime;
    }

    public function getCalculate($month){
        $result=[];
        $explode=explode('-',$month);
        $getSetting= Setting::first();

        $employee=Employee::all();
        foreach($employee as $e){
            $overtime=[];
            $total=0;

            $getOvertime = $this->whereYear('date',$explode[0])->whereMonth('date',$explode[1])->where('employee_id',$e->id)->get();
            foreach($getOvertime as $item){
                $startTime = strtotime($item->time_started);
                $endTime = strtotime($item->time_ended);
                $diff=$endTime-$startTime;
                $hours = floor((int)($diff/60/60));
                $total+=$hours;

                $overtime[]=[
                    "id"=>$item->id,
                    "date"=>$item->date,
                    "time_started"=>$item->time_started,
                    "time_ended"=>$item->time_ended,
                    "overtime_duration"=>$hours
                ];
            }

            $val=preg_replace('/[^0-9]/', '', $getSetting->getReference->expression);
            $result[]=[
                "id"=>$e->id,
                "name"=>$e->name,
                "salary"=>$e->salary,
                "overtimes"=>$overtime,
                "overtime_duration_total"=>$total,
                "amount"=>($getSetting->value==1)?floor(($e->salary/$val)*$total):floor($val*$total)
            ];
        }

        return $result;
    }

}
