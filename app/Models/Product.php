<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded =['id'];


    public function productClass()
    {
        return $this->belongsTo(ProductClass::class);
    }
    public function productGroup()
    {
        return $this->belongsTo(ProductGroup::class);
    }
}
