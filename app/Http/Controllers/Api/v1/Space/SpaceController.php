<?php

namespace App\Http\Controllers\Api\v1\Space;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use app\Http\Requests\Api\Space\CreateSpaceRequest;
use app\Repositories\Api\Space\SpaceRepositoryContract;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;


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

           public function  view(Request $request , $args)
           {
               $result = [];
               $args = explode(",",$args);
               foreach ($args as $value)
               {
                   if ($value == 'name')
                       $result ['name'] = $request->space()->name;

                   elseif ($value == 'photo')
                       $result ['photo']=$request->space()->photo;

                   else
                       throw new BadRequestHttpException("Unknown Request Keyword");

               }
           }
}
