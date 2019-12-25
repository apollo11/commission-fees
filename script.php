<?php

declare(strict_types=1);

require __DIR__.'/vendor/autoload.php';

use CommissionFees\CommissionTask\Service\Commission;

$index = new Commission();

print_r($index->cashin());
