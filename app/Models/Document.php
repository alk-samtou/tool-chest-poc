<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use MetasisMedia\LaravelGenerator\Support\ModelHasUuid;

class Document extends Model
{
    use ModelHasUuid;
    use HasFactory;
    protected $casts = [
        'created_at' => 'datetime:m/d/Y',
        'updated_at' => 'datetime:m/d/Y',
    ];
    protected $guarded = ['id'];
    protected $fillable = [
        'added_by_user',
        'document_category_id',
        'document_permission',
        'password',
        'title',
        'description',
        'original_file_name',
        'file_name',
        'file_path',
        'is_featured',
        'is_hidden',
    ];
    public function category(): BelongsTo{
        return $this->belongsTo(DocumentCategory::class,'document_category_id','id');
    }

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
