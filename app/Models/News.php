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
        'user_id',
        'news_category_id',
        'title',
        'slug',
        'description',
        'details',
        'featured_image',
        'is_hidden',
    ];

    /**
     * @throws \Exception
     */
    public function getCreatedAtAttribute($date){
        $d = new \DateTime($date);
        return $d->format('m/d/Y h:i a');
    }
    /**
     * @throws \Exception
     */
    public function getUpdatedAtAttribute($date){
        $d = new \DateTime($date);
        return $d->format('m/d/Y h:i a');
    }

    public function category(){
        return $this->belongsTo(NewsCategory::class,'news_category_id','id');
    }

    public function author(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
