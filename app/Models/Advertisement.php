<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;

    protected $table = 'advertisements';
    protected $fillable = ['title', 'description'];

    public function photos()
    {
        return $this->hasMany(Photo::class, 'advertisement_id', 'id');
    }
}
