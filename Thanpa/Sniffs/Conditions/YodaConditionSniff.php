<?php

/**
 * Anti-Yoda condition sniff.
 * Based on https://github.com/Zenify/CodingStandard/blob/ad0ec95c41b9ce05d26d9cb850f25d992bf724ea/src/ZenifyCodingStandard/Sniffs/ControlStructures/YodaConditionSniff.php
 */
class Thanpa_Sniffs_Conditions_YodaConditionSniff implements PHP_CodeSniffer_Sniff
{

    const MESSAGE_ERROR = 'Yoda condition should not be used; switch expression order';

    /**
     * @return int[]
     */
    public function register()
    {
        return [
            T_IS_IDENTICAL, T_IS_NOT_IDENTICAL, T_IS_EQUAL, T_IS_NOT_EQUAL, T_GREATER_THAN, T_LESS_THAN,
            T_IS_GREATER_OR_EQUAL, T_IS_SMALLER_OR_EQUAL,
        ];
    }


    /**
     * @param PHP_CodeSniffer_File $file
     * @param int $position
     */
    public function process(\PHP_CodeSniffer_File $file, $position)
    {
        $leftTokenPosition = $file->findPrevious(T_WHITESPACE, ($position - 1), null, true);
        $tokens = $file->getTokens();
        if ($leftTokenPosition) {
            if ($this->isExpressionToken($tokens[$leftTokenPosition])) {
                $file->addError(self::MESSAGE_ERROR, $position);
            }
        }
    }


    /**
     * Returns if the token is an expression token.
     *
     * @param array $token The token.
     * @return bool
     */
    private function isExpressionToken(array $token)
    {
        return in_array(
            $token['code'],
            [T_MINUS, T_NULL, T_FALSE, T_TRUE, T_LNUMBER, T_CONSTANT_ENCAPSED_STRING]
        );
    }

}