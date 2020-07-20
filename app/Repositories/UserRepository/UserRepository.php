<?php

namespace App\Repositories\UserRepository;

use App\Models\UserModel;
use App\Repositories\BaseRepository\BaseRepository;

/**
 *  User repository
 *
 * @category   \App
 * @package    \App\Repositories
 * @author     Tat Pham
 * @version    1.0
 * @see        UserRepository.php
 * @since      File available since Release 1.0
 */
interface UserRepository extends BaseRepository
{

    // AUTO GENERATED - DO NOT MODIFY FROM HERE
    //*************************************************

    /**
     * Function use for insert new Basic info
     * @author: Tat Pham
     *
     * @param UserModel $user
     *
     * @return UserModel|bool
     * @throws \Exception
     */
    public function saveUser(UserModel $user): ?bool;

    /**
     * Function use for delete a record by Id
     * @author: Tat Pham
     *
     * @param $id
     *
     * @return bool
     * @throws \Exception
     */
    public function deleteById(int $id): ?bool;

    /**
     * Function use for bulk delete by where query
     * @author: Tat Pham
     *
     * @param array $where
     *
     * @return int
     * @throws \Exception
     */
    public function bulkDeleteByWhere(array $where): ?int;
}
