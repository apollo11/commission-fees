<?php

declare(strict_types=1);

namespace CommissionFees\CommissionTask\Service\Helper;

class ParseCsv
{
    /**
     * Use stdin to get the result and explode.
     */
    public static function _stdinCsv(): array
    {
        try {
            $result = [];
            $stdin = file_get_contents('php://stdin', true);
            $getCSvs = str_getcsv($stdin, PHP_EOL, '"');

            foreach ($getCSvs as $getCSv => $value) {
                $result[$getCSv] = explode(',', $value);
            }

            return
                $result;
        } catch (\Error $e) {
            return
                ['error' => [$e->getCode(), $e->getMessage()]];
        }
    }
}
