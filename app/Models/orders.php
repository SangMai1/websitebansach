<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class orders extends Model
{
    use SoftDeletes;
    public $timestamps = true;
    protected $table = "orders";
    protected $fillable = ["id", "customer_id", "shipping_id", "payment_id", "total", "status"];
}
