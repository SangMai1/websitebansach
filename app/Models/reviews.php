<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class reviews extends Model
{
    use SoftDeletes;
    public $timestamps = true;
    protected $table = "reviews";
    protected $fillable = ["id", "customer_id", "sach_id", "content"];
}
