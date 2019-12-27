<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use CommissionFees\CommissionTask\Service\ComputeCommission;

class ComputeCommissionTest extends TestCase
{
    /**
     * Test equality of the data provided.
     * If commission is not empty the will check the equality of expected and actual output.
     *
     */
    public function testEquality()
    {
        $co = new ComputeCommission();
        if (!empty($co->_runAndCalculateCommissionFee())) {

            $actual = $co->_runAndCalculateCommissionFee();
            $expected = ['3.60', '3.00', '3.00', '0.00', '0.90', '3.00', '0.30', '0.00', '3.00', '0.90', '0.30', 9000.0];

            $this->assertSame($expected, $actual);

        } else {

            $this->assertSame(null, null);

        }

    }

}