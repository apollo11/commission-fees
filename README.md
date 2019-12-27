# Commission

#### Notes:
- `In cash in if total amount not more than 5.00 EUR will have 0.03% Commission fee, not specified
percentage if total amount is greater than 5.00 EUR or maybe I'm missing something. I set the default to 0.00`
- `In cash out legal type if total amount not less than 0.50 EUR will have 0.3% Commission fee, not specified
percentage if total amount is less than  0.50 EUR or maybe I'm missing something. I set the default to 0.00`

#### PHPUnit
- `PHPUnit 8.5.0 by Sebastian Bergmann and contributors. `
#### PHP CS Fixer
- `PHP CS Fixer 2.16.1 Yellow Bird by Fabien Potencier and Dariusz Ruminski`
#### PHP Version
- `PHP 7.4.1 (cli) (built: Dec 18 2019 14:47:11) ( NTS )`
- `Note: if you updated your version to php7.4.1 and using the function implode() swap the places of glue and pieces parameter.`
#### Instruction:
- `composer install`
- `composer dumpautoload`
- `composer run test`

#### Run script
- ` cat src/Storage/input.csv | php script.php `
    ```
    Output: 
       3.60
       3.00
       3.00
       0.00
       0.90
       3.00
       0.30
       0.00
       3.00
       0.90
       0.30
       9000
    ```
- ` cat src/Storage/input.csv | php script.php > src/Storage/ouput.csv `
- `Open src/Storage/output.csv you should see the output:`
    ```3.60
       3.00
       3.00
       0.00
       0.90
       3.00
       0.30
       0.00
       3.00
       0.90
       0.30
       9000
    ```
- Test Script run:
    ``` cat src/Storage/input.csv | phpunit tests/Service/ComputeCommissionTest ```
