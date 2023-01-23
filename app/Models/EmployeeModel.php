<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EmployeeModel extends Model
{
    use HasFactory;

    protected $table = 'employees';
    public $timestamps = false;

    public function goals(): HasMany
    {
        return $this->hasMany(GoalModel::class, 'employee_id');
    }
}
