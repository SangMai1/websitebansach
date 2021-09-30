<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class change_product_orders extends Model
{
    use SoftDeletes;
    public $timestamps = true;
    protected $table = "change_product_orders";
    protected $fillable = ["id", "order_details_id", "reason"];
}
