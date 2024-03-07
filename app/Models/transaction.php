<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    protected $fillabel =[
        'transfere_amount','user_id'
    ];
    use HasFactory;

    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }
}
