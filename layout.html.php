<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo head_contents();?>
    <title><?php echo $title;?></title>
    <meta name="description" content="<?php echo $description; ?>"/>
    <link rel="canonical" href="<?php echo $canonical; ?>" />
    <link rel="stylesheet" href="<?php echo site_url();?>themes/independent-publisher/css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo site_url();?>themes/independent-publisher/fonts/genericons/genericons.css" type="text/css" media="all" />
<?php     
    if (isset($_GET['search'])) {
        $search = _h($_GET['search']);
        $url = site_url() . 'search/' . remove_accent($search);
        header("Location: $url");
    }
?>
</head>
<body class="blog hfeed h-feed enhanced-excerpts archive">
<?php if (facebook()) { echo facebook(); } ?>
<?php if (login()) { toolbar(); } ?>
<style>.entry-meta a, .entry-title-meta a {font-family: "Myriad Pro", "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Geneva, Verdana, sans-serif;}</style>
<div id="page" class="site">
	<header id="masthead" class="site-header" role="banner">

		<div class="site-header-info">
			<?php if(is_index()) { ?>
			<h1 style="margin:0;font-size:2.5em;">
				<a class="site-logo" href="<?php echo site_url();?>" title="<?php echo blog_title();?>" rel="home">
					<img class="no-grav" src="<?php echo site_url();?>themes/independent-publisher/img/avatar.png" height="100" width="100" alt="<?php echo blog_title();?>" />
				</a>
			</h1>
			<?php } else {?>
			<h2 style="margin:0;font-size:2.5em;">
				<a class="site-logo" href="<?php echo site_url();?>" title="<?php echo blog_title();?>" rel="home">
					<img class="no-grav" src="<?php echo site_url();?>themes/independent-publisher/img/avatar.png" height="100" width="100" alt="<?php echo blog_title();?>" />
				</a>
			</h2>			
			<?php } ?>
			<div class="site-title">
				<a href="<?php echo site_url();?>" title="<?php echo blog_title();?>"><?php echo blog_title();?></a>
			</div>
			<div class="site-description"><?php echo blog_tagline();?></div>
			<div id="menu-social" class="menu">
				<ul id="menu-social-items" class="menu-items">
					<?php if(!empty(config('social.twitter'))):?>
					<li class="menu-item">
						<a href="<?php echo config('social.twitter');?>">
						<span class="screen-reader-text">Twitter</span>
						</a>
					</li>
					<?php endif;?>
					<?php if(!empty(config('social.facebook'))):?>
					<li class="menu-item">
						<a href="<?php echo config('social.facebook');?>">
						<span class="screen-reader-text">Facebook</span>
						</a>
					</li>
					<?php endif;?>
					<li class="menu-item">
						<a href="<?php echo site_url();?>feed/rss">
						<span class="screen-reader-text">RSS</span>
						</a>
					</li>
				</ul>
			</div>
		</div>

		<nav role="navigation" class="site-navigation main-navigation">
			<a class="screen-reader-text skip-link" href="#content" title="Skip to content">Skip to content</a>

			<div class="menu-primary-container">
				<?php echo menu('primary-menu');?>
			</div>				
		</nav><!-- .site-navigation .main-navigation -->
		
	</header>
	<!-- #masthead .site-header -->

	<div id="main" class="site-main">

		<div id="primary" class="content-area">
			<main id="content" class="site-content" role="main">
				<?php echo content();?>
			</main>
			<!-- #content .site-content -->
		</div><!-- #primary .content-area -->

		<div id="secondary" class="widget-area" role="complementary">
			
			<?php if (!isset($is_front)):?>
			<aside id="recent-posts" class="widget">
				<h3 class="widget-title">Recent Posts</h3>
				<?php echo recent_posts();?>
			</aside>
			<?php endif;?>

			<aside id="categories" class="widget">
				<h3 class="widget-title">Categories</h3>
				<?php echo category_list();?>
			</aside>
			
			<aside id="tags-cloud" class="widget">
				<h3 class="widget-title">Tags</h3>
				<div class="tagcloud">
				<?php echo tag_cloud();?>
				</div>
			</aside>
			
			<aside id="archives" class="widget">
				<h3 class="widget-title">Archives</h3>
				<?php $data = archive_list(true);
				foreach ($data as $year => $month) {
					echo ' <a href="' . site_url() . 'archive/' . $year . '">' . $year . '</a> <span style="color: #b3b3b1;"> | </span>';
				}
				?>
			</aside>

			</div><!-- #secondary .widget-area -->

	</div><!-- #main .site-main -->

	<footer id="colophon" class="site-footer">
		<style>.site-info p {display:inline;margin-right:5px;}</style>
		<div class="site-info"><?php echo copyright();?><br><p>Designed by <a rel="nofollow" target="_blank" href="https://independentpublisher.me/">Independent Publisher</a></p></div>
		<!-- .site-info -->
	</footer><!-- #colophon .site-footer -->
    <?php if (analytics()): ?><?php echo analytics() ?><?php endif; ?>
</div><!-- #page .hfeed .site -->
</body>
</html>
