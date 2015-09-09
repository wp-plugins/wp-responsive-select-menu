
<div class="wrapper">
	<h2><?php _e( 'WP Responsive Select Menu', 'responsive-menu' ) ?></h2>
	<div class="wrap">
		<?php
			if(isset($_POST['submit'])) 
			{
				
				$menu_title=$_POST['menu_title'];
				update_option('menu_title', $menu_title);
				
				$menu_name=$_POST['menu_name'];
				update_option('menu_name', $menu_name);
				
				$slide_side=$_POST['slide_side'];
				update_option('slide_side', $slide_side);
				
				$search_position=$_POST['search_position'];
				update_option('search_position', $search_position );
				
				$menu_breakpoint=$_POST['menu_breakpoint'];
				update_option('menu_breakpoint', $menu_breakpoint );
				
				$menu_breakpoint=$_POST['menu_breakpoint'];
				update_option('menu_breakpoint', $menu_breakpoint );
				
				$menu_hide=$_POST['menu_hide'];
				update_option('menu_hide', $menu_hide );
				
				$bar_bg=$_POST['bar_bg'];
				update_option('bar_bg', $bar_bg );
				
				$menu_bg=$_POST['menu_bg'];
				update_option('menu_bg', $menu_bg );
				
				$menu_hover_bg=$_POST['menu_hover_bg'];
				update_option('menu_hover_bg', $menu_hover_bg );
				
				$menu_title_color=$_POST['menu_title_color'];
				update_option('menu_title_color', $menu_title_color );
				
				$menu_link_color=$_POST['menu_link_color'];
				update_option('menu_link_color', $menu_link_color );
				
				$menu_linkhover_color=$_POST['menu_linkhover_color'];
				update_option('menu_linkhover_color', $menu_linkhover_color );
				
				$submenu_arrow_color=$_POST['submenu_arrow_color'];
				update_option('submenu_arrow_color', $submenu_arrow_color );
				?>				
					<div id="message" class="updated below-h2 cookieBannerSuccess">
						<p>You have successfully updated the Responsive Menu options</p>
					</div>
				<?php
			}			
		?>
		<div class="inner_wrap">
		<div class="left">		
		<form action="" method="post">
			<div class="wpresmenu_form">
				<h3><?php _e( 'General Setting', 'responsive-menu' ) ?></h3>
				<table>
					<tr>
						<td><h3><?php _e( 'Menu Title', 'responsive-menu' ) ?></h3></td>
						<td><input type="text" name="menu_title" value="<?php echo get_option('menu_title'); ?>" > 	
						<span class="hint"><?php _e( 'Write menu title name to show on top menu bar', 'responsive-menu' ) ?></span></td>				
					</tr>					
               <tr>
						<td><h3><?php _e( 'Select Menu', 'responsive-menu' ) ?></h3></td>                    
               	<td> 	
	               	<select class="menu-class" name="menu_name">
								<?php $menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) );
										foreach ( $menus as $menu ):
										$menu_menu=ucwords($menu->name);
										?>																			
	  									<option value="<?php echo $menu->term_id ?>" <?php echo (get_option('menu_name') == $menu->term_id ? 'selected' : ''); ?>><?php echo $menu_menu ?></option>	
	  							<?php endforeach; ?>								
							</select><span class="hint"><?php _e( 'Select a menu do you want to show in mobile window', 'responsive-menu' ) ?> 
						</td>
              	</tr>
              	<tr>
						<td><h3><?php _e( 'Slide Side', 'responsive-menu' ) ?></h3></td>	
						<td>
						<select name="slide_side">
							<option value="left" <?php echo (get_option('slide_side') == 'left' ? 'selected' : ''); ?>>Left</option>
							<option value="right" <?php echo (get_option('slide_side') == 'right' ? 'selected' : ''); ?> >Right</option>
						</select>	
						<span class="hint"><?php _e( 'This is the side of the screen from which the menu will slide', 'responsive-menu' ) ?></span></td>				
					</tr>	
              	<tr>
						<td><h3><?php _e( 'Search Box Position', 'responsive-menu' ) ?></td>
						<td>
							<input type="radio" name="search_position" value="above_menu" <?php echo (get_option('search_position') == 'above_menu' ? 'checked' : ''); ?> > Above Menu
							<input type="radio" name="search_position" value="below_menu" <?php echo (get_option('search_position') == 'below_menu' ? 'checked' : ''); ?> > Below Menu
							<input type="radio" name="search_position" value="hidden" <?php echo (get_option('search_position') == 'hidden' ? 'checked' : ''); ?> > Hidden						
						</td>              	
              	</tr>              	
              	<tr>
						<td><h3><?php _e( 'Menu Breakpoint', 'responsive-menu' ) ?></h3></td>
						<td><input type="text" name="menu_breakpoint" value="<?php echo get_option('menu_breakpoint'); ?>" > 	
						<span class="hint"><?php _e( 'This is the point where the responsive menu will be visible in px width of the browser', 'responsive-menu' ) ?></span></td>				
					</tr>
					<tr>
						<td><h3><?php _e( 'Menu to Hide', 'responsive-menu' ) ?></h3></td>
						<td><input type="text" name="menu_hide" value="<?php echo get_option('menu_hide'); ?>" > 	
						<span class="hint"><?php _e( 'This is the menu block id you want to hide once the responsive menu shows - e.g #primary-nav, .menu', 'responsive-menu' ) ?></span></td>				
					</tr>
					<tr>
						<td><h3><?php _e( 'Menu bar Background Color', 'responsive-menu' ) ?></h3></td>	
						<td><input type="text" class="bsc_color" name="bar_bg" data-default-color="#effeff" value="<?php echo get_option('bar_bg'); ?>" /> 	
						<span class="hint"><?php _e( 'This is background color to the top menu bar that contains title name', 'responsive-menu' ) ?></span></td>				
					</tr>
					<script type="text/javascript" >
						jQuery(document).ready(function($){
					    $('.bsc_color').wpColorPicker();    
						});
					</script>
					<tr>
						<td><h3><?php _e( 'Menu Background Color', 'responsive-menu' ) ?></h3></td>	
						<td><input type="text" class="bsc_color" name="menu_bg" data-default-color="#effeff" value="<?php echo get_option('menu_bg'); ?>" /> 	
						<span class="hint"><?php _e( 'This is the background colour of the expanded menu', 'responsive-menu' ) ?></span></td>				
					</tr>
					<tr>
						<td><h3><?php _e( 'Menu Background Hover Color', 'responsive-menu' ) ?></h3></td>	
						<td><input type="text" class="bsc_color" name="menu_hover_bg" data-default-color="#effeff" value="<?php echo get_option('menu_hover_bg'); ?>" /> 	
						<span class="hint"><?php _e( 'This is the hover background colour of the expanded menu', 'responsive-menu' ) ?></span></td>				
					</tr>
					<tr>
						<td><h3><?php _e( 'Menu Title Color', 'responsive-menu' ) ?></h3></td>	
						<td><input type="text" class="bsc_color" name="menu_title_color" data-default-color="#effeff" value="<?php echo get_option('menu_title_color'); ?>" /> 	
						<span class="hint"><?php _e( 'This is colour of the menu title on top bar', 'responsive-menu' ) ?></span></td>				
					</tr>
					<tr>
						<td><h3><?php _e( 'Menu Link Color', 'responsive-menu' ) ?></h3></td>	
						<td><input type="text" class="bsc_color" name="menu_link_color" data-default-color="#effeff" value="<?php echo get_option('menu_link_color'); ?>" /> 	
						<span class="hint"><?php _e( 'This is the text colour of the menu links', 'responsive-menu' ) ?></span></td>				
					</tr>
					<tr>
						<td><h3><?php _e( 'Menu Link Hover Color', 'responsive-menu' ) ?></h3></td>	
						<td><input type="text" class="bsc_color" name="menu_linkhover_color" data-default-color="#effeff" value="<?php echo get_option('menu_linkhover_color'); ?>" /> 	
						<span class="hint"><?php _e( 'This is the text hover colour of the menu links', 'responsive-menu' ) ?></span></td>				
					</tr>
					<tr>
						<td><h3><?php _e( 'Submenu Arrow Color', 'responsive-menu' ) ?></h3></td>	
						<td><input type="text" class="bsc_color" name="submenu_arrow_color" data-default-color="#effeff" value="<?php echo get_option('submenu_arrow_color'); ?>" /> 	
						<span class="hint"><?php _e( 'This is the arrow colour of the menu that has submenu', 'responsive-menu' ) ?></span></td>				
					</tr>					
					<tr>
						<td></td> 
						<td>
							<input type="submit" name="submit" value="Saved"> 						
						</td>             	
              	</tr>
            </table>  				
			</div>
		</form>
		</div>
		<div class="right">
		 <center>
<div class="bottom">
		    <h3 id="download-comments-wvpd" class="title"><?php _e( 'Download Free Plugins', 'wvpd' ); ?></h3>
		     
     <div id="downloadtbl-comments-wvpd" class="togglediv">  
	<h3 class="company">
<p> Vivacity InfoTech Pvt. Ltd. is an ISO 9001:2008 Certified Company is a Global IT Services company with expertise in outsourced product development and custom software development with focusing on software development, IT consulting, customized development.We have 200+ satisfied clients worldwide.</p>	
<?php _e( 'Our Top 5 Latest Plugins', 'wvpd' ); ?>:
</h3>
<ul class="">
<li><a target="_blank" href="https://wordpress.org/plugins/woocommerce-social-buttons/">Woocommerce Social Buttons</a></li>
<li><a target="_blank" href="https://wordpress.org/plugins/vi-random-posts-widget/">Vi Random Post Widget</a></li>
<li><a target="_blank" href="http://wordpress.org/plugins/wp-infinite-scroll-posts/">WP EasyScroll Posts</a></li>
<li><a target="_blank" href="https://wordpress.org/plugins/buddypress-social-icons/">BuddyPress Social Icons</a></li>
<li><a target="_blank" href="http://wordpress.org/plugins/wp-fb-share-like-button/">WP Facebook Like Button</a></li>
</ul>
  </div> 
</div>		
<div class="bottom">
		    <h3 id="donatehere-comments-wvpd" class="title"><?php _e( 'Donate Here', 'wvpd' ); ?></h3>
     <div id="donateheretbl-comments-wvpd" class="togglediv">  
     <p><?php _e( 'If you want to donate , please click on below image.', 'wvpd' ); ?></p>
	<a href="http://bit.ly/1icl56K" target="_blank"><img class="donate" src="<?php echo plugins_url( 'assets/paypal.gif' , __FILE__ ); ?>" width="150" height="50" title="<?php _e( 'Donate Here', 'wvpd' ); ?>"></a>		
  </div> 
</div>	
<div class="bottom">
		    <h3 id="donatehere-comments-wvpd" class="title"><?php _e( 'Woocommerce Frontend Plugin', 'wvpd' ); ?></h3>
     <div id="donateheretbl-comments-wvpd" class="togglediv">  
     <p><?php _e( 'If you want to purchase , please click on below image.', 'wvpd' ); ?></p>
	<a href="http://bit.ly/1HZGRBg" target="_blank"><img class="donate" src="<?php echo plugins_url( 'assets/woo_frontend_banner.png' , __FILE__ ); ?>" width="336" height="280" title="<?php _e( 'Donate Here', 'wvpd' ); ?>"></a>		
  </div> 
</div>
<div class="bottom">
		    <h3 id="donatehere-comments-wvpd" class="title"><?php _e( 'Blue Frog Template', 'wvpd' ); ?></h3>
     <div id="donateheretbl-comments-wvpd" class="togglediv">  
     <p><?php _e( 'If you want to purchase , please click on below image.', 'wvpd' ); ?></p>
	<a href="http://bit.ly/1Gwp4Vv" target="_blank"><img class="donate" src="<?php echo plugins_url( 'assets/blue_frog_banner.png' , __FILE__ ); ?>" width="336" height="280" title="<?php _e( 'Donate Here', 'wvpd' ); ?>"></a>		
  </div> 
</div>
	</center>
</div> <!-- --------End of right div---------- -->
</div> <!-- --------End of inner_wrap--------- -->
</div> <!-- ---------End of wrap-------------- -->
<script type="text/javascript" >
jQuery(document).ready(function($){
    //alert('Hello World!');
  jQuery("#donatehere-comments-wvpd").click(function(){
      jQuery("#donateheretbl-comments-wvpd").animate({
        height:'toggle'
      });
  }); 
   jQuery("#download-comments-wvpd").click(function(){
      jQuery("#downloadtbl-comments-wvpd").animate({
        height:'toggle'
      });
  }); 
  jQuery("#aboutauthor-comments-wvpd").click(function(){
      jQuery("#aboutauthortbl-comments-wvpd").animate({
        height:'toggle'
      });
  });
 
});

</script>

		</div>
 