<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

        protected $fillable = [
            "name",
            "price",
            "description",
            "image"];


    public function orders() : HasMany
    {
        return $this->hasMany(Order::class);
    }

}
