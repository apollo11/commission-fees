<?php

declare(strict_types=1);

namespace CommissionFees\CommissionTask\Service\Fees;

trait Currencies
{
    public function _euroToUsdConversion(float $amount): float
    {
        return $amount * 1.1497;
    }

    public function _euroToJpyConversion(float $amount): float
    {
        return $amount * 129.53;
    }

    public function _euroAmount(float $amount): float
    {
        return $amount;
    }

    public function _returnConversion(string $currency, float $amount): float
    {
        switch($currency) {
            case 'USD':
                $result =  $this->_euroToUsdConversion($amount);
                break;
            case 'JPY':
                $result =  $this->_euroToJpyConversion($amount);
                break;
            default:
                $result = $this->_euroAmount($amount);
                break;

        }

        return $result;
    }
}