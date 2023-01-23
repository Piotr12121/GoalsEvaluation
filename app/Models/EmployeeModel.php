<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class EmployeeModel extends Model
{
    use HasFactory;

    protected $table = 'employees';
    public $timestamps = false;

    public function goal(): HasOne
    {
        return $this->HasOne(GoalModel::class, 'employee_id');
    }
}
