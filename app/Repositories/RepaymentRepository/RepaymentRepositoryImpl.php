<?php

namespace App\Repositories\RepaymentRepository;

use App\Models\RepaymentModel;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

/**
 *  Repayment repository
 *
 * @category   \App
 * @package    \App\Repositories
 * @author     Tat Pham
 * @version    1.0
 * @see        RepaymentRepositoryImpl.php
 * @since      File available since Release 1.0
 */
class RepaymentRepositoryImpl implements RepaymentRepository
{
    /**
     * @param array $arrRepayments
     * @return bool|null
     */
    public function bulkInsert(array $arrRepayments): ?bool
    {
        return RepaymentModel::insert($arrRepayments);
    }

    // AUTO GENERATED - DO NOT MODIFY FROM HERE
    //*************************************************
    /**
     * Function use for insert new Basic info
     * @author: Tat Pham
     *
     * @param RepaymentModel $repayment
     *
     * @return bool
     * @throws \Exception
     */
    public function saveRepayment(RepaymentModel $repayment): ?bool
    {
        return $repayment->save();
    }

    /**
     * Function get last record
     * @author: Tat Pham
     *
     * @return RepaymentModel||null
     * @throws \Exception
     */
    public function getLastRecord(): ?RepaymentModel
    {
        // NOTE: Implement getLastRecord() method.
        return RepaymentModel::orderBy('id', 'desc')->first();
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
        return RepaymentModel::all($columns);
    }

    /**
     * Function use for get object by id
     * @author: Tat Pham
     *
     * @param int $id
     *
     * @return RepaymentModel||null
     * @throws \Exception
     */
    public function getById(int $id): ?RepaymentModel
    {
        // NOTE: Implement getById() method.
        return RepaymentModel::find($id);
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
        return RepaymentModel::where($arrWhere)->get();
    }

    /**
     * Function use for get first object from where clause
     * @author: Tat Pham
     *
     * @param array $arrWhere
     *
     * @return RepaymentModel || null
     * @throws \Exception
     */
    public function getFirstWhere(array $arrWhere): ?RepaymentModel
    {
        return RepaymentModel::where($arrWhere)->first();
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
        return RepaymentModel::where($where)->update($update);
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
        $model = RepaymentModel::find($id);
        if ($model === null) {
            throw new \RuntimeException(__('Can not found Repayment with id :id in database', ['id' => $id]));
        }
        $result = $model->delete();
        if ($result === false) {
            throw new \RuntimeException(__('Delete Repayment is not successful'));
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
        $models = RepaymentModel::where($where);
        return $models->delete();
    }
}
