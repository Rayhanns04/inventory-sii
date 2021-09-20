<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    use HasFactory;

    public function reportConditions()
    {
        return $this->hasMany(ReportCondition::class);
    }

    public function reports()
    {
        return $this->hasOneThrough(Report::class, ReportCondition::class);
    }
}
