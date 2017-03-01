<?php
namespace App\Models\Space\Traits\Scope;


use Illuminate\Support\Facades\DB;

trait SpaceScope {

    public function ScopeNearby($query,$from_latitude,$from_longitude,$distance) {
        // This will calculate the distance in km
        // if you want in miles use 3959 instead of 6371
        $raw = DB::raw('ROUND ( ( 6371 * acos( cos( radians('.$from_latitude.') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('.$from_longitude.') ) + sin( radians('.$from_latitude.') ) * sin( radians( lat ) ) ) ) ) AS distance');
        return $query->select('*')->addSelect($raw)->orderBy( 'distance', 'ASC' )->groupBy('distance')->having('distance', '<=', $distance);
    }
}