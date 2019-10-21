<?php

namespace App\Models\ESCategory;

use Illuminate\Database\Eloquent\Model;

class ESCategory extends Model
{
    protected $table = 'english_sub_category';

    protected $fillable = ['top_category_id', 'sub_category'];
}
