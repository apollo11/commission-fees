<?php

declare(strict_types=1);

namespace CommissionFees\CommissionTask\Service\Fees;

class CashIn
{
    /**
     * Define property for convented amount.
     */
    private $convertedAmount;

    /**
     * Define property for user type.
     */
    private $userType;

    /**
     * Define constant for cash in commission.
     */
    const
        CASH_IN_MAKE_COMMISSION = 5.0;

    /**
     * Define const for percentage use when getting cash in fee.
     */
    const
        CASH_IN_PERCENTAGE = 0.03;

    /**
     * Define default round of result of cash in.
     */
    const
        ROUND_OF = 3;

    /**
     * Get converted amount and user type when initialized.
     */
    public function __construct(float $convertedAmount, string $userType = null)
    {
        $this->convertedAmount = $convertedAmount;
        $this->userType = $userType;
    }

    /**
     * Computation and final result for cash in percentage.
     */
    public function _return(): float
    {
        if ($this->convertedAmount <= self::CASH_IN_MAKE_COMMISSION) {
            $return = round($this->convertedAmount * self::CASH_IN_PERCENTAGE, self::ROUND_OF);
        } else {
            $return = 0.00;
        }

        return $return;
    }
}
