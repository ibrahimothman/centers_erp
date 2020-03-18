<?php


namespace App\helper;


use App\helper\mathParser\Math;

class PaymentModelHelper
{
    public static function getPaymentModelAttribute($paymentModel, $paymentModelMetaData)
    {

        $paymentModel = \App\PaymentModel::findOrFail($paymentModel);
        $paymentModel = json_decode($paymentModel, true);
        $newModel['model'] = $paymentModel['name'];
        $mathParser =  Math::getInstance();
        $mathParser->setVariables($paymentModelMetaData);
        $newModel['salary'] = $mathParser->evaluate($paymentModel['salary']);
        return $newModel;
    }

}
