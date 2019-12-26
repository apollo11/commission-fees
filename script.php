<?php

declare(strict_types=1);

require __DIR__.'/vendor/autoload.php';

use CommissionFees\CommissionTask\Service\ComputeCommission;

$index = new ComputeCommission();

$index->_runAndCalculateCommissionFee();
