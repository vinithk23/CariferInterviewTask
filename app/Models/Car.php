<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'reg_no',
        'model',
        'year',
        'color',
        'mileage',
        'image',
    ];

    public function getImageAttribute($value){
        return $value ? url('CarImages/'.$value) : '';
    }
}
