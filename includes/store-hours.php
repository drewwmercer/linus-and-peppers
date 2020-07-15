<?php 

date_default_timezone_set('America/New_York'); 

$hours = array(
    'mon' => array('11:30-15:00'),
    'tue' => array('11:30-15:00'),
    'wed' => array('11:30-15:00'),
    'thu' => array('11:30-15:00'),
    'fri' => array('11:30-15:00'),
    'sat' => array('11:30-15:00'),
    'sun' => array('00:00-00:00')
);

$exceptions = array(
	'Christmas' => '12/25',
	'New Years Day' => '1/1'
);

$open_now = "<strong class='open'>Yes, we're open! Today's hours are %open% until %closed%.</strong>";
$closed_now = "<strong class='closed'>Sorry, we're closed. Today's hours are %open% until %closed%.</strong>";
$closed_all_day = "<strong class='closed'>Sorry, we're closed on %day%.</strong>";
$exception = "<strong class='closed'>Sorry, we're closed for %exception%.</strong>";

$time_format = 'g:ia';

$days = array(
  'mon' => 'Mondays',
  'tue' => 'Tuesdays',
  'wed' => 'Wednesdays',
  'thu' => 'Thursdays',
  'fri' => 'Fridays',
  'sat' => 'Saturdays',
  'sun' => 'Sundays'
);

$day = strtolower(date("D"));
$today = strtotime('today midnight');
$now = strtotime(date("G:i"));
$is_open = 0;
$is_exception = false;
$is_closed_all_day = false;

// Check if closed all day
if($hours[$day][0] == '00:00-00:00') {
	$is_closed_all_day = true;
}

// Check if currently open
foreach($hours[$day] as $range) {
	$range = explode("-", $range);
	$start = strtotime($range[0]);
	$end = strtotime($range[1]);
	if (($start <= $now) && ($end >= $now)) {
		$is_open ++;
	}
}

// Check if today is an exception
foreach($exceptions as $ex => $ex_day) {
	$ex_day = strtotime($ex_day);
	if($ex_day === $today) {
		$is_open = 0;
		$is_exception = true;
		$the_exception = $ex;
	}
}

// Output HTML
if($is_exception) {
	$exception = str_replace('%exception%', $the_exception, $exception);
	echo $exception;
} elseif($is_closed_all_day) {
	$closed_all_day = str_replace('%day%', $days[$day], $closed_all_day);
	echo $closed_all_day;
} elseif($is_open > 0) {
	$open_now = str_replace('%open%', date($time_format, $start), $open_now);
	$open_now = str_replace('%closed%', date($time_format, $end), $open_now);
	echo $open_now;
} else {
	$closed_now = str_replace('%open%', date($time_format, $start), $closed_now);
	$closed_now = str_replace('%closed%', date($time_format, $end), $closed_now);
	echo $closed_now;
}
