<?php
/**
 * Plugin Name: WP Responsive Select Menu
 * Plugin URI: http://www.vivacityinfotech.net
 * Description: WP Responsive Select Menu Plugin is a mobile menu plugin to implement user-friendly responsive navigation optimized for mobile devices.
 * Version: 1.1
 * Author: Vivacity Infotech Pvt. Ltd.
 * Author URI: http://www.vivacityinfotech.net
 */

/* Copyright 2014  Vivacity InfoTech Pvt. Ltd.  (email : support@vivacityinfotech.net)

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

add_action( 'wp_enqueue_scripts', 'wpresmenu_enqueue_scripts' );
function wpresmenu_enqueue_scripts() {
	wp_enqueue_style( 'wpresmenu.css' , plugins_url( '/css/wpresmenu.css', __FILE__ ) );
	wp_enqueue_style( 'wprmenu-font' , '//fonts.googleapis.com/css?family=Open+Sans:400,300,600' );
	wp_enqueue_script('jquery.transit', plugins_url( '/js/jquery.transit.min.js', __FILE__ ), array( 'jquery' ));
	wp_enqueue_script('sidr', plugins_url( '/js/jquery.sidr.js', __FILE__ ), array( 'jquery' ));
	wp_enqueue_script('wpresmenu.js', plugins_url( '/js/wpresmenu.js', __FILE__ ), array( 'jquery' ));
	$wpr_options = array( 'zooming' => 'yes','from_width' => '768','swipe' => 'yes' );
	wp_localize_script( 'wpresmenu.js', 'wpresmenu', $wpr_options );	    
}

add_action('admin_menu', 'wpresmenu_on_admin');
function wpresmenu_on_admin() {
    add_menu_page( __( 'Responsive Menu', 'wp-responsive-menu' ), __( 'Responsive Menu', 'wp-responsive-menu' ), 'read', 'wp-responsive-select-menu/wp-responsive-select-menu-gui.php', '', 'dashicons-menu',99);
}

add_action( 'admin_enqueue_scripts', 'mw_enqueue_color_picker' );
function mw_enqueue_color_picker( $hook_suffix ) {
    // first check that $hook_suffix is appropriate for your admin page
    wp_enqueue_style( 'wp-color-picker');
  	 wp_enqueue_script( 'wp-color-picker');
  	 
  	}	

add_action('wp_head', 'wpresmenu_menu');
add_action('wp_head', 'wpresmenu_header_styles');
function wpresmenu_menu()
{?>
	<div id="wpresmenu_bar" class="wpresmenu_bar">
		<div class="wpresmenu_icon">
			<span class="wpresmenu_ic_1"></span>
			<span class="wpresmenu_ic_2"></span>
			<span class="wpresmenu_ic_3"></span>
		</div>
		<div class="menu_title">
			<p><?php echo get_option('menu_title'); ?></p>
		</div>
	</div>			
	<div id="wpresmenu_menu" class="wpresmenu_levels <?php echo get_option('slide_side') ?> wpresmenu_custom_icons sidr">
		<?php 
			$search_position_value=get_option('search_position');
			if($search_position_value == 'above_menu'): 				
		?>
		<div class="wpr_search">
			 <?php get_search_form( ); ?> 
		</div>
		<?php endif; ?>				
		<ul id="wpresmenu_menu_ul">
		<?php	
			$menu_name_value=get_option('menu_name');
			$menus = get_terms('nav_menu',array('hide_empty'=>false));					 
			if($menus) : foreach($menus as $m) :
			if($m->term_id == $menu_name_value) $menu = $m;
			endforeach; endif	;	
			if(is_object($menu)): 							
			wp_nav_menu( array('menu'=>$menu->name,'container'=>false,'items_wrap'=>'%3$s'));
			endif;
		?>
		</ul>
		<?php if($search_position_value == 'below_menu') : ?>				
		<div class="wpr_search">
			 <?php get_search_form( ); ?> 
		</div>
		<?php endif; ?>				
	</div>			
<?php	
}
function wpresmenu_header_styles() {
?>
	<style type="text/css">
		/* For Menu Breakpoint and Hide to Menu	*/
		<?php
			$menu_breakpoint_value = get_option('menu_breakpoint');
			$menu_hide = get_option('menu_hide');
		?>					
		@media (max-width: <?php echo $menu_breakpoint_value."px"; ?> ) {
		  #wpresmenu_bar {
				display:block;   	
		  	}
		  	<?php echo $menu_hide ?>
		  	{
		  		display:none; 	
		  	}				  	
		}
		
		/* For Menu Bar*/
		#wpresmenu_bar
		{
			background-color:<?php echo get_option(bar_bg) ?> !important; 	
		}
		
		#wpresmenu_menu.left, #wpresmenu_menu.right
		{
			background-color:<?php echo get_option(menu_bg) ?> !important; 	
		}
		
		#wpresmenu_menu.wpresmenu_levels ul li a:hover {
    		background-color:<?php echo get_option(menu_hover_bg) ?> !important;
		}
		
		#wpresmenu_bar .menu_title{
    		color:<?php echo get_option(menu_title_color) ?> !important;
		}
		
		#wpresmenu_menu ul li a{
    		color:<?php echo get_option(menu_link_color) ?> !important;
		}
		
		#wpresmenu_menu ul li a:hover{
    		color:<?php echo get_option(menu_linkhover_color) ?> !important;
		}
		
		#wpresmenu_menu .wpresmenu_icon:before, #wpresmenu_bar [data-icon]:before
		{
			color: <?php echo get_option(submenu_arrow_color) ?> !important;	
		}
		
	</style>
<?php } ?>
