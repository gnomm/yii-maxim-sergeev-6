<?php

namespace app\validators;

use yii\validators\Validator;

class MyValidator extends Validator
{
    public function validateAttribute($model, $attribute)
    {
        if (!in_array($model->$attribute, ['Maxim', 'Igor'])) {
            $this->addError($model, $attribute, 'Напиши Maxim или Igor');
        }
    }
}

