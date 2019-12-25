<?php

declare(strict_types=1);

namespace CommissionFees\CommissionTask\Service\Fees;

trait Currencies
{
    private $rates = [
        'EUR' => 1.0, 'JPY' => 129.53, 'USD' => 1.1497,
    ];

    private $rateValue;

    /**
     * Description.
     */
    public function _returnConversion(string $currency, float $amount): float
    {
        return
            $this->_euroConversion($amount, $currency);
    }

    /**
     * Description.
     */
    public function _euroConversion(float $amount, string $currency): float
    {
        $rateValue = round($amount / $this->rates[$currency], 2);

        return $rateValue;
    }

    /**
     * Description.
     */
    public function _setFee($convertedAmt, $operationType, $userType)
    {
        switch ($operationType) {
            case 'cash_in':
                $return = $this->_cashIn($convertedAmt);
                break;
            case 'cash_out':
                $return = $this->_cashOut($convertedAmt, $userType);

                break;
            default:
                $return = [];
                break;
        }

        return $return;
    }

    /**
     * Description.
     */
    public function _cashIn(float $convertedAmt): float
    {

        if ($convertedAmt <= 5.0) {

            $return = round($convertedAmt * 0.03, 3);

        } else {

            $return = 0.00;
        }

        return $return;
    }

    /**
     * Description.
     */
    public function _cashOut(float $convertedAmt, string $userType): float
    {
        switch ($userType) {

            case 'legal':

                $return = round($convertedAmt * 0.3, 3);

                break;

            case 'natural':

                if ($convertedAmt >= 0.50) {

                    $return = round($convertedAmt * 0.3, 3);

                } else {

                    $return = 0.00;
                }
                break;

            default:

                $return = [];

                break;
        }

        return $return;
    }
}
