<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductModel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    protected $table = "products";

    protected $primaryKey =  "p_id";
    public const CREATED_AT = "p_created_at";
    public const UPDATED_AT = "p_updated_at";

    public function getPPriceAttribute()
    {
        $price = $this->attributes['p_price'];
        return number_format($price,2,".",",");
    }
}
