<?php

namespace App\Models\Post\Traits\Relationship;

use App\Models\Access\User\User;
use App\Models\Post\PostType;
use App\Models\Space\Space;

trait PostRelationship
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
        return $this->hasOne(PostType::class, 'id', 'type');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function space()
    {
        return $this->hasOne(Space::class, 'id', 'space_id');
    }
}