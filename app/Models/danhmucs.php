<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class danhmucs extends Model
{
    use SoftDeletes;
    public $timestamps = true;
    protected $table = "danhmucs";
    protected $fillable = ["id", "code", "name", "create_by", "update_by"];
}
