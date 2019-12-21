<?php

declare(strict_types=1);

namespace CommissionFees\CommissionTask\Service\Fees;

use CommissionFees\CommissionTask\Service\Helper\ParseCsv;

class CashIn
{
    use
        Currencies;

    const
        COMMISSION_FEE = 0.03
        ;

    /**
     * Define date.
     *
     * @var $date
     */
    private $date;

    /**
     * @var
     */
    private $identificationNo;

    /**
     * @var $userType
     */
    private $userType;

    /**
     * @var $operationType
     */
    private $operationType;

    /**
     * @var $operationAmt
     */
    private $operationAmt;

    /**
     * @var $currency
     */
    private $currency;

    /**
     * @var $data
     */
    protected $data;

    /**
     * @var $percentage
     */
    protected $percentage;

    /**
     * @param $date
     * @return mixed
     */
    private function setDate($date)
    {
        return
            $this->date = $date;
    }

    /**
     * @param int $idNo
     * @return int
     */
    private function setIdentificationNo(int $idNo): int
    {
        return
            $this->identificationNo = $idNo;
    }

    /**
     * @param string $userType
     * @return string
     */
    private function setUserType(string $userType): string
    {
        return
            $this->userType = $userType;
    }

    /**
     * @param string $operationType
     * @return string
     */
    private function setOperationType(string $operationType): string
    {
        return
            $this->operationType = $operationType;
    }

    /**
     * Description.
     *
     * @param float $operation
     * @return float
     */
    private function setOperationAmt(float $operation): float
    {
        return
            $this->operationAmt = $operation;
    }

    /**
     * @param string $currency
     * @return string
     */
    private function setCurrency(string $currency): string
    {
        return
            $this->currency = $currency;
    }

    /**
     * @return ParseCsv
     */
    private function setData()
    {
        return
            $this->data = new ParseCsv();
    }

    /**
     * @return float
     */
    private function setFee(): float
    {
        return
            $this->percentage = self::COMMISSION_FEE;
    }

}
