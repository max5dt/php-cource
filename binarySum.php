<?php

function binarySum($num1, $num2) {
    return (decbin(bindec($num1) + bindec($num2)));
}

print_r(binarySum('10', '1') . "\n");
print_r(binarySum('1101', '101') . "\n");