<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    // Kolom yang dilindungi dari mass assignment (hanya 'id' yang tidak boleh diisi manual)
    protected $guarded = ['id'];

    // Relasi: Satu category memiliki banyak posts (One-to-Many)
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'category_id');
        // 'category_id' adalah foreign key di tabel posts
    }
}
