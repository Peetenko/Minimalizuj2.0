<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapsController extends Controller
{
    function index(Request $request){
        $numbers = '';
        for($i=0;$i<=100;$i++){

            if(($i % 5 === 0)&&($i % 3 === 0)){
                $num = 'FizzBuzz';
            }elseif($i % 3 === 0){
                $num = 'Fizz';
            }elseif($i % 5 === 0){
                $num = 'Buzz';
            }else{
                $num = $i;
            }
            $numbers = $numbers .$num . ',';
        }
        $numbersArray = explode(',',$numbers);
        $valueCount = array_count_values($numbersArray);

        $fizzCount = array_search('Buzz',$numbersArray);
        //fizz buzz counter
        $fiz = 0;
        $buz = 0;
        $fizbuz = 0;
        foreach($numbersArray as $item){
            if($item == 'Fizz'){
                $fiz = $fiz + 1;
            }elseif($item == 'Buzz'){
                $buz = $buz + 1;
            }elseif($item == 'FizzBuzz'){
                $fizbuz = $fizbuz + 1;
            }
        }
        $isFloat = is_double(1.1);
        //sort($numbersArray);
        dd($numbersArray,
            $fizzCount,
            'fizz count: '.$fiz,
            'buzz count: '.$buz,
            'fizzbuzz count: '. $fizbuz,
            $isFloat,
            is_array($numbersArray),
            is_float(2.2),
            $valueCount



        );


        return view('map');
    }
}
