<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\InvokableRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class PersonalCodeRule implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure(string): PotentiallyTranslatedString $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail): void
    {
        $code = strval($value);

        // Tikriname, ar asmens kodas yra 11 skaitmenų
        if (strlen($code) !== 11) {
            $fail('Asmens kodo ilgis turi būti 11 skaitmenų.');
        }

        // Tikriname, ar pirmas skaitmuo yra 1, 2, 3, 4, 5 arba 6
        if (!in_array($code[0], [1, 2, 3, 4, 5, 6])) {
            $fail('Neteisingas pirmasis asmens kodo skaitmuo.');
        }

        // Tikriname, ar skaitmenys 2-7 atitinka gimimo metus, mėnesį ir dieną
        $year  = intval(substr($code, 1, 2));
        $month = intval(substr($code, 3, 2));
        $day   = intval(substr($code, 5, 2));
        if (!checkdate($month, $day, 1900 + $year)) {
            $fail('Neteisingas gimimo datos formatas.');
        }

        // Tikriname kontrolinį skaičių
        $coeff   = [1, 2, 3, 4, 5, 6, 7, 8, 9, 1];
        $control = $this->calculateControlNumber($code, $coeff);
        if ($control === 10) {
            $coeff   = [3, 4, 5, 6, 7, 8, 9, 1, 2, 3];
            $control = $this->calculateControlNumber($code, $coeff);
            if ($control === 10) {
                $control = 0;
            }
        }
        if (!array_key_exists(10, str_split($code)) || $control !== intval($code[10])) {
            $fail('Neteisingas asmens kodo kontrolinis skaičius.');
        }
    }

    /**
     * @param string $code
     * @param array $coeff
     * @return int
     */
    private function calculateControlNumber(string $code, array $coeff): int
    {
        $s = 0;

        for ($i = 0; $i < 10; $i++) {
            if (!is_numeric($code[$i]) || !array_key_exists($i, str_split($code)) ) {
                return -1;
            }
            $s += intval($code[$i]) * $coeff[$i];
        }

        return $s % 11;
    }
}
