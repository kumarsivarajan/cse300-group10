<?php 
function getPastDates($number){
				$datestring = "%d-%m-%Y";
				$time = time();
				
				
				$datestring= mdate($datestring, $time);
				$splitted_date=explode("-", $datestring);
				$year=(int)$splitted_date[2];
				$month=(int)$splitted_date[1];

				$day=(int)$splitted_date[0];
				$dates=Array();
				foreach($programs as $key=>$value)
					$ordByProg[$value]=0;
				$dates[$day.'-'.$month.'-'.$year]=$ordByProg;
				for($i=0;$i<$number-1;$i++)
					if($day-1>0){
						$day=$day-1;
						$dates[$day.'-'.$month.'-'.$year]='';
						
						}
					else{
						if($month-1>0){
							$month=$month-1;
							$day=days_in_month($month,$year);
							
						}
						else{
							$month=12;
							$year=$year-1;
							$day=days_in_month($month,$year);
						}
						$dates[$day.'-'.$month.'-'.$year]='';

					}
				
				return array_reverse($dates);
	}
	function dateEquals($date1,$date2){
					$split_date1=explode("-", $date1);
					$split_date2=explode("-", $date2);
					if((int)$split_date1[0]==(int)$split_date2[0]&&(int)$split_date1[1]==(int)$split_date2[1]&&(int)$split_date1[2]==(int)$split_date2[2])
						return true;
					else
						return false;
				
				}

	?>
