<?php

namespace App\Models\ASCategory;

use Illuminate\Database\Eloquent\Model;

class ASCategory extends Model
{
    protected $table = 'assamese_sub_category';

    protected $fillable = ['top_category_id', 'sub_category'];
}
