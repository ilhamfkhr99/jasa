<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = ['content_id', 'image'];

    public function content()
    {
        return $this->belongsTo(Content::class);
    }
}
