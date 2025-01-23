<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ["content"];

    public function scopeContentSearch($query, $category_content)
    {
        if (!empty($category_id)) {
            $query->where("content" , $id);
        }
    }
}
