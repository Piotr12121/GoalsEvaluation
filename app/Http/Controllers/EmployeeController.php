<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateEmployeeGoalRequest;
use App\Services\EmployeeService;
use Illuminate\Http\JsonResponse;

class EmployeeController extends Controller
{
    public function __construct(private readonly EmployeeService $employeeService)
    {
    }

    public function updateEmployeeGoal(UpdateEmployeeGoalRequest $request): JsonResponse
    {
        return $this->employeeService->updateEmployeeGoal($request);
    }
}
