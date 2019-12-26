<?php

declare(strict_types=1);

namespace CommissionFees\CommissionTask\Service\Fees;

class CashOut
{
    /**
     * Define property for converted amount.
     */
    private $convertedAmount;

    /**
     * Define property for user type.
     */
    private $userType;

    /**
     * Define constant for cash out commission.
     */
    const
        CASH_OUT_MAKE_COMMISSION = 0.50;

    /**
     * Define const for percentage use when getting cash out type fee.
     */
    const
        CASH_OUT_PERCENTAGE = 0.3;

    /**
     * Define default round of result of cash in.
     */
    const
        ROUND_OF = 3;

    /**
     * Get converted amount and user type when initialized.
     */
    public function __construct(float $convertedAmount, string $userType)
    {
        $this->convertedAmount = $convertedAmount;
        $this->userType = $userType;
    }

    /**
     * Check type of user and execute the correct computation for commission percentage fee.
     */
    public function _return()
    {
        switch ($this->userType) {
            case 'legal':
                $output = $this->_cashOutLegalType();
                break;

            case 'natural':
                $output = $this->_cashOutNaturalType();
                break;

            default:

                $output = [];

                break;
        }

        return $output;
    }

    /**
     * Computation and result getting the legal type percentage.
     */
    private function _cashOutLegalType(): float
    {
        return
            $this->convertedAmount * self::CASH_OUT_PERCENTAGE;
    }

    /**
     * Computation and result getting the natural type percentage.
     */
    private function _cashOutNaturalType(): float
    {
        if ($this->convertedAmount >= self::CASH_OUT_MAKE_COMMISSION) {
            $return = $this->convertedAmount * self::CASH_OUT_PERCENTAGE;
        } else {
            $return = 0.00;
        }

        return $return;
    }
}
