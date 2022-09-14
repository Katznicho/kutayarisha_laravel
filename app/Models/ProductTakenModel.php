<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTakenModel extends Model
{
    use HasFactory;
    protected $table = "products_taken";
    protected $fillable = ['name', 'price', 'qty', 'type', 'date', 'person'];
}
