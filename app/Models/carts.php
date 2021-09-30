<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class carts extends Model
{
    use SoftDeletes;
    public $timestamps = true;
    protected $table = "carts";
    protected $fillable = ["id", "customer_id", "product_id", "product_name", "product_price", "product_quantity", "status"];
}
