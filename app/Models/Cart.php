<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Cart extends Model
{
    use HasFactory;

    protected $table ='cart';

    protected $fillable = [
        'user_id', 'product_id', 'product_name', 'product_price', 'product_image',
        'rental_start_date', 'rental_end_date','total_price','quantity',  'notes', 'status',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }


}
