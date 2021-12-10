<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    use HasFactory;

    protected $fillable = [
        'referal_code',
        'points',
        'nurse_id',
    ];

    public function nurse(){
        return $this->belongsTo(User::class, 'nurse_id', 'id');
    }
}
