<?php

namespace App\Models\Post;

use App\Models\Post\Traits\Relationship\PostRelationship;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use PostRelationship;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'type', 'space_id', 'data'];
}
