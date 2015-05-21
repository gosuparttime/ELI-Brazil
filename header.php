<!doctype html>

<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!-->
<html <?php language_attributes(); ?> class="no-js">
<!--<![endif]-->

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>
<?php if ( !is_front_page() ) { echo wp_title( ' ', true, 'left' ); echo ' | '; }
			echo bloginfo( 'name' ); echo ' - '; bloginfo( 'description', 'display' );  ?>
</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="google-translate-customization" content="8908d89d217d0b1-5e051bb0060efb62-gb63efd28e75e814a-b">
</meta>
<!-- icons & favicons -->
<!-- For iPhone 4 -->
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/h/apple-touch-icon.png">
<!-- For iPad 1-->
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/m/apple-touch-icon.png">
<!-- For iPhone 3G, iPod Touch and Android -->
<link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/l/apple-touch-icon-precomposed.png">
<!-- For Nokia -->
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/l/apple-touch-icon.png">
<!-- For everything else -->
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">

<!-- media-queries.js (fallback) -->
<!--[if lt IE 9]>
			<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>			
		<![endif]-->

<!-- html5.js -->
<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

<!-- wordpress head functions -->
<?php wp_head(); ?>
<!--[if lt IE 9]>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/library/css/dumbo.css">
<![endif]>
<!--[if lt IE 9]>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/library/css/font-awesome-ie7.css">
<![endif]-->

</head>

<body role="window" id="page">
<div id="fb-root"></div>
<!--[if lt IE 8]><div class="alert"><button type="button" class="close" data-dismiss="alert">×</button>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</div><![endif]-->
<a href="#content" tabindex="1" class="off-screen">skip navigation</a>
<div id="university" class="container" role="banner">
  <div class="row-fluid">
    <div class="span4 pad-two-tb hidden-phone"><a href="http://www.syr.edu/"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/SU-logo.png" alt="Syracuse University" />
      <h2 class="hide notranslate">Syracuse University</h2>
      </a></div>
    <div class="span8">
      <nav class="pull-right hidden-phone" role="navigation">
        <?php utility_nav(); ?>
      </nav>
      <div class="phone-half visible-phone pad-one"><a href="http://www.syr.edu/"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/SU-logo.png" alt="Syracuse University" />
      <h2 class="hide notranslate">Syracuse University</h2>
      </a></div>
    </div>
  </div>
</div>
<div id="wrapper" class="white">
<header role="banner" id="top-header">
  <div id="inner-header" class="container">
    <div class="row-fluid">
      <div class="span6">
        <div class="siteinfo"> <a class="brand" id="logo" href="<?php echo get_bloginfo('url'); ?>"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/ELI-logo.png" alt="<?php bloginfo( 'name' ); ?>" />
          <h1 class="hide notranslate">
            <?php bloginfo('name'); ?>
          </h1>
          </a> </div>
      </div>
    </div>
  </div>
  <!-- end #inner-header -->
</header>

<!-- end header -->

<div class="container">

