<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqEntry extends Model
{
    use HasFactory;
    protected $table = 'faqs';

    protected $fillable = ['question', 'answer', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
