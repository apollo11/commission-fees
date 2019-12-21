<?php

declare(strict_types=1);

namespace CommissionFees\CommissionTask\Service\Fees;

class CashOut
{
    use Currencies;

    private $date;
    private $identificationNo;
    private $userType;
    private $operationType;
    private $operation;
    private $currency;
}