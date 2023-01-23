<?php

 namespace App\Repositories;

 use App\Models\EmployeeModel;
 use Illuminate\Database\Eloquent\ModelNotFoundException;

 class EmployeeRepository
 {
     public function getById(int $id): EmployeeModel|ModelNotFoundException
     {
         return EmployeeModel::findOrFail($id);
     }
 }
