<?php
declare(strict_types=1);

function fizzBuzz(int $begin, int $end): string
{
	$result = "";
	
	for ($i = $begin; $i <= $end; ++$i) {
		switch (true) {
			case (($i % 3 === 0) && ($i % 5 === 0)):
				print_r("FizzBuzz ");
				break;
			case ($i % 3 === 0):
				print_r("Fizz ");
				break;
			case ($i % 5 === 0):
				print_r("Buzz ");
				break;
			default:
				print_r($i . " ");
		}
	}
	
	return $result;	
}
