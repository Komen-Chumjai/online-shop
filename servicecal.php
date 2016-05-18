<?php 
class Calculator {
	public function sum ($x, $y)
	{
		$z = $x * $y;
		return $z;
	}
}

$calc = new Calculator;

$value = $calc->sum($_GET['x'], $_GET['y']);

$result = array('value' => $value);

echo 'var result = ' . json_encode($result);
?>