<?php

namespace App\Models;
use App\Models\Order;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['name','description']; // have access
    // protected $fillable=['name','description']; don't have access

    function orders(){
        return $this->hasMany(Order::class);
    }

    function products(){
        return $this->hasMany(Product::class);
    }

}
