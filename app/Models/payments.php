<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class payments extends Model
{
    use SoftDeletes;
    public $timestamps = true;
    protected $table = "payments";
    protected $fillable = ["id", "method", "status"];
}
