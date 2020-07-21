<?php

namespace App\Repositories\RepaymentRepository;

use App\Models\RepaymentModel;
use App\Repositories\BaseRepository\BaseRepository;

/**
 *  Repayment repository
 *
 * @category   \App
 * @package    \App\Repositories
 * @author     Tat Pham
 * @version    1.0
 * @see        RepaymentRepository.php
 * @since      File available since Release 1.0
 */
interface RepaymentRepository extends BaseRepository
{
    public function bulkInsert(array $arrRepayments): ?bool;

    // AUTO GENERATED - DO NOT MODIFY FROM HERE
    //*************************************************

    /**
     * Function use for insert new Basic info
     * @author: Tat Pham
     *
     * @param RepaymentModel $repayment
     *
     * @return RepaymentModel|bool
     * @throws \Exception
     */
    public function saveRepayment(RepaymentModel $repayment): ?bool;

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
