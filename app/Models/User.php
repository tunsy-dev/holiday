<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
            'current_allowance'
    ];

    public function allowances () {
        return $this->hasMany(Allowance::class);
    }
    public function this_years_allowances() {
        return $this->hasMany(Allowance::class)->where('year',2021);
    }

    public function getCurrentAllowanceAttribute()
    {
        return $this->this_years_allowances->first()->number_hours_year;
    }

    public function manager () {
        return $this->belongsTo(User::class, 'manager_id', 'id');
    }
    public function employees () {
        return $this->hasMany(User::class, 'manager_id', 'id');
    }
    public function requests () {
        return $this->hasManyThrough(Request::class, Allowance::class);
    }

}
