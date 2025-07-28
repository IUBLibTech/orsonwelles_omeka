<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=yes" />
    <?php if ( $description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>
    <?php
    if (isset($title)) {
        $titleParts[] = strip_formatting($title);
    }
    $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>

    <?php echo auto_discovery_link_tags(); ?>

    <!-- Plugin Stuff -->

    <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>


    <!-- IU Branding -->
    <?php
    queue_css_url('https://fonts.googleapis.com/css?family=Slabo+13px|Slabo+27px');
    queue_css_url('https://fonts.iu.edu/style.css?family=BentonSans:regular,bold,black|BentonSansCond:regular|GeorgiaPro:regular');
	queue_css_url('https://assets.iu.edu/brand/3.x/brand.css');
	queue_css_url('https://assets.iu.edu/search/3.x/search.css');
	queue_css_url('https://assets.iu.edu/web/3.x/css/iu-framework.min.css');
    ?>

	<!-- Stylesheets -->
    <?php
	queue_css_file('style');
	queue_css_file('style_overrides');
    echo head_css();
    ?>
	
	<!-- Javascripts -->
    <?php
	queue_js_url('//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js');
    queue_js_url('//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js');
    queue_js_file('vendor/modernizr');
    queue_js_file('vendor/selectivizr', 'javascripts', array('conditional' => '(gte IE 6)&(lte IE 8)'));
    queue_js_file('vendor/respond');
    queue_js_file('vendor/jquery-accessibleMegaMenu');
    queue_js_file('globals');
    queue_js_file('default');
    queue_js_file('script');
	queue_js_file('script_overrides');
	echo head_js();
	?>
	
	
    <?php
	// Reconciled to here 

    echo theme_header_background();
    ?>

    <?php
    ($backgroundColor = get_theme_option('background_color')) || ($backgroundColor = "#FFFFFF");
    ($textColor = get_theme_option('text_color')) || ($textColor = "#444444");
    ($linkColor = get_theme_option('link_color')) || ($linkColor = "#888888");
    ($buttonColor = get_theme_option('button_color')) || ($buttonColor = "#000000");
    ($buttonTextColor = get_theme_option('button_text_color')) || ($buttonTextColor = "#FFFFFF");
    ($titleColor = get_theme_option('header_title_color')) || ($titleColor = "#000000");
    ?>
</head>
<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
   <div id="divEverything">
    <a href="#content" id="skipnav"><?php echo __('Skip to main content'); ?></a>
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>

        <header role="banner" class="main-banner">

			<div id="divSiteTitle" class="row"><h1 class="site-title-block"><?php echo link_to_home_page(theme_logo()); ?></h1></div>
			
			<div class="hamburger-icon">
				<a href="#" class="button" title="Inline button">Menu</a>
			</div>

			<div id="primary-nav-wrapper" class="row">
				<div id="primary-nav" role="navigation" class="row">
					<?php echo public_nav_main()->setUlClass('primary-nav'); ?>
					<div id="search-container" role="search">
						<?php echo search_form(array('submit_value' => 'SEARCH')); ?>
					</div>
				</div>
			</div>
       
        </header>
                <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
