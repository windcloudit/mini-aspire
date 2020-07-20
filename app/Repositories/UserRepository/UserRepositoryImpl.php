<?php

namespace App\Repositories\UserRepository;

use App\Models\UserModel;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

/**
 *  User repository
 *
 * @category   \App
 * @package    \App\Repositories
 * @author     Tat Pham
 * @version    1.0
 * @see        UserRepositoryImpl.php
 * @since      File available since Release 1.0
 */
class UserRepositoryImpl implements UserRepository
{

    // AUTO GENERATED - DO NOT MODIFY FROM HERE
    //*************************************************
    /**
     * Function use for insert new Basic info
     * @author: Tat Pham
     *
     * @param UserModel $user
     *
     * @return bool
     * @throws \Exception
     */
    public function saveUser(UserModel $user): ?bool
    {
        return $user->save();
    }

    /**
     * Function get last record
     * @author: Tat Pham
     *
     * @return UserModel||null
     * @throws \Exception
     */
    public function getLastRecord(): ?UserModel
    {
        // NOTE: Implement getLastRecord() method.
        return UserModel::orderBy('id', 'desc')->first();
    }

    /**
     * Function use for get all record
     * @author: Tat Pham
     *
     * @param array $columns
     * @return Collection||static[]
     */
    public function getAll($columns = ['*']): Collection
    {
        // NOTE: Implement getAll() method.
        return UserModel::all($columns);
    }

    /**
     * Function use for get object by id
     * @author: Tat Pham
     *
     * @param int $id
     *
     * @return UserModel||null
     * @throws \Exception
     */
    public function getById(int $id): ?UserModel
    {
        // NOTE: Implement getById() method.
        return UserModel::find($id);
    }

    /**
     * Function use for get list object from where clause
     * @author: Tat Pham
     *
     * @param array $arrWhere
     *
     * @return Collection || null
     * @throws \Exception
     */
    public function getFromWhere(array $arrWhere): Collection
    {
        return UserModel::where($arrWhere)->get();
    }

    /**
     * Function use for get first object from where clause
     * @author: Tat Pham
     *
     * @param array $arrWhere
     *
     * @return UserModel || null
     * @throws \Exception
     */
    public function getFirstWhere(array $arrWhere): ?UserModel
    {
        return UserModel::where($arrWhere)->first();
    }

    /**
     * Function use for bulkUpdate
     * @author: Tat Pham
     *
     * @param array $where
     * @param array $update
     *
     * @return bool
     * @throws \Exception
     */
    public function bulkUpdate(array $where, array $update): ?bool
    {
        return UserModel::where($where)->update($update);
    }

    /**
     * Function use for delete a record by Id
     * @author: Tat Pham
     *
     * @param int $id
     *
     * @return bool
     * @throws \Exception
     */
    public function deleteById(int $id): ?bool
    {
        $model = UserModel::find($id);
        if ($model === null) {
            throw new \RuntimeException(__('Can not found User with id :id in database', ['id' => $id]));
        }
        $result = $model->delete();
        if ($result === false) {
            throw new \RuntimeException(__('Delete User is not successful'));
        }
        return $result;
    }

    /**
     * Function use for bulk delete by where query
     * @author: Tat Pham
     *
     * @param array $where
     *
     * @return int
     * @throws \Exception
     */
    public function bulkDeleteByWhere(array $where): ?int
    {
        $models = UserModel::where($where);
        return $models->delete();
    }
}
