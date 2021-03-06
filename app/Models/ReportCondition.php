<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportCondition extends Model
{
    use HasFactory;

    protected $fillable = ['report_id', 'condition_id', 'quantity'];
    public $timestamps = false;

    public function report()
    {
        return $this->belongsTo(Report::class);
    }
}
