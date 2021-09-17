<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stuff extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'room_id'];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    // public function rooms()
    // {
    //     return $this->belongsToMany(Room::class);
    // }
}
