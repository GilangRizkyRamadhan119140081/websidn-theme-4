<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'slug',
        'id_kategori',
        'deskripsi_singkat',
        'keyword',
        'deskripsi',
        'status',
        'date',
        'image',
        'nama_penulis',
    ];

    public function kategoris()
    {
        return $this->belongsTo(Blogkategoris::class,'id_kategori');
    }
    public function tags()
    {
        return $this->belongsToMany(Blogtags::class, 'multitagblog', 'blog_id', 'blogtag_id');
    }
    public function getShortDescriptionAttribute()
{
    $words = str_word_count($this->deskripsi, 1);
    $shortDescription = implode(' ', array_slice($words, 0, 10));

    return $shortDescription;
}
}
