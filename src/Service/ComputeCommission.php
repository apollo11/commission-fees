<?php

declare(strict_types=1);

namespace CommissionFees\CommissionTask\Service;

use CommissionFees\CommissionTask\Service\Fees\TotalAmount;
use CommissionFees\CommissionTask\Service\Helper\ParseCsv;

class ComputeCommission extends ParseCsv
{
    /**
     * @var array|string
     */
    public $scsvData;

    /**
     * ComputeCommission constructor.
     */
    public function __construct()
    {
        $this->scsvData = ParseCsv::_stdinCsv();
    }

    /**
     * @return string
     */
    public function _runAndCalculateCommissionFee()
    {
        $cashIn = new TotalAmount($this->scsvData);

        $results =
            $cashIn->calculatedCommissionFee();

        fwrite(STDOUT, $results);

        return
            $results;
    }
}
