<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;

    protected $fillable = [
        'nurse_id',
        'token',
    ];

    public function nurse(){
        return $this->belongsTo(User::class);
    }
}
