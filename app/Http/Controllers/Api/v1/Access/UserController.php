<?php

namespace App\Http\Controllers\Api\v1\Access;

use App\Http\Requests\Api\Access\RegisterRequest;
use App\Models\Access\User\User;
use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Access\User\UserRepositoryContract;
use Illuminate\Contracts\Validation\Validator;

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

    
    public function register(RegisterRequest $request) {

        $this->users->create($request->all());
    }
}
