<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function domain()
    {
        return $this->hasMany(Domain::class);
    }
}
