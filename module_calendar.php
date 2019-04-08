
<table id="calendar">
  <caption><?php echo date("Y")." 年 - ".date("m")." 月"; ?></caption>
  <tr class="weekdays">
    <th scope="col">星期一</th>
    <th scope="col">星期二</th>
    <th scope="col">星期三</th>
    <th scope="col">星期四</th>
    <th scope="col">星期五</th>
    <th scope="col">星期六</th>
    <th scope="col">星期天</th>
  </tr>
<?php 
				
			$today = date("d"); // Current day
			$month = date("m"); // Current month
			$year = date("Y"); // Current year
			$days = cal_days_in_month(CAL_GREGORIAN,$month,$year); // Days in current month
			
			$lastmonth = date("t", mktime(0,0,0,$month-1,1,$year)); // Days in previous month
			
			$start = date("N", mktime(0,0,0,$month,1,$year)); // Starting day of current month
			$finish = date("N", mktime(0,0,0,$month,$days,$year)); // Finishing day of  current month
			$laststart = $start - 1; // Days of previous month in calander
			
			$counter = 1;
			$nextMonthCounter = 1;
			
			if($start > 5){	$rows = 6; }else {$rows = 5; }

			for($i = 1; $i <= $rows; $i++){
				echo '<tr>';
				for($x = 1; $x <= 7; $x++){				
					
					if(($counter - $start) < 0){
						$date = (($lastmonth - $laststart) + $counter);
						$class = 'day other-month';
					}else if(($counter - $start) >= $days){
						$date = ($nextMonthCounter);
						$nextMonthCounter++;
						
						$class = 'date';
							
					}else {
						$date = ($counter - $start + 1);
						if($today == $counter - $start + 1){
							$class = 'day other-month';
						}
					}
						
					
					echo '<td class="'.$class.'"><div class="date">'.$date.'</div></td>';
				
					$counter++;
					$class = '';
				}
				echo '</tr>';
			}
			
		?>
  

</table>
