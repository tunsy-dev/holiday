<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Request extends Model
{
    use HasFactory;

    protected $fillable = [
        'status'
    ];

    protected $casts = [
     'start_date' => 'date',
     'end_date' => 'date'
    ];
    public function allowance () {
        return $this->belongsTo(Allowance::class);
    }

}
