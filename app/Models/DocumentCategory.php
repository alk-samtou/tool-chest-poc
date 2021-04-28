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

    public function documents() : HasMany {
        return $this->hasMany(Document::class);
    }
}
