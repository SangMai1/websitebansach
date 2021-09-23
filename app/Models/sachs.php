<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class sachs extends Model
{
    use SoftDeletes;
    public $timestamps = true;
    protected $table = "sachs";
    protected $fillable = ["id", "code", "name", "id_danhmuc", "file_path", "create_by", "update_by"];
}
