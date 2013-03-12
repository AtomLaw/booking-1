<?php


function getFeaturedRoom($adults,$childs,$array){
	$counter = 0;
	$roomSel = array();
	

	foreach($array as $x){
	
			if(($adults != 0) && ($childs !=0)){ 
	
					if(($adults >= $x['min_adult'] ) && ($adults <= $x['max_adult'])){
							

							if(($childs >= $x['min_child'] ) && ($childs <= $x['max_child'])){
								$roomSel = $x;
								//echo 'a';
								break;
							}else{
								$roomSel = getFeaturedRoomChild($adults,$childs,$array);
								//echo 'n';
								break;
							}//end child
					}//end if  	
			} //end not zero;
			else{
					if(($adults >= $x['min_adult'] ) && ($adults <= $x['max_adult'])){
							$roomSel = $x;
					
					}//end if 
			}//ennd zero child
	$counter++;
	}//end foreach
	return $roomSel;
} //featured Rooms

function getFeaturedRoomChild($adults,$childs,$array){
	$roomSel = array();
	$numArrays =  count($array);
	foreach($array as $x){
			if(($childs >= $x['min_child'] ) && ($childs <= $x['max_child']) && ($adults >= $x['min_adult'] ) && ($adults <= $x['max_adult'])){
				$roomSel = $x;
				//echo 'c';
				break;
			}//end if 
			else{
				$roomSel = $array[0];
				//echo 'd';
				break;
			}
	}//end for each
	return $roomSel;
}//getFEaturedRoomChild

    function preprint($s, $return=false) {
        $x = "<pre>";
        $x .= print_r($s, 1);
        $x .= "</pre>";
        if ($return) return $x;
        else print $x;
    } 

?>