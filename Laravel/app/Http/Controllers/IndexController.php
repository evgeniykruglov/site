<?php namespace App\Http\Controllers;

use Illuminate\Http\Request; 

class IndexController extends Controller
{
	public function fibonacci($v) {
		$i = 0;
		$n = 1;
		$prelastN = 0;
		$lastN = 0;
		$stack = array('0');
		while ($i != $v){
			$stack[] = $n;
			$prelastN = $lastN;
			$lastN = $n;
			$n = $prelastN + $lastN;
			$i++;
			}
		$comma_separated = implode(",", $stack);
		//var_dump($stack);
		return view('simbirsoft') -> with(['array' => $comma_separated]);
	
	}
}
