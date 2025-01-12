<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'status', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
