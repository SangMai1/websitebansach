<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class nhapkhos extends Model
{
    use SoftDeletes;
    public $timestamps = true;
    protected $table = "nhapkhos";
    protected $fillable = ["id", "code", "id_sach", "quantity", "price", "create_by", "update_by"];
}
