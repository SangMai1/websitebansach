<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userandmissons extends Model
{
    public $timestamps = false;
    protected $table = "userandmissons";
    protected $fillable = ["id_user", "id_misson"];
}
