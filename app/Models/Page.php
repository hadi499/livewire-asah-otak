<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
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
}
