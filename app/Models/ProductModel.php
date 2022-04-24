<?php

namespace App\Models;

use App\MyApp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = "product";
    protected $fillable = ["name", "id_type", "created_at", "updated_at"];
    protected $casts = MyApp::datetime;
}
