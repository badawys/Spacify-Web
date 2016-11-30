<?php

namespace app\Repositories\Api\Space;

use Arcanedev\Support\Collection;
use Dingo\Api\Exception\DeleteResourceFailedException;
use Dingo\Api\Exception\StoreResourceFailedException;
use Dingo\Api\Exception\UpdateResourceFailedException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

interface SpaceRepositoryContract {

    /**
     * Create new space
     *
     * @param array $data space information
     * @return Collection created space
     * @throws StoreResourceFailedException
     */
    public function create (array $data);

    /**
     * Find space using it's id
     *
     * @param $id
     * @return Collection space data
     * @throws NotFoundHttpException
     */
    public function findById ($id);

    /**
     * Find space by it's name
     *
     * @param $name
     * @return Collection space data
     * @throws NotFoundHttpException
     */
    public function findByName ($name);

    /**
     *  Find all the ACTIVATED spaces in range of 500m of the given location
     *
     * @param $long float Longitude
     * @param $lat float Latitude
     * @return Collection nearby spaces data (id- name - photo)
     * @throws NotFoundHttpException
     */
    public function nearby ($long , $lat);

    /**
     * Update space information
     *
     * @param $id
     * @param array $data
     * @return Collection space record after update
     * @throws UpdateResourceFailedException
     */
    public function update ($id, array $data);

    /**
     * Deactivate space
     *
     * @param $id
     * @return mixed
     * @throws UpdateResourceFailedException
     */
    public function deactivate ($id);

    /**
     * Reactivate space
     *
     * @param $id
     * @return mixed
     * @throws UpdateResourceFailedException
     */
    public function reactivate ($id);

    /**
     * Delete space
     *
     * @param $id
     * @return mixed
     * @throws DeleteResourceFailedException
     */
    public function delete ($id);
}