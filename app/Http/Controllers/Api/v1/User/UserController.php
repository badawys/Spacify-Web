<?php

namespace App\Http\Controllers\Api\v1\User;

use App\Http\Requests\Api\Access\RegisterRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Access\User\UserRepositoryContract;
use Dingo\Api\Exception\StoreResourceFailedException;
use Lcobucci\JWT\Parser;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * Class UserController
 */
class UserController extends Controller
{
    /**
     * @var UserRepositoryContract
     */
    protected $users;


    /**
     * @param UserRepositoryContract $users
     */
    public function __construct(UserRepositoryContract $users)
    {
        $this->users = $users;
    }

    /**
     * @param RegisterRequest $request
     * @return mixed
     */
    public function register(RegisterRequest $request)
    {

        $newUser = $this->users->create($request->all());

        if (!$newUser)
            throw new StoreResourceFailedException('Could not create new user.');

        return $newUser;
    }


    public function logout(Request $request) {

        //Revoke access token
        $value = $request->bearerToken();
        $id= (new Parser())->parse($value)->getHeader('jti');
        $token = $request->user()->tokens->find($id);
        $token->revoke();
    }

    public function profile(Request $request, $args){
        $result = [];
        $args = explode(",",$args);
        foreach($args as $value ){
            if($value == 'name')
                $result['name'] = $request->user()->name;

            elseif($value == 'email')
                $result['email'] = $request->user()->email;

            elseif($value == 'photo')
                $result['photo'] = $request->user()->photo;

            else {
                throw new BadRequestHttpException("Unknown request keyword");
            }
        }

        return $result;
    }

}
