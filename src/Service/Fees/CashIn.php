<?php

declare(strict_types=1);

namespace CommissionFees\CommissionTask\Service\Fees;

class CashIn
{
    use Currencies;

    /**
     * Set constant.
     */
    const
        COMMISSION_FEE = 0.03;

    /**
     * Set property date.
     *
     * @var
     */
    private $date;

    /**
     * Set property for identification no.
     *
     * @var
     */
    private $identificationNo;

    /**
     * Set property user type.
     *
     * @var
     */
    private $userType;

    /**
     * Set property operation type.
     *
     * @var
     */
    private $operationType;

    /**
     * Set property operation amount.
     *
     * @var
     */
    private $operationAmt;

    /**
     * Set property currency.
     *
     * @var
     */
    private $currency;

    /**
     * Set property data.
     *
     * @var
     */
    private $data = [];

    /**
     * Set property percentage.
     *
     * @var
     */
    protected $percentage = self::COMMISSION_FEE;

    private $convertedAmount;

    public $commissionFee;

    public $fee;

    public function __construct($scale)
    {
        $this->data = $scale;
    }

    /**
     * Set data and assign to property data.
     */
    public function setData(array $data): array
    {
        return
            $this->data = $data;
    }

    /**
     * Set date and assign to property date.
     */
    private function setDate(string $date): string
    {
        return
            $this->date = $date;
    }

    /**
     *  Set identificationNo and assign to property identificationNo.
     */
    private function setIdentificationNo(int $idNo): int
    {
        return
            $this->identificationNo = $idNo;
    }

    /**
     * Set UserType and assign to property userType.
     */
    private function setUserType(string $userType): string
    {
        return
            $this->userType = $userType;
    }

    /**
     *  Set OperationType and assign to property operationType.
     */
    private function setOperationType(string $operationType): string
    {
        return
            $this->operationType = $operationType;
    }

    /**
     *  Set OperationAmt and assign to property operationAmt.
     */
    private function setOperationAmt(float $operation): float
    {
        return
            $this->operationAmt = $operation;
    }

    /**
     *  Set currency and assign to property currency.
     */
    private function setCurrency(string $currency): string
    {
        return
            $this->currency = $currency;
    }

    private function setTotalAmt($currency, $operationAmt)
    {
        $this->convertedAmount = $this->_returnConversion($currency, $operationAmt);
    }

    private function setCommissionFee($convertedAmt, $operationType, $userType)
    {
        $this->fee = $this->_setFee($convertedAmt, $operationType, $userType);

        return $this->fee;
    }

    public function komisyon()
    {
        $return = [];
        if (is_array($this->data)) {
            for ($i = 0; $i < count($this->data); ++$i) {
                $this->setDate($this->data[$i][0]);
                $this->setIdentificationNo((int) $this->data[$i][1]);
                $this->setOperationType((string) $this->data[$i][3]);
                $this->setUserType((string) $this->data[$i][2]);
                $this->setOperationAmt((float) $this->data[$i][4]);
                $this->setCurrency($this->data[$i][5]);
                $this->setTotalAmt($this->currency, $this->operationAmt);
                $this->setCommissionFee($this->convertedAmount, $this->operationType, $this->userType);

                $return[$i]['date'] = $this->date;
                $return[$i]['id'] = $this->identificationNo;
                $return[$i]['user_type'] = $this->userType;
                $return[$i]['operation_type'] = $this->operationType;
                $return[$i]['operation_amt'] = $this->operationAmt;
                $return[$i]['currency'] = $this->currency;
                $return[$i]['converted_amt'] = $this->convertedAmount;
                $return[$i]['commission_fee'] = $this->fee;
            }
        }

        return $return;
    }
}
