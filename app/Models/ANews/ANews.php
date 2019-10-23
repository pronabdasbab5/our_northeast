<?php

namespace App\Models\ANews;

use Illuminate\Database\Eloquent\Model;

class ANews extends Model
{
    protected $table = 'assamese_news';

    protected $fillable = [
    	'top_category_id', 'sub_category_id', 'image', 'heading', 'short_desc', 'long_desc', 'status'
    ];
}
