<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $table = 'photos';
    protected $fillable = ['url'];
    protected $appends = array('urlabs');

    public function advertisement()
    {
        return $this->hasMany(Advertisement::class, 'advertisement_id', 'id');
    }

    public function getUrlabsAttribute()
    {
        return asset('storage/' . $this->url);
    }
}
