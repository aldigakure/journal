<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'name',
        'email',
        'phone',
        'address'
    ];

    public function journals()
    {
        return $this->hasMany(Journal::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}