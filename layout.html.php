<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<!DOCTYPE html>
<html lang="<?php echo blog_language();?>">
<head>
    <?php echo head_contents();?>
    <?php echo $metatags;?>
    <link rel="stylesheet" href="<?php echo theme_path();?>css/style.css?v=1" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo theme_path();?>fonts/genericons/genericons.css" type="text/css" media="all" />
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
					<img class="no-grav" src="<?php echo theme_path();?>img/avatar.png" height="100" width="100" alt="<?php echo blog_title();?>" />
				</a>
			</h1>
			<?php } else {?>
			<h2 style="margin:0;font-size:2.5em;">
				<a class="site-logo" href="<?php echo site_url();?>" title="<?php echo blog_title();?>" rel="home">
					<img class="no-grav" src="<?php echo theme_path();?>img/avatar.png" height="100" width="100" alt="<?php echo blog_title();?>" />
				</a>
			</h2>			
			<?php } ?>
			<div class="site-title">
				<a href="<?php echo site_url();?>" title="<?php echo blog_title();?>"><?php echo blog_title();?></a>
			</div>
			<div class="site-description"><?php echo blog_tagline();?></div>
			<div id="menu-social" class="menu">
				<?php echo social();?>
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

			<?php if (theme_config('search_widget')):?>
			<aside id="search-widget" class="widget">
				<?php echo search();?>
			</aside>
			<?php endif;?>
			
			<?php if (theme_config('recent_posts')):?>
			<aside id="recent-posts" class="widget">
				<h3 class="widget-title"><?php echo i18n("Recent_posts");?></h3>
				<?php echo recent_posts();?>
			</aside>
			<?php endif;?>

			<?php if (theme_config('popular_posts')):?>
			<aside id="popular-posts" class="widget">
				<h3 class="widget-title"><?php echo i18n("popular_posts");?></h3>
				<?php echo popular_posts();?>
			</aside>
			<?php endif;?>

			<?php if (theme_config('category_list')):?>
			<aside id="categories" class="widget">
				<h3 class="widget-title"><?php echo i18n("Categories");?></h3>
				<?php echo category_list();?>
			</aside>
			<?php endif;?>

			<?php if (theme_config('archive')):?>
            <style>#archives ul {list-style-type:none;}</style>
			<aside id="archives" class="widget">
				<h3 class="widget-title"><?php echo i18n("Archives");?></h3>
				<ul><?php echo archive_list('month-year')?></ul>
			</aside>
			<?php endif;?>

			<?php if (theme_config('tagcloud')):?>
			<aside id="tags-cloud" class="widget">
				<h3 class="widget-title"><?php echo i18n("Tags");?></h3>
				<div class="tagcloud">
				<?php echo tag_cloud();?>
				</div>
			</aside>
			<?php endif;?>

			</div><!-- #secondary .widget-area -->

	</div><!-- #main .site-main -->

	<footer id="colophon" class="site-footer">
		<div class="site-info"><?php echo copyright();?><br><span>Designed by <a rel="nofollow" target="_blank" href="https://independentpublisher.me/">Independent Publisher</a></span></div>
		<!-- .site-info -->
	</footer><!-- #colophon .site-footer -->
    <?php if (analytics()): ?><?php echo analytics() ?><?php endif; ?>
</div><!-- #page .hfeed .site -->
</body>
</html>
