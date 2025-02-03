<?php

namespace App\Models;

use App\Casts\MoneyCast;
use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Livewire\WithPagination;
use Money\Currency;
use Money\Money;

class Product extends Model
{
    /** @use HasFactory<ProductFactory> */
    use HasFactory;

    protected $casts = [
      'price' =>  MoneyCast::class,
    ];

    public function variants(): HasMany
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function image(): hasOne
    {
        return $this->hasOne(Image::class)->ofMany('featured', 'max');
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }
}
