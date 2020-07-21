<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 *  UserModel model
 *
 * @category   App
 * @package    AppModels
 * @author     Tat Pham
 * @version    Release: 1.0
 * @see        UserModel.php
 * @since      File available since Release 1.0
 */
class UserModel extends Authenticatable
{
    use Notifiable;

    /**
     * User constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = 'users';
        $this->primaryKey = 'id';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

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
    * @return UserModel
    */
    public function setId($id): UserModel
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
    * Constant for field `name`.
    */
    public const NAME = 'name';

    /**
    * Set name
    * This setter will set value for field `name`.
    *
    * @param string $name
    *
    * @return UserModel
    */
    public function setName($name): UserModel
    {
        $this->attributes[self::NAME] = $name;

        return $this;
    }

    /**
    * Get name
    * This getter will get value from field `name`.
    *
    * @return string || null
    */
    public function getName(): ?string
    {
        return $this->attributes[self::NAME];
    }

    /**
    * Constant for field `email`.
    */
    public const EMAIL = 'email';

    /**
    * Set email
    * This setter will set value for field `email`.
    *
    * @param string $email
    *
    * @return UserModel
    */
    public function setEmail($email): UserModel
    {
        $this->attributes[self::EMAIL] = $email;

        return $this;
    }

    /**
    * Get email
    * This getter will get value from field `email`.
    *
    * @return string || null
    */
    public function getEmail(): ?string
    {
        return $this->attributes[self::EMAIL];
    }

    /**
    * Constant for field `email_verified_at`.
    */
    public const EMAIL_VERIFIED_AT = 'email_verified_at';

    /**
    * Set email_verified_at
    * This setter will set value for field `email_verified_at`.
    *
    * @param Carbon|string $emailVerifiedAt
    *
    * @return UserModel
    */
    public function setEmailVerifiedAt($emailVerifiedAt): UserModel
    {
        $this->attributes[self::EMAIL_VERIFIED_AT] = $emailVerifiedAt;

        return $this;
    }

    /**
    * Get email_verified_at
    * This getter will get value from field `email_verified_at`.
    *
    * @return Carbon || null
    */
    public function getEmailVerifiedAt(): ?Carbon
    {
        $dateValue = $this->attributes[self::EMAIL_VERIFIED_AT];
        if ($dateValue === null) {
            return null;
        }

        return Carbon::parse($dateValue);
    }

    /**
    * Constant for field `password`.
    */
    public const PASSWORD = 'password';

    /**
    * Set password
    * This setter will set value for field `password`.
    *
    * @param string $password
    *
    * @return UserModel
    */
    public function setPassword($password): UserModel
    {
        $this->attributes[self::PASSWORD] = $password;

        return $this;
    }

    /**
    * Get password
    * This getter will get value from field `password`.
    *
    * @return string || null
    */
    public function getPassword(): ?string
    {
        return $this->attributes[self::PASSWORD];
    }

    /**
    * Constant for field `remember_token`.
    */
    public const REMEMBER_TOKEN = 'remember_token';

    /**
    * Set remember_token
    * This setter will set value for field `remember_token`.
    *
    * @param string $rememberToken
    *
    * @return UserModel
    */
    public function setRememberToken($rememberToken): UserModel
    {
        $this->attributes[self::REMEMBER_TOKEN] = $rememberToken;

        return $this;
    }

    /**
    * Get remember_token
    * This getter will get value from field `remember_token`.
    *
    * @return string || null
    */
    public function getRememberToken(): ?string
    {
        return $this->attributes[self::REMEMBER_TOKEN];
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
    * @return UserModel
    */
    public function setCreatedAt($createdAt): UserModel
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
    * @return UserModel
    */
    public function setUpdatedAt($updatedAt): UserModel
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

    /**
    * Constant for field `created_by`.
    */
    public const CREATED_BY = 'created_by';

    /**
    * Set created_by
    * This setter will set value for field `created_by`.
    *
    * @param int $createdBy
    *
    * @return UserModel
    */
    public function setCreatedBy($createdBy): UserModel
    {
        if ($createdBy === null) {
            $this->attributes[self::CREATED_BY] = null;
        } else {
            $this->attributes[self::CREATED_BY] = (int) $createdBy;
        }

        return $this;
    }

    /**
    * Get created_by
    * This getter will get value from field `created_by`.
    *
    * @return int || null
    */
    public function getCreatedBy(): ?int
    {
        $intValue = $this->attributes[self::CREATED_BY];
        if ($intValue === null) {
            return null;
        }

        return (int) $intValue;
    }

    /**
    * Constant for field `updated_by`.
    */
    public const UPDATED_BY = 'updated_by';

    /**
    * Set updated_by
    * This setter will set value for field `updated_by`.
    *
    * @param int $updatedBy
    *
    * @return UserModel
    */
    public function setUpdatedBy($updatedBy): UserModel
    {
        if ($updatedBy === null) {
            $this->attributes[self::UPDATED_BY] = null;
        } else {
            $this->attributes[self::UPDATED_BY] = (int) $updatedBy;
        }

        return $this;
    }

    /**
    * Get updated_by
    * This getter will get value from field `updated_by`.
    *
    * @return int || null
    */
    public function getUpdatedBy(): ?int
    {
        $intValue = $this->attributes[self::UPDATED_BY];
        if ($intValue === null) {
            return null;
        }

        return (int) $intValue;
    }
}
