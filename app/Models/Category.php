<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // protected $table = 'categories';
    protected $fillable = ['id', 'name'];

    public function content()
    {
        return $this->hasMany(Content::class);
    }
    public function about()
    {
        return $this->hasMany(About::class);
    }
}
