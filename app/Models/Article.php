<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model {
    protected $guarded = [];

    public function explodedCategories () {
        $exploded = explode(',' , $this->categories);
    }
}
