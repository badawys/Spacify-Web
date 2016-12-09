<?php

namespace App\Repositories\Api\Access\User;

/**
 * Interface UserRepositoryContract
 * @package App\Repositories\Frontend\User
 */
interface UserRepositoryContract
{
    /**
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * @param $email
     * @return mixed
     */
    public function findByEmail($email);


    /**
     * @param array $data
     * @param bool $provider
     * @return mixed
     */
    public function create(array $data, $provider = false);

    /**
     * @param $id
     * @param $input
     * @return mixed
     */
    public function updateProfile($id, $input);

}
