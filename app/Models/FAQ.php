<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    protected $fillable = ['question', 'answer', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
