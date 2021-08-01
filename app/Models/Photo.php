<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    use HasFactory;

    protected $table = 'photos';
    protected $fillable = ['url'];
    protected $appends = array('urlabs');

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($photo) {
            Storage::disk('public')->delete($photo->url); // todo if empty unlink also folder after
        });
    }

    public function advertisement()
    {
        return $this->hasMany(Advertisement::class, 'advertisement_id', 'id');
    }

    public function getUrlabsAttribute()
    {
        return asset('storage/' . $this->url);
    }
}
