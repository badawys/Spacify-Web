<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Model;

class PostType extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
}
