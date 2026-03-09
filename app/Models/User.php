<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, HasUuids;

    // Tell Laravel the primary key is NOT auto-incrementing
    public $incrementing = false;

    // Primary key type is string
    protected $keyType = 'string';

    protected $fillable = [
        'name', 'email', 'password', 'plan_id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // Relationships
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}