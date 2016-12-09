<?php

namespace App\Repositories\Api\Access\User;

use App\User;
use Dingo\Api\Exception\UpdateResourceFailedException;

/**
 * Class EloquentUserRepository
 * @package App\Repositories\Frontend\User
 */
class EloquentUserRepository implements UserRepositoryContract
{

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return User::findOrFail($id);
    }

    /**
     * @param $email
     * @return bool
     */
    public function findByEmail($email)
    {
        $user = User::where('email', $email)->first();

        if ($user instanceof User) {
            return $user;
        }

        return false;
    }

    /**
     * @param array $data
     * @param bool $provider
     * @return User
     */
    public function create(array $data, $provider = false)
    {
        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->confirmation_code = md5(uniqid(mt_rand(), true));
        $user->status = 1;
        $user->password = $provider ? null : bcrypt($data['password']);
        $user->confirmed = $provider ? 1 : (config('access.users.confirm_email') ? 0 : 1);
        $user->role_id = 2;

        $user->save();

        /**
         * Return the user object
         */
        return $user;
    }


    /**
     * @param $id
     * @param $input
     * @return mixed
     * @throws UpdateResourceFailedException
     */
    public function updateProfile($id, $input)
    {
        $user = $this->find($id);
        $user->name = $input['name'];

        //Address is not current address
        if ($user->email != $input['email']) {
            //Emails have to be unique
            if ($this->findByEmail($input['email'])) {
                throw new UpdateResourceFailedException('This email is already taken!');
            }

            $user->email = $input['email'];
        }

        //TODO: Add Photo

        return $user->save();
    }

}
