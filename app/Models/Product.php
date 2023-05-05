<?php

namespace App\Models;

use App\Models\User;
use App\Models\Order;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'qty',
        'price',
        'description',
        'image',
    ];



    public function user(){
        return $this->belongsTo(User::class);
    }

    public function order(){
       return $this->belongsToMany(Order::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
