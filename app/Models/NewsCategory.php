<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MetasisMedia\LaravelGenerator\Support\ModelHasUuid;
class NewsCategory extends Model
{
    use ModelHasUuid;
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = ['id','name','color','description',];
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
}
