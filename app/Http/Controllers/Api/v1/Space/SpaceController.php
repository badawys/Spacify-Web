<?php

namespace App\Http\Controllers\Api\v1\Space;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use app\Http\Requests\Api\Space\CreateSpaceRequest;
use app\Repositories\Api\Space\SpaceRepositoryContract;



class SpaceController extends Controller
{
   protected $spaces;

       public function __construct(SpaceRepositoryContract $spaces)
       {
           $this -> spaces = $spaces;
       }

       /**
        * @return SpaceRepositoryContract
        */
       public function create(CreateSpaceRequest $request)
       {
           $newSpace = $this -> space ->create($request->all());

           return $newSpace;
       }
}
