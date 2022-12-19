<?php
/*
Plugin Name: Countdown to Christmas and New Year
Description: A plugin that generates a shortcode for a countdown to Christmas and New Year's Day
Version: 1.0
Author: Luciano M.
Shortcode: [christmas_countdown]
*/

function christmas_countdown_shortcode(  ) {

	$christmas = strtotime( 'December 25' );
	$new_year = strtotime( 'January 1' );

	$current_time = current_time( 'timestamp' );

	if ( $current_time < $christmas ) {
		$diff = $christmas - $current_time;
		$text = 'until Christmas';
	} elseif ( $current_time < $new_year ) {
		$diff = $new_year - $current_time;
		$text = 'until New Year\'s Day';
	} else {
		return 'Merry Christmas and Happy New Year!';
	}

    $days = floor( $diff / 86400 );
    $hours = floor( ( $diff % 86400 ) / 3600 );
    $minutes = floor( ( $diff % 3600 ) / 60 );
    $seconds =  $diff % 60 ;

	$countdown = sprintf( $days, $hours, $minutes, $seconds );

	return $days. ' Days ' . $hours. ' Hours ' . $minutes. ' Minutes ' . $seconds. ' Seconds ' . $text;
}
add_shortcode( 'christmas_countdown', 'christmas_countdown_shortcode' );
