<?php

declare(strict_types=1);

namespace CommissionFees\CommissionTask\Service;

use CommissionFees\CommissionTask\Service\Fees\CashIn;
use CommissionFees\CommissionTask\Service\Helper\ParseCsv;

class Commission extends ParseCsv
{
    public $scale;

    public function __construct()
    {
        $this->scale = ParseCsv::_stdinCsv();
    }

    public function cashIn()
    {
        $cashIn = new CashIn($this->scale);
        $results = $cashIn->komisyon();

        return $results;
    }
}
