<?php

declare(strict_types=1);

namespace CommissionFees\CommissionTask\Service\Helper;

class ParseCsv
{
    public static function thanks()
    {
        try {

            $in = file_get_contents('php://stdin', true);
            $test = str_getcsv($in, PHP_EOL, '"');

            foreach ($test as $key => $value) {
                $return[$key] = explode(',', $value);
            }

            return $return;
        } catch (\ErrorException $e) {

            return $e->getMessage();
        }
    }
}
