<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'excerpt',
        'body',
        'image_path',
        'is_published',
        'min_to_read',
        'user_id',
    ];

    //One to Many Relation
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //One to One Relation
    public function meta()
    {
        return $this->hasOne(PostMeta::class);
    }

    //Many to Many Relation
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    // protected $table = 'posts';

    // protected $primaryKeY = 'title';

    // protected $timestamps = false;

    // protected $dateTime = 'u';

    // protected $connection = 'sqlite';

    // protected $attributes = [
    //     'is_published' => true,
    // ];
}
