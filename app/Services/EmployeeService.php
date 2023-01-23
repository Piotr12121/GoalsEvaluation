<?php

namespace App\Services;

use App\Http\Requests\UpdateEmployeeGoalRequest;
use App\Repositories\EmployeeRepository;
use App\Traits\ApiTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class EmployeeService
{
    use ApiTrait;

    public function __construct(private readonly EmployeeRepository $employeeRepository)
    {
    }

    public function updateEmployeeGoal(UpdateEmployeeGoalRequest $request): JsonResponse
    {
        $data = $request->only([
            'employee_id',
            'progress'
        ]);

        $employee = $this->employeeRepository->getById($data['employee_id']);
        DB::beginTransaction();
        try {
            $employee->goal()->update($data);
            DB::commit();
            return $this->jsonResponse([
                "message" => "Employee's goal evaluation has been saved"
            ], Response::HTTP_OK);
        } catch (\Throwable $exception) {
            DB::rollBack();
            return $this->jsonResponse([
                "message" => "Goal cannot be evaluated at this moment"
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
