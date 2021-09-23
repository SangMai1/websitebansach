<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class slides extends Model
{
    use SoftDeletes;
    public $timestamps = true;
    protected $table = "slides";
    protected $fillable = ["id", "code", "name", "file_path", "create_by", "update_by"];
}
