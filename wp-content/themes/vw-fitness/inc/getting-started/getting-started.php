<?php
//about theme info
add_action( 'admin_menu', 'vw_fitness_gettingstarted' );
function vw_fitness_gettingstarted() {
	add_theme_page( esc_html__('About VW Fitness Theme', 'vw-fitness'), esc_html__('About VW Fitness Theme', 'vw-fitness'), 'edit_theme_options', 'vw_fitness_guide', 'vw_fitness_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function vw_fitness_admin_theme_style() {
   wp_enqueue_style('vw-fitness-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getting-started/getting-started.css');
   wp_enqueue_script('vw-fitness-tabs', esc_url(get_template_directory_uri()) . '/inc/getting-started/js/tab.js');
}
add_action('admin_enqueue_scripts', 'vw_fitness_admin_theme_style');

//guidline for about theme
function vw_fitness_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'vw-fitness' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to VW Fitness Theme', 'vw-fitness' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','vw-fitness'); ?></p>
    </div>
    <div class="col-right">
    	<div class="logo">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/final-logo.png" alt="" />
		</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy VW Fitness at 20% Discount','vw-fitness'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','vw-fitness'); ?> ( <span><?php esc_html_e('vwpro20','vw-fitness'); ?></span> ) </h4> 
			<div class="info-link">
				<a href="<?php echo esc_url( VW_FITNESS_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'vw-fitness' ); ?></a>
			</div>
		</div>
    </div>

    <div class="tab-sec">
		<div class="tab">
			<button class="tablinks" onclick="vw_fitness_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'vw-fitness' ); ?></button>
			<button class="tablinks" onclick="vw_fitness_open_tab(event, 'block_pattern')"><?php esc_html_e( 'Setup With Block Pattern', 'vw-fitness' ); ?></button>
			<button class="tablinks" onclick="vw_fitness_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'vw-fitness' ); ?></button>
			<button class="tablinks" onclick="vw_fitness_open_tab(event, 'product_addons_editor')"><?php esc_html_e( 'Woocommerce Product Addons', 'vw-fitness' ); ?></button>
			<button class="tablinks" onclick="vw_fitness_open_tab(event, 'pro_theme')"><?php esc_html_e( 'Get Premium', 'vw-fitness' ); ?></button>
			<button class="tablinks" onclick="vw_fitness_open_tab(event, 'free_pro')"><?php esc_html_e( 'Support', 'vw-fitness' ); ?></button>
		</div>

		<?php
			$vw_fitness_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$vw_fitness_plugin_custom_css ='display: block';
			}
		?>
		<div id="lite_theme" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = VW_Fitness_Plugin_Activation_Settings::get_instance();
				$vw_fitness_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-fitness-recommended-plugins">
				    <div class="vw-fitness-action-list">
				        <?php if ($vw_fitness_actions): foreach ($vw_fitness_actions as $key => $vw_fitness_actionValue): ?>
				                <div class="vw-fitness-action" id="<?php echo esc_attr($vw_fitness_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_fitness_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_fitness_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_fitness_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','vw-fitness'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($vw_fitness_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'vw-fitness' ); ?></h3>
				<hr class="h3hr">
			  	<p><?php esc_html_e('VW Fitness is a Free Responsive Multipurpose WordPress Theme for personal trainer, fitness trainers, yoga trainers, weight loss enthusiasts, gyms, fitness studios, weights, boxing, sports, aerobics, workout, lifestyle, wellness, spa, beautiplus, physiotherapy, health club, cardio consultancy, portfolio and other local businesses. It has lots of features that help in making user-friendly, highly interactive and stunning websites. Some of its features include a banner section, testimonial section, Appointment form section, Call to Action Button (CTA), and social media. The theme is built on Bootstrap and it allows you to create a strong website with the provided personalization options. It has a secure and clean code and is optimized for faster page load time. Powerful shortcodes expands what you can do with your pages and posts. Furthermore, it is SEO friendly with optimized codes making your site rank high on Google and other search engines. It instantly gives a professional look to your online existence. Display breathtaking images of your team and the muscular achievers to inspire others. Start creating ideal website with this beautiful Fitness WordPress Theme right now. ','vw-fitness'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'vw-fitness' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'vw-fitness' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_FITNESS_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'vw-fitness' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'vw-fitness'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'vw-fitness'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'vw-fitness'); ?></a>
					</div>
					<hr>				
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'vw-fitness'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'vw-fitness'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_FITNESS_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'vw-fitness'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'vw-fitness'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'vw-fitness'); ?>  </p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_FITNESS_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'vw-fitness'); ?></a>
					</div>
					<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-fitness' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-fitness'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-admin-customizer"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=vw_fitness_typography') ); ?>" target="_blank"><?php esc_html_e('Typography','vw-fitness'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_fitness_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Settings','vw-fitness'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_fitness_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-fitness'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-editor-table"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_fitness_our_services') ); ?>" target="_blank"><?php esc_html_e('Service Section','vw-fitness'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-fitness'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_fitness_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-fitness'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_fitness_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-fitness'); ?></a>
								</div> 
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-fitness'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_fitness_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-fitness'); ?></a>
								</div>
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','vw-fitness'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','vw-fitness'); ?></p>
	                <ul>
	                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','vw-fitness'); ?></span><?php esc_html_e(' Go to ','vw-fitness'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','vw-fitness'); ?></b></p>

	                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','vw-fitness'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/home-page-template.png" alt="" />
	                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','vw-fitness'); ?></span><?php esc_html_e(' Go to ','vw-fitness'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','vw-fitness'); ?></b></p>
					  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','vw-fitness'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/set-front-page.png" alt="" />
	                  	<p><?php esc_html_e(' Once you are done with this, then follow the','vw-fitness'); ?> <a class="doc-links" href="https://www.vwthemesdemo.com/docs/free-vw-fitness/" target="_blank"><?php esc_html_e('Documentation','vw-fitness'); ?></a></p>
	                </ul>
			  	</div>
			</div>
		</div>

		<div id="block_pattern" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = VW_Fitness_Plugin_Activation_Settings::get_instance();
			$vw_fitness_actions = $plugin_ins->recommended_actions;
			?>
				<div class="vw-fitness-recommended-plugins">
				    <div class="vw-fitness-action-list">
				        <?php if ($vw_fitness_actions): foreach ($vw_fitness_actions as $key => $vw_fitness_actionValue): ?>
				                <div class="vw-fitness-action" id="<?php echo esc_attr($vw_fitness_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_fitness_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_fitness_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_fitness_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" href="javascript:void(0);" get-start-tab-id="gutenberg-editor-tab"><?php esc_html_e('Skip','vw-fitness'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="gutenberg-editor-tab" style="<?php echo esc_attr($vw_fitness_plugin_custom_css); ?>">
				<div class="block-pattern-img">
				  	<h3><?php esc_html_e( 'Block Patterns', 'vw-fitness' ); ?></h3>
					<hr class="h3hr">
					<p><?php esc_html_e('Follow the below instructions to setup Home page with Block Patterns.','vw-fitness'); ?></p>
	              	<p><b><?php esc_html_e('Click on Below Add new page button >> Click on "+" Icon >> Click Pattern Tab >> Click on homepage sections >> Publish.','vw-fitness'); ?></span></b></p>
	              	<div class="vw-fitness-pattern-page">
				    	<a href="javascript:void(0)" class="vw-pattern-page-btn button-primary button"><?php esc_html_e('Add New Page','vw-fitness'); ?></a>
				    </div>
	              	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/block-pattern.png" alt="" />	
	            </div>

	            <div class="block-pattern-link-customizer">
	              	<div class="link-customizer-with-block-pattern">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-fitness' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-fitness'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-networking"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_fitness_social_icon_settings') ); ?>" target="_blank"><?php esc_html_e('Social Icons','vw-fitness'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-fitness'); ?></a>
								</div>
								
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_fitness_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-fitness'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_fitness_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-fitness'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_fitness_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-fitness'); ?></a>
								</div> 
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_fitness_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-fitness'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-fitness'); ?></a>
								</div> 
							</div>
						</div>
					</div>	
				</div>				
	        </div>
		</div>

		<div id="gutenberg_editor" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = VW_Fitness_Plugin_Activation_Settings::get_instance();
			$vw_fitness_actions = $plugin_ins->recommended_actions;
			?>
				<div class="vw-fitness-recommended-plugins">
				    <div class="vw-fitness-action-list">
				        <?php if ($vw_fitness_actions): foreach ($vw_fitness_actions as $key => $vw_fitness_actionValue): ?>
				                <div class="vw-fitness-action" id="<?php echo esc_attr($vw_fitness_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($vw_fitness_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_fitness_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_fitness_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'vw-fitness' ); ?></h3>
				<hr class="h3hr">
				<div class="vw-fitness-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','vw-fitness'); ?></a>
			   </div>

			   <div class="link-customizer-with-guternberg-ibtana">
					<h3><?php esc_html_e( 'Link to customizer', 'vw-fitness' ); ?></h3>
					<hr class="h3hr">
					<div class="first-row">
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-fitness'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-networking"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_fitness_social_icon_settings') ); ?>" target="_blank"><?php esc_html_e('Social Icons','vw-fitness'); ?></a>
							</div>
						</div>
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-fitness'); ?></a>
							</div>
							
							<div class="row-box2">
								<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_fitness_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-fitness'); ?></a>
							</div>
						</div>

						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_fitness_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-fitness'); ?></a>
							</div>
							 <div class="row-box2">
								<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_fitness_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','vw-fitness'); ?></a>
							</div> 
						</div>
						
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_fitness_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-fitness'); ?></a>
							</div>
							 <div class="row-box2">
								<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-fitness'); ?></a>
							</div> 
						</div>
					</div>
				</div>
			<?php } ?>
		</div>

		<div id="product_addons_editor" class="tabcontent">
			<?php if(!class_exists('IEPA_Loader')){
				$plugin_ins = VW_Fitness_Plugin_Activation_Woo_Products::get_instance();
				$vw_fitness_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-fitness-recommended-plugins">
					    <div class="vw-fitness-action-list">
					        <?php if ($vw_fitness_actions): foreach ($vw_fitness_actions as $key => $vw_fitness_actionValue): ?>
					                <div class="vw-fitness-action" id="<?php echo esc_attr($vw_fitness_actionValue['id']);?>">
				                        <div class="action-inner plugin-activation-redirect">
				                            <h3 class="action-title"><?php echo esc_html($vw_fitness_actionValue['title']); ?></h3>
				                            <div class="action-desc"><?php echo esc_html($vw_fitness_actionValue['desc']); ?></div>
				                            <?php echo wp_kses_post($vw_fitness_actionValue['link']); ?>
				                        </div>
					                </div>
					            <?php endforeach;
					        endif; ?>
					    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Woocommerce Products Blocks', 'vw-fitness' ); ?></h3>
				<hr class="h3hr">
				<div class="vw-fitness-pattern-page">
					<p><?php esc_html_e('Follow the below instructions to setup Products Templates.','vw-fitness'); ?></p>
					<p><b><?php esc_html_e('1. First you need to activate these plugins','vw-fitness'); ?></b></p>
						<p><?php esc_html_e('1. Ibtana - WordPress Website Builder ','vw-fitness'); ?></p>
						<p><?php esc_html_e('2. Ibtana - Ecommerce Product Addons.','vw-fitness'); ?></p>
						<p><?php esc_html_e('3. Woocommerce','vw-fitness'); ?></p>

					<p><b><?php esc_html_e('2. Go To Dashboard >> Ibtana Settings >> Woocommerce Templates','vw-fitness'); ?></span></b></p>
	              	<div class="vw-fitness-pattern-page">
			    		<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-woocommerce-templates&ive_wizard_view=parent' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Woocommerce Templates','vw-fitness'); ?></a>
			    	</div>
	              	<p><?php esc_html_e('You can create a template as you like.','vw-fitness'); ?></span></p>
			    </div>
			<?php } ?>
		</div>

		<div id="pro_theme" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'vw-fitness' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('This Premium Fitness WordPress theme is a fitting choice for the people belonging to the fitness world. This premium fitness theme is a reflection of the kind of life fitness fanatics lead. We know that staying fit and healthy is not just a way of life for you, its an obsession. We understand the obsession, we have our very own but for us, it has to do with making & serving themes.We earn our bread by the means of satisfying our customers with our top fitness WordPress theme. This is why? not a single customer of ours has ever walked away with a theme that could not satisfy them.','vw-fitness'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( VW_FITNESS_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'vw-fitness'); ?></a>
					<a href="<?php echo esc_url( VW_FITNESS_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'vw-fitness'); ?></a>
					<a href="<?php echo esc_url( VW_FITNESS_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'vw-fitness'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/vw-fitness-theme.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'vw-fitness' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'vw-fitness'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'vw-fitness'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'vw-fitness'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'vw-fitness'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'vw-fitness'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'vw-fitness'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'vw-fitness'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'vw-fitness'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'vw-fitness'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'vw-fitness'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'vw-fitness'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'vw-fitness'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'vw-fitness'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'vw-fitness'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-fitness'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-fitness'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'vw-fitness'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'vw-fitness'); ?></td>
								<td class="table-img"><?php esc_html_e('11', 'vw-fitness'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'vw-fitness'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'vw-fitness'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'vw-fitness'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'vw-fitness'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'vw-fitness'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'vw-fitness'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'vw-fitness'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'vw-fitness'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'vw-fitness'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'vw-fitness'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'vw-fitness'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'vw-fitness'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'vw-fitness'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'vw-fitness'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'vw-fitness'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'vw-fitness'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'vw-fitness'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'vw-fitness'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'vw-fitness'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'vw-fitness'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'vw-fitness'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'vw-fitness'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'vw-fitness'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'vw-fitness'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'vw-fitness'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'vw-fitness'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'vw-fitness'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'vw-fitness'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'vw-fitness'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'vw-fitness'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'vw-fitness'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( VW_FITNESS_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'vw-fitness'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'vw-fitness'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'vw-fitness'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_FITNESS_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'vw-fitness'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'vw-fitness'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'vw-fitness'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_FITNESS_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'vw-fitness'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">		  		
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'vw-fitness'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'vw-fitness'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_FITNESS_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'vw-fitness'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'vw-fitness'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'vw-fitness'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_FITNESS_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','vw-fitness'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'vw-fitness'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'vw-fitness'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_FITNESS_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'vw-fitness'); ?></a>
				</div>
		  	</div>
		</div>
	</div>
</div>
<?php } ?>