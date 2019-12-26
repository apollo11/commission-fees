<?php

declare(strict_types=1);

namespace CommissionFees\CommissionTask\Service\Fees;

class TotalAmount extends CommissionFee
{
    /*
     * Use trait currency conversion
     *
     */
    use
        CurrencyConversion;

    /**
     * Set property data.
     */
    private $data = [];

    /**
     * Get data when instantiating TotalAmount and assign to property data.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Compute total amount with currency conversion.
     */
    private function _setTotalAmt(string $currency, float $operationAmt): float
    {
        return
            $this->_currencyConversion($operationAmt, $currency);
    }

    /**
     * Parse the data from the CSV and return the final result for computation of percentage.
     */
    public function calculatedCommissionFee()
    {
        $output = [];
        if (is_array($this->data)) {
            for ($i = 0; $i < count($this->data); ++$i) {
                //Assign value to array via keys
                $userType =
                    (string) $this->data[$i][2];
                $operationType =
                    (string) $this->data[$i][3];
                $operationAmt =
                    (float) $this->data[$i][4];
                $currency =
                    (string) $this->data[$i][5];
                $convertedAmount =
                    $this
                        ->_setTotalAmt($currency, $operationAmt);

                //Get converted amount, operation type, user type and currency then get the final result.
                $output[] =
                    $this
                        ->_result($convertedAmount, $operationType, $userType, $currency);
            }
        }

        return implode($output, "\n");
    }

    /**
     * Get the finale result fo total amount.
     */
    public function _result(float $convertedAmount, string $operationType, string $userType, string $currency)
    {
        $result = new CommissionFee($convertedAmount, $operationType, $userType);

        $percentage =
            $result
                ->_returnComputedFeePerType();

        return
            $this
                ->_returnConversionBaseOnCurrency($percentage, $currency);
    }
}
