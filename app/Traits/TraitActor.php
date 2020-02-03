<?php
/**
 * Created by PhpStorm.
 * User: aiph11
 * Date: 28/02/18
 * Time: 10:04
 */

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait TraitActor
{

    public static function bootTraitActor()
    {

        static::creating(function ($model) {
            $user = Auth::user();
            if (empty($model->created_by) && $user) {
                $model->created_by = $user->id;
            }
                if (empty($model->updated_by) && $user) {
                    $model->updated_by = $user->id;
                }
        });

        static::updating(function ($model) {
            $user = Auth::user();
            if (empty($model->updated_by) && $user) {
                $model->updated_by = $user->id;
            }

        });

        static::deleted(function ($model) {
            $user = Auth::user();
            $model->deleted_by = $user->id;
        });

    }
}