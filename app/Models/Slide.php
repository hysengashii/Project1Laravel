<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slide extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'subtitle',
        'image',
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }
}
