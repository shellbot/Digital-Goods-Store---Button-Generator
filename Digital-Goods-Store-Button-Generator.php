<?php
/*
Plugin Name: Digital Goods Store - Button Generator
Plugin URI: http://www.digitalgoodsstore.com/sell-downloads-with-wordpress
Description: A plugin to enable easy integration of Digital Goods Store buy now and add to cart buttons to a post or page with [dgs] shortcodes.
Version: 1.0
Author: Digital Goods Store Ltd
Author URI: http://www.digitalgoodsstore.com
License: GPL2

    Copyright 2013  Digital Goods Store Ltd | http://www.digitalgoodsstore.com

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// process dgs shortcodes
function render_dgs_btn( $atts ) {
	wp_enqueue_script('dgs-js-api', 'http://remote.digitalgoodsstore.com/dgse.min.js', false, false, false);
	extract( shortcode_atts(
		array(
			'url'					=> '',
			'datacolor' 		=> '',
			'datasize' 			=> '',
			'datastyle' 		=> '',
			'dataprice' 		=> '',
			'dataembossed' => '',
			'datamydgs' 		=> '',
			'databutton' 		=> '',
			'text'					=> ''
		), $atts )
	);
	// render button
	if($databutton = 'true') {
		return '<a href="'.$url.'" data-color="'.$datacolor.'" data-size="'.$datasize.'" data-style="'.$datastyle.'" data-price="'.$dataprice.'" data-embossed="'.$dataembossed.'" data-mydgs="'.$datamydgs.'" data-button="true" class="dgs" target="_blank">'.$text.'</a>';
	}
}

add_shortcode( 'dgs', 'render_dgs_btn' );

?>