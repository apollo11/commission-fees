<?php

declare(strict_types=1);

require __DIR__.'/vendor/autoload.php';

use CommissionFees\CommissionTask\Service\ComputeCommission;

$index = new ComputeCommission();

/**
 * Checking if calculated amount array is not empty.
 * If not empty will implode and execute STDOUT fwrite command.
 *
 */
if(!empty($index->_runAndCalculateCommissionFee())) {

    //Get the main results for computation.
    $output = $index->_runAndCalculateCommissionFee();

    // Bug when updating to 7.41 deprecated implode when using parameter glue.
    // Quick fix swap glue and piece.
    $imploded = phpversion() < '7.4.1' ? implode($output, "\n") : implode("\n", $output);

    fwrite(STDOUT, $imploded."\n");

}


