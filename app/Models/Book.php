<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'author_id',
        'resume',
        'full_description',
        'cover_image_path',
        'hero_image_path',
        'price',
        'is_featured',
    ];

    /**
     * @return BelongsTo<Author, Book>
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }
}
