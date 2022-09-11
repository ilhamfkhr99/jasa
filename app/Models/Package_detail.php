<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package_detail extends Model
{
    use HasFactory;

    protected $table = ['package_details'];
    protected $fillable = ['package_id', 'desc'];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
