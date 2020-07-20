<?php

declare(strict_types=1);

namespace App\Repositories\BaseRepository;

use App\Common\Interfaces\Repository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Interface BaseRepository
 * @author: tat.pham
 *
 * @package App\Repositories\BaseRepository
 */
interface BaseRepository extends Repository
{

    // AUTO GENERATED - DO NOT MODIFY FROM HERE
    //*************************************************
    /**
     * Get last record id of User.
     *
     * @return Model || null
     */
    public function getLastRecord();

    /**
     * Get all records.
     *
     * @param array $columns
     * @return Collection
     */
    public function getAll($columns = ['*']);

    /**
     * Get record by id.
     *
     * @param int $id
     *
     * @return Model || null
     */
    public function getById(int $id);

    /**
     * Function use for get list object from where clause
     *
     * @param array $arrWhere
     *
     * @return Collection || null
     */
    public function getFromWhere(array $arrWhere);

    /**
     * Function use for get first object from where clause
     *
     * @param array $arrWhere
     *
     * @return Model|null|object
     */
    public function getFirstWhere(array $arrWhere);

      /**
     * Function use for bulkUpdate
     * @author: Edugate team
     *
     * @param array $where
     * @param array $update
     *
     * @return mixed
     */
    public function bulkUpdate(array $where, array $update);
}
