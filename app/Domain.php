<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
}
