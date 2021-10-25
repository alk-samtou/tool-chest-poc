<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use MetasisMedia\LaravelGenerator\Support\ModelHasUuid;
class DocumentCategory extends Model
{
    use ModelHasUuid;
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = ['id','name','description'];
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
    public function documents() : HasMany {
        return $this->hasMany(Document::class);
    }
}
