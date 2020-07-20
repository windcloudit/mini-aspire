<?php

namespace App\Repositories\LoanRegisterRepository;

use App\Models\LoanRegisterModel;
use App\Repositories\BaseRepository\BaseRepository;

/**
 *  LoanRegister repository
 *
 * @category   \App
 * @package    \App\Repositories
 * @author     Tat Pham
 * @version    1.0
 * @see        LoanRegisterRepository.php
 * @since      File available since Release 1.0
 */
interface LoanRegisterRepository extends BaseRepository
{

    // AUTO GENERATED - DO NOT MODIFY FROM HERE
    //*************************************************

    /**
     * Function use for insert new Basic info
     * @author: Tat Pham
     *
     * @param LoanRegisterModel $loanRegister
     *
     * @return LoanRegisterModel|bool
     * @throws \Exception
     */
    public function saveLoanRegister(LoanRegisterModel $loanRegister): ?bool;

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
