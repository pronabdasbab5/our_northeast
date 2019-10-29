<?php

namespace App\Models\ENews;

use Illuminate\Database\Eloquent\Model;

class ENews extends Model
{
    protected $table = 'english_news';

    protected $fillable = [
    	'top_category_id', 'sub_category_id', 'image', 'heading', 'short_desc', 'long_desc', 'status'
    ];
}
