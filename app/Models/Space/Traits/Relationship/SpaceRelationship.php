<?php
namespace App\Models\Space\Traits\Relationship;

use App\Models\Access\User\User;
use App\Models\Post\Post;
use App\Models\Space\SpaceType;

trait SpaceRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function createdBy()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function type()
    {
        return $this->hasOne(SpaceType::class, 'id', 'type');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

}