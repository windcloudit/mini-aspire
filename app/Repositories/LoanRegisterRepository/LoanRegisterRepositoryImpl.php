<?php

namespace App\Repositories\LoanRegisterRepository;

use App\Models\LoanRegisterModel;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

/**
 *  LoanRegister repository
 *
 * @category   \App
 * @package    \App\Repositories
 * @author     Tat Pham
 * @version    1.0
 * @see        LoanRegisterRepositoryImpl.php
 * @since      File available since Release 1.0
 */
class LoanRegisterRepositoryImpl implements LoanRegisterRepository
{

    // AUTO GENERATED - DO NOT MODIFY FROM HERE
    //*************************************************
    /**
     * Function use for insert new Basic info
     * @author: Tat Pham
     *
     * @param LoanRegisterModel $loanRegister
     *
     * @return bool
     * @throws \Exception
     */
    public function saveLoanRegister(LoanRegisterModel $loanRegister): ?bool
    {
        return $loanRegister->save();
    }

    /**
     * Function get last record
     * @author: Tat Pham
     *
     * @return LoanRegisterModel||null
     * @throws \Exception
     */
    public function getLastRecord(): ?LoanRegisterModel
    {
        // NOTE: Implement getLastRecord() method.
        return LoanRegisterModel::orderBy('id', 'desc')->first();
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
        return LoanRegisterModel::all($columns);
    }

    /**
     * Function use for get object by id
     * @author: Tat Pham
     *
     * @param int $id
     *
     * @return LoanRegisterModel||null
     * @throws \Exception
     */
    public function getById(int $id): ?LoanRegisterModel
    {
        // NOTE: Implement getById() method.
        return LoanRegisterModel::find($id);
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
        return LoanRegisterModel::where($arrWhere)->get();
    }

    /**
     * Function use for get first object from where clause
     * @author: Tat Pham
     *
     * @param array $arrWhere
     *
     * @return LoanRegisterModel || null
     * @throws \Exception
     */
    public function getFirstWhere(array $arrWhere): ?LoanRegisterModel
    {
        return LoanRegisterModel::where($arrWhere)->first();
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
        return LoanRegisterModel::where($where)->update($update);
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
        $model = LoanRegisterModel::find($id);
        if ($model === null) {
            throw new \RuntimeException(__('Can not found LoanRegister with id :id in database', ['id' => $id]));
        }
        $result = $model->delete();
        if ($result === false) {
            throw new \RuntimeException(__('Delete LoanRegister is not successful'));
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
        $models = LoanRegisterModel::where($where);
        return $models->delete();
    }
}
