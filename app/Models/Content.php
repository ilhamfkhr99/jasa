<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    // protected $guarded = [];

    protected $fillable = ['category_id', 'title', 'desc'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function file()
    {
        return $this->hasMany(File::class);
    }
}
