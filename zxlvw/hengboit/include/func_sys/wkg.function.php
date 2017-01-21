<?php
function day($dayone,$daytwo){
      $start_time_array=explode("-",$dayone);
      $endtime_time_array=explode("-",$daytwo);
      $start_time_year=$start_time_array[0];
      $start_time_month=$start_time_array[1];
      $start_time_day=$start_time_array[2];
      $end_time_year=$endtime_time_array[0];
      $end_time_month=$endtime_time_array[1];
      $end_time_day=$endtime_time_array[2];
      $start=mktime(0,0,0,$start_time_month ,$start_time_day,$start_time_year);
      $end=mktime(0,0,0,$end_time_month ,$end_time_day,$end_time_year);
      $result=$start-$end;
	  $result=$result/3600/24;
      return $result;
}
?>