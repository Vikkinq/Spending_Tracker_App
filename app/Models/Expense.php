<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Expense extends Model
{
    use HasFactory;

    public $incrementing = false; // UUID is not auto-increment
    protected $keyType = 'string'; // primary key is a string

    protected $fillable = [
        'user_id',
        'title',
        'amount',
        'category_id',
        'spent_on',
        'notes',
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            if (!$model->id) {
                $model->id = (string) Str::uuid(); // generate UUID v4
            }
        });
    }

    // Optional: relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}