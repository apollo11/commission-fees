<?php

declare(strict_types=1);

namespace CommissionFees\CommissionTask\Service\Fees;

trait CurrencyConversion
{
    /**
     * Assign to array the currency conversion.
     */
    private $rates = [
        'EUR' => 1.0, 'JPY' => 129.53, 'USD' => 1.1497,
    ];

    /**
     * Computation get currency conversion per country.
     */
    public function _currencyConversion(float $amount, string $currency): float
    {
        $rateValue = $amount / $this->rates[$currency];

        return $rateValue;
    }

    /**
     * Computation base on currency.
     */
    public function _getConversionBaseOnCurrency(float $amount, string $currency): float
    {
        return
            ($amount * $this->rates[$currency]) / 100;
    }

    /**
     * Return the final conversion of currency per country.
     */
    public function _returnConversionBaseOnCurrency(float $amount, string $currency)
    {
        $conversionByCurrency = $this->_getConversionBaseOnCurrency($amount, $currency);
        $roundingOffFee = round($conversionByCurrency, 3);

        return
            $this->_formattingCommissionFee($roundingOffFee);
    }

    /**
     * Format depends on the percentage result.
     */
    public function _formattingCommissionFee(float $roundingOffFee)
    {
        if ($roundingOffFee % 2 !== 0 || $roundingOffFee < 1) {
            return
                number_format($roundingOffFee, 2, '.', '');
        }

        return $roundingOffFee;
    }
}
