<?php

namespace App\Models\Space;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Space
 */
class Space extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'spaces';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'type', 'lng', 'lat', 'data', 'photo', 'description', 'user_id'];
}
