<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Advertisement extends Model
{
    use HasFactory;

    protected $table = 'advertisements';
    protected $fillable = ['title', 'description'];

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($advertisement) {
            foreach ($advertisement->photos as $photo) {
                Storage::disk('public')->delete($photo->url); // todo if empty unlink also folder after
            }
        });
    }

    public function photos()
    {
        return $this->hasMany(Photo::class, 'advertisement_id', 'id');
    }
}
