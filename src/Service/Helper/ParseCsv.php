<?php

declare(strict_types=1);

namespace CommissionFees\CommissionTask\Service\Helper;

class ParseCsv
{
    /**
     * Get stdin file from the script, parse then set to array.
     *
     * @return string
     */
    public static function _stdinCsv(): array
    {
        $result = [];
        try {
            $stdin = file_get_contents('php://stdin', true);
            $getCSvs = str_getcsv($stdin, PHP_EOL, '"');

            foreach ($getCSvs as $getCSv => $value) {
                $result[$getCSv] = explode(',', $value);
            }
        } catch (\ErrorException $e) {
            $result = $e->getMessage();
        }

        return $result;
    }
}
