<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    //paginate
    public function scopePaginate($query, $perPage = 10)
    {
        return $query->orderBy('id', 'desc')->paginate($perPage);
    }

    protected $table = 'students';

    protected $fillable = [
        'name',
        'nim',
        'address',
        'phone',
        'birth_date',
    ];
}
