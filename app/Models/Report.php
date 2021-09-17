<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = ['note', 'stuff_id', 'user_id'];

    public function stuff()
    {
        return $this->belongsTo(Stuff::class);
    }
    public function condition()
    {
        return $this->belongsTo(Condition::class);
    }
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    public function reportConditions()
    {
        return $this->hasMany(ReportCondition::class);
    }
}
