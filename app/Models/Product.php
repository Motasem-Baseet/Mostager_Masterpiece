<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'user_id', 'name', 'description', 'category_id' , 'price_per_day', 'status', 'product_image' ,'quantity',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }


    public function cart(){
        return $this->hasMany(Cart::class);
    }


    public function rentals()
    {
        return $this->hasMany(Rental::class, 'product_id');
    }
}



