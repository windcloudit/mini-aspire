<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BaseModel extends Model
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->hidden = array('created_by', 'updated_by', 'deleted_at');
    }

    /**
     * Function use for behavior update or create a model
     * @author: tat.pham
     */
    public static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            // Remember that $model here is an instance of current Model BaseModel
            //Get User from Auth
            $user = Auth::user();
            if ($user) {
                if ($user instanceof MusashinoEmployeeModel) {
                    $userId = $user->getEmployeeId();
                } else {
                    $userId = $user->getId();
                }
                $model->setCreatedId($userId);
                $model->setUpdatedId($userId);
            } else {
                $model->setCreatedId(0);
                $model->setUpdatedId(0);
            }
        });

        static::updating(function ($model) {
            // Remember that $model here is an instance of current Model BaseModel
            //Get device id form session
            $user = Auth::user();
            if ($user) {
                if ($user instanceof MusashinoEmployeeModel) {
                    $userId = $user->getEmployeeId();
                } else {
                    $userId = $user->getId();
                }
                $model->setUpdatedId($userId);
            } else {
                $model->setUpdatedId(0);
            }
        });
    }
}
