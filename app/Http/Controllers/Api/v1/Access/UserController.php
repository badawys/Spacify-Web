<?php

namespace App\Http\Controllers\Api\v1\Access;

use App\Http\Requests\Api\Access\RegisterRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Access\User\UserRepositoryContract;
use Dingo\Api\Exception\StoreResourceFailedException;
use Lcobucci\JWT\Parser;
use Illuminate\Http\Request;

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
}
