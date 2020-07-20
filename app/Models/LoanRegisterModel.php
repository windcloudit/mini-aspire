<?php

namespace App\Models;

use Carbon\Carbon;

/**
 *  LoanRegisterModel model
 *
 * @category   App
 * @package    AppModels
 * @author     Tat Pham
 * @version    Release: 1.0
 * @see        LoanRegisterModel.php
 * @since      File available since Release 1.0
 */
class LoanRegisterModel extends BaseModel
{
    /**
     * LoanRegister constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'loan_registers';
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
    * @return LoanRegisterModel
    */
    public function setId($id): LoanRegisterModel
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
    * Constant for field `user_id`.
    */
    public const USER_ID = 'user_id';

    /**
    * Set user_id
    * This setter will set value for field `user_id`.
    *
    * @param int $userId
    *
    * @return LoanRegisterModel
    */
    public function setUserId($userId): LoanRegisterModel
    {
        if ($userId === null) {
            $this->attributes[self::USER_ID] = null;
        } else {
            $this->attributes[self::USER_ID] = (int) $userId;
        }

        return $this;
    }

    /**
    * Get user_id
    * This getter will get value from field `user_id`.
    *
    * @return int || null
    */
    public function getUserId(): ?int
    {
        $intValue = $this->attributes[self::USER_ID];
        if ($intValue === null) {
            return null;
        }

        return (int) $intValue;
    }

    /**
    * Constant for field `document_date`.
    */
    public const DOCUMENT_DATE = 'document_date';

    /**
    * Set document_date
    * This setter will set value for field `document_date`.
    *
    * @param Carbon|string $documentDate
    *
    * @return LoanRegisterModel
    */
    public function setDocumentDate($documentDate): LoanRegisterModel
    {
        $this->attributes[self::DOCUMENT_DATE] = $documentDate;

        return $this;
    }

    /**
    * Get document_date
    * This getter will get value from field `document_date`.
    *
    * @return Carbon || null
    */
    public function getDocumentDate(): ?Carbon
    {
        $dateValue = $this->attributes[self::DOCUMENT_DATE];
        if ($dateValue === null) {
            return null;
        }

        return Carbon::parse($dateValue);
    }

    /**
    * Constant for field `interest_rate`.
    */
    public const INTEREST_RATE = 'interest_rate';

    /**
    * Set interest_rate
    * This setter will set value for field `interest_rate`.
    *
    * @param string $interestRate
    *
    * @return LoanRegisterModel
    */
    public function setInterestRate($interestRate): LoanRegisterModel
    {
        $this->attributes[self::INTEREST_RATE] = $interestRate;

        return $this;
    }

    /**
    * Get interest_rate
    * This getter will get value from field `interest_rate`.
    *
    * @return string || null
    */
    public function getInterestRate(): ?string
    {
        return $this->attributes[self::INTEREST_RATE];
    }

    /**
    * Constant for field `amount`.
    */
    public const AMOUNT = 'amount';

    /**
    * Set amount
    * This setter will set value for field `amount`.
    *
    * @param int $amount
    *
    * @return LoanRegisterModel
    */
    public function setAmount($amount): LoanRegisterModel
    {
        if ($amount === null) {
            $this->attributes[self::AMOUNT] = null;
        } else {
            $this->attributes[self::AMOUNT] = (int) $amount;
        }

        return $this;
    }

    /**
    * Get amount
    * This getter will get value from field `amount`.
    *
    * @return int || null
    */
    public function getAmount(): ?int
    {
        $intValue = $this->attributes[self::AMOUNT];
        if ($intValue === null) {
            return null;
        }

        return (int) $intValue;
    }

    /**
    * Constant for field `loan_term`.
    */
    public const LOAN_TERM = 'loan_term';

    /**
    * Set loan_term
    * This setter will set value for field `loan_term`.
    *
    * @param int $loanTerm
    *
    * @return LoanRegisterModel
    */
    public function setLoanTerm($loanTerm): LoanRegisterModel
    {
        if ($loanTerm === null) {
            $this->attributes[self::LOAN_TERM] = null;
        } else {
            $this->attributes[self::LOAN_TERM] = (int) $loanTerm;
        }

        return $this;
    }

    /**
    * Get loan_term
    * This getter will get value from field `loan_term`.
    *
    * @return int || null
    */
    public function getLoanTerm(): ?int
    {
        $intValue = $this->attributes[self::LOAN_TERM];
        if ($intValue === null) {
            return null;
        }

        return (int) $intValue;
    }

    /**
    * Constant for field `approve`.
    */
    public const APPROVE = 'approve';

    /**
    * Set approve
    * This setter will set value for field `approve`.
    *
    * @param string $approve
    *
    * @return LoanRegisterModel
    */
    public function setApprove($approve): LoanRegisterModel
    {
        $this->attributes[self::APPROVE] = $approve;

        return $this;
    }

    /**
    * Get approve
    * This getter will get value from field `approve`.
    *
    * @return string || null
    */
    public function getApprove(): ?string
    {
        return $this->attributes[self::APPROVE];
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
    * @return LoanRegisterModel
    */
    public function setCreatedAt($createdAt): LoanRegisterModel
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
    * @return LoanRegisterModel
    */
    public function setUpdatedAt($updatedAt): LoanRegisterModel
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
