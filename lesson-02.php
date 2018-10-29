<?php
    //Задание №1

	$a = -5;
	$b = 12;

	if ($a >= 0 && $b >= 0) {
		echo ($a - $b);
	}

    if ($a < 0 && $b < 0) {
        echo ($a * $b);
    }

    if ($a > 0 && $b < 0 || $a < 0 && $b > 0) {
        echo ($a + $b);
    }
?>
<br>
<?php

    //Задание №2

    $a = 12;

	switch($a) {
        case($a <= 1):
            echo 1;
		case($a <= 2):
			echo 2;
		case($a <= 3):
			echo 3;
		case($a <= 4):
			echo 4;
		case($a <= 5):
			echo 5;
		case($a <= 6):
			echo 6;
		case($a <= 7):
			echo 7;
		case($a <= 8):
			echo 8;
		case($a <= 9):
			echo 9;
		case($a <= 10):
			echo 10;
		case($a <= 11):
			echo 11;
        case($a <= 12):
		    echo 12;
		case($a <= 13):
			echo 13;
		case($a <= 14):
			echo 14;
		case($a <= 15):
			echo 15;
	}

?>
	<br>
<?php
	//Задание №3

    function fnPlus($a, $b) {
	    return $a + $b;
    }

    function fnMinus($a, $b) {
	    return $a - $b;
    }

    function fnMult($a, $b) {
        return $a * $b;
    }

    function fnDiv($a, $b) {
	    return $a / $b;
    }

?>
	<br>
<?php
    //Задание №4

    function mathOperation($arg1, $arg2, $operation) {
	    switch ($operation) {
            case 'plus':
	            return fnPlus($arg1,$arg2);
		    case 'minus':
			    return fnMinus($arg1,$arg2);
		    case 'mult':
			    return fnMult($arg1,$arg2);
		    case 'dev':
			    return fnDiv($arg1,$arg2);
        }
    }

?>
	<br>
<?php
    //Задание №5

	$year = date('Y'); //Выводим код echo $year в нужном месте в подвале

?>
	<br>
<?php
	//Задание №6

	function power($val, $pow, $summa=1) {
		if ($pow == 0) {
			return $summa;
		}
		$summa = $summa * $val;
		$pow--;

		return power($val, $pow, $summa);
	}

	echo power(3,2);

?>
	<br>
<?php
	//Задание №7

	function currentTime () {
		$hour = date('H');
		$minute = date('i');

		if (substr($hour, -1) == '1' && $hour != '11') {
			$hourName = 'час';
		} elseif (substr($hour, -1) >= 2 && substr($hour, -1) <= 4 && $hour != '12' && $hour != '13' && $hour != '14') {
			$hourName = 'часа';
		} else {
			$hourName = 'часов';
		}

		if (substr($minute, -1) == '1' && $minute != '11') {
			$minuteName = 'минута';
		} elseif (substr($minute, -1) >= 2 && substr($minute, -1) <= 4 && $minute != '12' && $minute != '13' && $minute != '14') {
			$minuteName = 'минуты';
		} else {
			$minuteName = 'минут';
		}

		return "$hour $hourName $minute $minuteName";
	}

	echo currentTime();
?>