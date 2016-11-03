<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function genTextFromNumber($num){
	 	$result = "";
	 	
	 	$u = array();
	 	$u[0] = '';
	 	$u[1] = '';
	 	$u[2] = 'สิบ';
	 	$u[3] = 'ร้อย';
	 	$u[4] = 'พัน';
	 	$u[5] = 'หมื่น';
	 	$u[6] = 'แสน';
	 	$u[7] = 'ล้าน';
	 	
	 	$n = array();
	 	$n[0] = '';
	 	$n[1] = 'หนึ่ง';
	 	$n[2] = 'สอง';
	 	$n[3] = 'สาม';
	 	$n[4] = 'สี่';
	 	$n[5] = 'ห้า';
	 	$n[6] = 'หก';
	 	$n[7] = 'เจ็ด';
	 	$n[8] = 'แปด';
	 	$n[9] = 'เก้า';
	 	
	 	$nameArr = str_split($num);
		$totalLength = count($nameArr);
		
	 	for($i=0; $i<$totalLength; $i++){
	 		
	 		if($nameArr[$i]>0){
	 			
	 			if(($totalLength-$i) % 7 == 0){	
	 				$result .= $n[$nameArr[$i]];
		 			$result .= $u[7];	
		 		}else if(($totalLength-$i) % 6 == 0){	
	 				$result .= $n[$nameArr[$i]];
		 			$result .= $u[6];	
		 		}else if(($totalLength-$i) % 5 == 0){
	 				$result .= $n[$nameArr[$i]];
		 			$result .= $u[5];	
		 		}else if(($totalLength-$i) % 4 == 0){
	 				$result .= $n[$nameArr[$i]];
		 			$result .= $u[4];	
		 		}else if(($totalLength-$i) % 3 == 0){
	 				$result .= $n[$nameArr[$i]];
		 			$result .= $u[3];	
		 		}else if(($totalLength-$i) % 2 == 0){
	 				if($nameArr[$i]>1)
		 				$result .= $n[$nameArr[$i]];
		 			$result .= $u[2];	
		 		}else if(($totalLength-$i) == 1){
		 			if($nameArr[$i]==1)
	 					$result .= "เอ็ด";
		 			else 
	 					$result .= $n[$nameArr[$i]];
		 				
		 			$result .= $u[1];	
		 		}
	 		}
	 			
	 	}
	 	return $result;
	 }
}
