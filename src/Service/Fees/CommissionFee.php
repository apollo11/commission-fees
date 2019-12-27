<?php

declare(strict_types=1);

namespace CommissionFees\CommissionTask\Service\Fees;

class CommissionFee
{
    /**
     * Define property for operation type.
     */
    private $operationType;

    /**
     * Define property for cash out.
     */
    private $cashOut;

    /**
     * Define property for cash in.
     */
    private $cashIn;

    /**
     * Get converted amount, operation type and user type when instantiating Commission Fee.
     */
    public function __construct(float $convertedAmount, string $operationType = null, string $userType = null)
    {
        $this->operationType = $operationType;
        $this->cashOut = new CashOut($convertedAmount, $userType);
        $this->cashIn = new CashIn($convertedAmount, $userType);
    }

    /**
     * Return the computation fee per commission fee type.
     */
    public function _returnComputedFeePerType()
    {
        switch ($this->operationType) {
            case 'cash_in':
                $output = $this->cashIn->_return();
                break;

            case 'cash_out':
                $output = $this->cashOut->_return();
                break;

            default:
                $output = 0;
        }

        return $output;
    }
}
