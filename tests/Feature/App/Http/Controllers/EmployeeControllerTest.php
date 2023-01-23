<?php

namespace App\Http\Controllers;

use App\Models\EmployeeModel;
use App\Models\GoalModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class EmployeeControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testUpdateGoalEvaluationForEmployee()
    {
        $employee = EmployeeModel::factory()->create();
        $goal = GoalModel::factory()->create([
            'employee_id' => $employee->id
        ]);

        $response = $this->post(
            'api/employee/goal',
            [
                'employee_id' => $employee->id,
                'progress' => 34,
                'goal_id' => $goal->id,
            ]
        );

        $response->assertOk()
            ->assertJson([
                "message" => "Employee's goal evaluation has been saved"
            ]);
    }

    public function testInvalidEmployeeId()
    {
        $employee = EmployeeModel::factory()->create();
        $goal = GoalModel::factory()->create([
            'employee_id' => $employee->id
        ]);

        $response = $this->post(
            'api/employee/goal',
            [
                'employee_id' => 10,
                'progress' => 34,
                'goal_id' => $goal->id,
            ]
        );

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJson([
                "message" => "The selected employee id is invalid."
            ]);
    }
}
