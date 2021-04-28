<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MetasisMedia\LaravelGenerator\Support\ModelHasUuid;
class News extends Model
{
    use ModelHasUuid;
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = [
        'id',
        'news_category_id',
        'title',
        'slug',
        'description',
        'details',
        'featured_image',
        'is_hidden',
    ];
}
