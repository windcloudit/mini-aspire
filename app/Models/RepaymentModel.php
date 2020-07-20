<?php

namespace App\Models;

use Carbon\Carbon;

/**
 *  RepaymentModel model
 *
 * @category   App
 * @package    AppModels
 * @author     Tat Pham
 * @version    Release: 1.0
 * @see        RepaymentModel.php
 * @since      File available since Release 1.0
 */
class RepaymentModel extends BaseModel
{
    /**
     * Repayment constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'repayments';
        $this->primaryKey = 'id';
    }

    // NOTE - Your relationships here

    // AUTO GENERATED - DO NOT MODIFY FROM HERE
    //*************************************************


    /**
    * Constant for field `id`.
    */
    public const ID = 'id';

    /**
    * Set id
    * This setter will set value for field `id`.
    *
    * @param int $id
    *
    * @return RepaymentModel
    */
    public function setId($id): RepaymentModel
    {
        if ($id === null) {
            $this->attributes[self::ID] = null;
        } else {
            $this->attributes[self::ID] = (int) $id;
        }

        return $this;
    }

    /**
    * Get id
    * This getter will get value from field `id`.
    *
    * @return int || null
    */
    public function getId(): ?int
    {
        $intValue = $this->attributes[self::ID];
        if ($intValue === null) {
            return null;
        }

        return (int) $intValue;
    }

    /**
    * Constant for field `loan_register_id`.
    */
    public const LOAN_REGISTER_ID = 'loan_register_id';

    /**
    * Set loan_register_id
    * This setter will set value for field `loan_register_id`.
    *
    * @param int $loanRegisterId
    *
    * @return RepaymentModel
    */
    public function setLoanRegisterId($loanRegisterId): RepaymentModel
    {
        if ($loanRegisterId === null) {
            $this->attributes[self::LOAN_REGISTER_ID] = null;
        } else {
            $this->attributes[self::LOAN_REGISTER_ID] = (int) $loanRegisterId;
        }

        return $this;
    }

    /**
    * Get loan_register_id
    * This getter will get value from field `loan_register_id`.
    *
    * @return int || null
    */
    public function getLoanRegisterId(): ?int
    {
        $intValue = $this->attributes[self::LOAN_REGISTER_ID];
        if ($intValue === null) {
            return null;
        }

        return (int) $intValue;
    }

    /**
    * Constant for field `repayment_due_date`.
    */
    public const REPAYMENT_DUE_DATE = 'repayment_due_date';

    /**
    * Set repayment_due_date
    * This setter will set value for field `repayment_due_date`.
    *
    * @param Carbon|string $repaymentDueDate
    *
    * @return RepaymentModel
    */
    public function setRepaymentDueDate($repaymentDueDate): RepaymentModel
    {
        $this->attributes[self::REPAYMENT_DUE_DATE] = $repaymentDueDate;

        return $this;
    }

    /**
    * Get repayment_due_date
    * This getter will get value from field `repayment_due_date`.
    *
    * @return Carbon || null
    */
    public function getRepaymentDueDate(): ?Carbon
    {
        $dateValue = $this->attributes[self::REPAYMENT_DUE_DATE];
        if ($dateValue === null) {
            return null;
        }

        return Carbon::parse($dateValue);
    }

    /**
    * Constant for field `original_amount`.
    */
    public const ORIGINAL_AMOUNT = 'original_amount';

    /**
    * Set original_amount
    * This setter will set value for field `original_amount`.
    *
    * @param string $originalAmount
    *
    * @return RepaymentModel
    */
    public function setOriginalAmount($originalAmount): RepaymentModel
    {
        $this->attributes[self::ORIGINAL_AMOUNT] = $originalAmount;

        return $this;
    }

    /**
    * Get original_amount
    * This getter will get value from field `original_amount`.
    *
    * @return string || null
    */
    public function getOriginalAmount(): ?string
    {
        return $this->attributes[self::ORIGINAL_AMOUNT];
    }

    /**
    * Constant for field `interest_amount`.
    */
    public const INTEREST_AMOUNT = 'interest_amount';

    /**
    * Set interest_amount
    * This setter will set value for field `interest_amount`.
    *
    * @param string $interestAmount
    *
    * @return RepaymentModel
    */
    public function setInterestAmount($interestAmount): RepaymentModel
    {
        $this->attributes[self::INTEREST_AMOUNT] = $interestAmount;

        return $this;
    }

    /**
    * Get interest_amount
    * This getter will get value from field `interest_amount`.
    *
    * @return string || null
    */
    public function getInterestAmount(): ?string
    {
        return $this->attributes[self::INTEREST_AMOUNT];
    }

    /**
    * Constant for field `total_amount`.
    */
    public const TOTAL_AMOUNT = 'total_amount';

    /**
    * Set total_amount
    * This setter will set value for field `total_amount`.
    *
    * @param string $totalAmount
    *
    * @return RepaymentModel
    */
    public function setTotalAmount($totalAmount): RepaymentModel
    {
        $this->attributes[self::TOTAL_AMOUNT] = $totalAmount;

        return $this;
    }

    /**
    * Get total_amount
    * This getter will get value from field `total_amount`.
    *
    * @return string || null
    */
    public function getTotalAmount(): ?string
    {
        return $this->attributes[self::TOTAL_AMOUNT];
    }

    /**
    * Constant for field `outstanding_balance`.
    */
    public const OUTSTANDING_BALANCE = 'outstanding_balance';

    /**
    * Set outstanding_balance
    * This setter will set value for field `outstanding_balance`.
    *
    * @param string $outstandingBalance
    *
    * @return RepaymentModel
    */
    public function setOutstandingBalance($outstandingBalance): RepaymentModel
    {
        $this->attributes[self::OUTSTANDING_BALANCE] = $outstandingBalance;

        return $this;
    }

    /**
    * Get outstanding_balance
    * This getter will get value from field `outstanding_balance`.
    *
    * @return string || null
    */
    public function getOutstandingBalance(): ?string
    {
        return $this->attributes[self::OUTSTANDING_BALANCE];
    }

    /**
    * Constant for field `status`.
    */
    public const STATUS = 'status';

    /**
    * Set status
    * This setter will set value for field `status`.
    *
    * @param int $status
    *
    * @return RepaymentModel
    */
    public function setStatus($status): RepaymentModel
    {
        if ($status === null) {
            $this->attributes[self::STATUS] = null;
        } else {
            $this->attributes[self::STATUS] = (int) $status;
        }

        return $this;
    }

    /**
    * Get status
    * This getter will get value from field `status`.
    *
    * @return int || null
    */
    public function getStatus(): ?int
    {
        $intValue = $this->attributes[self::STATUS];
        if ($intValue === null) {
            return null;
        }

        return (int) $intValue;
    }

    /**
    * Constant for field `created_at`.
    */
    public const CREATED_AT = 'created_at';

    /**
    * Set created_at
    * This setter will set value for field `created_at`.
    *
    * @param Carbon|string $createdAt
    *
    * @return RepaymentModel
    */
    public function setCreatedAt($createdAt): RepaymentModel
    {
        $this->attributes[self::CREATED_AT] = $createdAt;

        return $this;
    }

    /**
    * Get created_at
    * This getter will get value from field `created_at`.
    *
    * @return int || null
    */
    public function getCreatedAt(): ?int
    {
        $dateValue = $this->attributes[self::CREATED_AT];
        if ($dateValue === null) {
            return null;
        }

        return Carbon::parse($dateValue)->timestamp;
    }

    /**
    * Constant for field `updated_at`.
    */
    public const UPDATED_AT = 'updated_at';

    /**
    * Set updated_at
    * This setter will set value for field `updated_at`.
    *
    * @param Carbon|string $updatedAt
    *
    * @return RepaymentModel
    */
    public function setUpdatedAt($updatedAt): RepaymentModel
    {
        $this->attributes[self::UPDATED_AT] = $updatedAt;

        return $this;
    }

    /**
    * Get updated_at
    * This getter will get value from field `updated_at`.
    *
    * @return int || null
    */
    public function getUpdatedAt(): ?int
    {
        $dateValue = $this->attributes[self::UPDATED_AT];
        if ($dateValue === null) {
            return null;
        }

        return Carbon::parse($dateValue)->timestamp;
    }
}
