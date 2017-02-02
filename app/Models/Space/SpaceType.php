<?php

namespace App\Models\Space;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Space
 */
class SpaceType extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'spaces_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
}
