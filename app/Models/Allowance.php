<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allowance extends Model
{
    use HasFactory;

    protected $fillable = [
        'reason',
        'start_date',
        'end_date',
        'number_of_hours',
        'status'
    ];

    public function user () {
        return $this->belongsTo(User::class);
    }

    public function requests () {
        return $this->hasMany(Request::class);
    }
}