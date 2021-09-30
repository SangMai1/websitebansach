<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class order_details extends Model
{
    use SoftDeletes;
    public $timestamps = true;
    protected $table = "order_details";
    protected $fillable = ["id", "order_id", "product_id", "product_name", "product_price", "status","product_quantity"];
}
