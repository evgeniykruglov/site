<?php namespace App\Http\Controllers;

use Illuminate\Http\Request; 

class IndexController extends Controller
{
	//public $count = $_POST['count'];
	public function fibonacci(Request $request) {
		$v = $request->get('count');
		$i = 0;
		$n = 1;
		$prelastN = 0;
		$lastN = 0;
		$stack = array('0');
		while ($i != ($v-1)){
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
		
	public function post() {
		//return ($_POST);
	}
}
