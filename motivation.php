<?php
/**
 * @package WPAdmin_Motivation
 */
/*
Plugin Name: WPAdmin Motivation
Plugin URI: https://moneycortex.com/tools/wpadmin-motivation-wordpress-plugin/
Description: See a motivational quote in the top right of the WordPress dashboard on each page. Get motivated!
Version: 1.1.0
Author: MoneyCortex
Author URI: https://moneycortex.com/
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: wpadmin-motivation
*/

/*
WPAdmin Motivation is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
WPAdmin Motivation is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with WPAdmin Motivation. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

defined( 'ABSPATH' ) or die( 'Sorry, access denied.' );

function admin_moti_get_sentence() {
	/** These are the motivational sentences to display, separated by a new line */
	$quotes =
	"If you dream it, you can do it.
	Never, never, never give up.
	Don't wait. The time will never be just right.
	Everything you can imagine is real.
	Remember no one can make you feel inferior without your consent.
	Turn your wounds into wisdom.
	Wherever you go, go with all your heart.
	Do what you can, with what you have, where you are.
	Action is the foundational key to all success.
	Do one thing every day that scares you.
	You must do the thing you think you cannot do.
	Life is trying things to see if they work.
	Don't regret the past, just learn from it.
	Believe you can and you're halfway there.
	Live what you love.
	The power of imagination makes us infinite.
	Eighty percent of success is showing up.
	To be the best, you must be able to handle the worst.
	A jug fills drop by drop.
	If you have never failed you have never lived.
	It does not matter how slowly you go as long as you do not stop.
	We become what we think about.
	An obstacle is often a stepping stone.
	Dream big and dare to fail.
	Work hard. Dream big. Create awesome content!
	Life is short. Live passionately.
	Life shrinks or expands in proportion to one's courage.
	Life is a one time offer, use it well.
	Be the change you wish to see in the world.
	Love the life you live, and live the life you love.
	Your creativity is limitless, don't be afraid to explore it.
	The world needs your unique voice, so keep creating.
	Success comes from consistently showing up and doing the work.
	Believe in yourself and your ability to make a difference.
	Don't just write anything, write something awesome!
	Comparison is the thief of joy, focus on your own progress.
	Your passion for creating is what'll set you apart from the rest.
	Every small step you take towards your goals counts, keep going.
	Always embrace failure as a learning opportunity.
	The only limits are the ones you set for yourself, break through them.
	Remember why you started and let that drive you to keep creating.";

	// Split the quotes by new line
	$quotes = explode( "\n", $quotes );

	// Randomly pick a line to show
	return wptexturize( $quotes[ mt_rand( 0, count( $quotes ) - 1 ) ] );
}

// Echo the randomly line, we'll position it using the coding further down
function admin_moti() {
	$picked = admin_moti_get_sentence();
	echo "<p id='motivation'>$picked</p>";
}

// Set the function to execute when the admin_notices action hook is called
add_action( 'admin_notices', 'admin_moti' );

// CSS to style and position the motivational quote
function moti_css() {
	// Makes the positioning work for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#motivation {
		float: $x;
		padding-$x: 12px;
		padding-top: 10px;
		margin: 0;
		font-size: 12px;
		font-style: italic;
	}
	</style>
	";
}
// Add the CSS to the header of the admin area
add_action( 'admin_head', 'moti_css' );