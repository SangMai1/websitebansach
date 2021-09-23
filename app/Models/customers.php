<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class customers extends Model
{
    use SoftDeletes;
    public $timestamps = true;
    protected $table = "customers";
    protected $fillable = ["id", "code", "name", "email", "password", "phone"];
}
