<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<article class="page post">
		<header class="entry-header">
		<?php if (authorized($p)) { echo '<div class="entry-title-meta"><span><a href="'. $p->url .'/edit?destination=post">Edit</a></span></div>'; } ?>	
					<h1 class="entry-title p-name" style="margin-bottom:20px;"><?php echo $p->title;?></h1>
			</header>
	<!-- .entry-header -->

	<div class="entry-content e-content">
	<?php echo $p->body;?>
	</div>
	<!-- .entry-content -->

</article>
<?php if (!empty($next) || !empty($prev)): ?>
<nav role="navigation" id="nav-below" style="margin-top:30px;" class="site-navigation paging-navigation">
	<h2 class="screen-reader-text">Post navigation</h2>
    <?php if (!empty($next)): ?>
	<div class="nav-previous"><a href="<?php echo($next['url']); ?>"><button><span class="meta-nav">←</span> <?php echo($next['title']); ?></button></a></div>
	<?php endif;?>
	<?php if (!empty($prev)): ?>
	<div class="nav-next"><a href="<?php echo($prev['url']); ?>"><button><?php echo($prev['title']); ?> <span class="meta-nav">→</span></button></a></div>
    <?php endif;?>
</nav>
<?php endif; ?>