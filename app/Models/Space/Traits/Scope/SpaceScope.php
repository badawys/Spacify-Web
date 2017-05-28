<?php
namespace App\Models\Space\Traits\Scope;


use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

trait SpaceScope {

    /**
     * Query builder scope to list neighboring locations
     * within a given distance from a given location
     *
     * @param   Builder       $subQuery   Query builder instance
     * @param   mixed         $lng        Longitude of given location
     * @param   mixed         $lat        Lattitude of given location
     * @param   int           $radius     Optional distance
     * @param   string        $unit       Optional unit
     *
     * @return  mixed                     Modified query builder
     */
    public function scopeNearby($subQuery, $lng, $lat, $radius = 500, $unit = "m")
    {
//        $unit = ($unit === "m") ? 6378100 : 6378.10;
//        $lat = (float) $lat;
//        $lng = (float) $lng;
//        $radius = (double) $radius;
//        //Generating Query
//        $item_distance_query = "*,
//                            ($unit * ACOS(COS(RADIANS($lat))
//                                * COS(RADIANS(lat))
//                                * COS(RADIANS($lng) - RADIANS(lng))
//                                + SIN(RADIANS($lat))
//                                * SIN(RADIANS(lat)))) AS distance";
//
//        $subQuery->getQuery()->selectRaw($item_distance_query,
//            [$lat, $lng, $lat]
//        );
//        $rawQuery = self::getSql($subQuery);
//        return DB::table(DB::raw("(" . $rawQuery . ") as item"))
//            ->where('distance', '<', $radius)
//            ->whereIn('type', [1,2]);

        return DB::table('spaces')
            ->whereIn('type', [1,2]);
    }

    /**
     * @param Builder $builder
     * @return string
     */
    private static function getSql($builder)
    {
        $sql = $builder->toSql();
        foreach ($builder->getBindings() as $binding) {
            $value = is_numeric($binding) ? $binding : "'" . $binding . "'";
            $sql = preg_replace('/\?/', $value, $sql, 1);
        }
        return $sql;
    }
}