<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookRating extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'user_id',
        'rating',
    ];

    public function book()
    {
        return $this->belongsTo(buku::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
