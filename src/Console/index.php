<?php

namespace CommissionFees\CommissionTask\Console;

use CommissionFees\CommissionTask\Service\Helper\ParseCsv;

class index extends ParseCsv
{

    public function test()
    {
        return ParseCsv::thanks();

    }

}

//print __DIR__. "\n";
//
//$ouput = new index();
//
//print $ouput->test();
//
//
//$jpy = 3000000 * 0.0082;
//
//print $jpy."\n";
//$natural =  200.00 * 0.03;
//
//print ceil($natural) . "\n";
//
//$sum = 1200.00 * 0.03;
//
//print round($sum, 2)."\n";

//$in = file_get_contents("php://stdin", "r");
//
//
//$test = str_getcsv($in, PHP_EOL, '"');
//
//foreach ($test as $key => $value) {
//
//    $return[$key] = explode(',', $value);
//}
//
//$shit = implode(',', $test);
//
////$test = explode(',', $in);
//
//print_r($return);


