<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $table = 'photos';
    protected $fillable = ['url'];

    public function advertisement()
    {
        return $this->hasMany(Advertisement::class, 'advertisement_id', 'id');
    }
}
