<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model
{
    use HasFactory;
    protected $fillable = ['book_id', 'image', 'english', 'indonesian'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function getExcerpt()
    {
        return Str::limit(strip_tags($this->english), 25);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($page) {
            if ($page->image) {
                Storage::delete($page->image);
            }
        });

        static::updating(function ($page) {
            if ($page->isDirty('image') && ($page->getOriginal('image') !== null)) {
                Storage::delete($page->getOriginal('image'));
            }
        });
    }
}
