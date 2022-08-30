<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Employee;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_update_setting()
    {
        $data = [
            "key" => "overtime_method",
            "value" => 1
        ];

        $this->post(route('setting.update'), $data)
            ->assertStatus(200)
            ->assertJson($data);
    }

    public function test_store_employee()
    {
        $data = [
            "name" => "Susano",
            "salary" => 5000000
        ];

        $this->post(route('employee.store'), $data)
            ->assertStatus(200)
            ->assertJson($data);
    }
    public function test_store_overtime()
    {
        $data = [
            "employee_id" => 1,
            "date" => "2022-08-19",
            "time_started" => "19:00",
            "time_ended" => "23:00"
        ];

        $this->post(route('overtime.store'), $data)
            ->assertStatus(200)
            ->assertJson($data);
    }
    public function test_calculate_overtime()
    {
        $this->json('GET', 'api/overtime-pays/calculate/2022-08' . 1, [], ['Accept' => 'application/json'])
        ->assertStatus(200);
    }

}
