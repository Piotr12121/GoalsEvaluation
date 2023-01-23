<?php

namespace App\Http\Controllers;

use App\Models\EmployeeModel;
use App\Models\GoalModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmployeeControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testSaveGoalEvaluationForEmployee()
    {
        $employee = EmployeeModel::factory()->create();
        $goal = GoalModel::factory()->create([
            'employee_id' => $employee->id
        ]);

        $response = $this->patch(
            'api/employee/goal',
            [
                'employee_id' => $employee->id,
                'progress' => 34,
                'goal_id' => $employee->id,
            ]
        );

        $response->assertOk();
    }
}
