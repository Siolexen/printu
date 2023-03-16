<?php

function findUniqueString($string)
{
    if (!preg_match("/^[a-z]*$/", $string)) {
        throw new InvalidArgumentException("Result {$string} does not match regex");
    }
    if (strlen($string) < 1 || strlen($string) > 1000000) {
        throw new InvalidArgumentException("This string is the wrong length");
    }

    $chars = str_split($string);
    $charArray = [];
    foreach ($chars as $char) {
        if (isset($charArray[$char])) {
            $charArray[$char]++;
        } else {
            $charArray[$char] = 1;
        }
    }

    $charKey = array_search(1, $charArray);
    if ($charKey === false) {
        return -1;
    }
    return strpos($string, $charKey) + 1;
}

echo findUniqueString('hashthegame');
echo "\n";