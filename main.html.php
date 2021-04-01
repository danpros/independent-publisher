<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<?php if (isset($is_category)):?>
    <header class="page-header"><h1 class="page-title"><?php echo i18n('Category');?>: <?php echo $category->title;?></h1><div class="taxonomy-description"><?php echo $category->body;?></div></header>
<?php endif;?>
<?php if (isset($is_tag)):?>
    <header class="page-header"><h1 class="page-title">Tag: <?php echo $tag->title;?></h1></header>
<?php endif;?>
<?php if (isset($is_archive)):?>
    <header class="page-header"><h1 class="page-title">Archive: <?php echo $archive->title;?></h1></header>
<?php endif;?>
<?php if (isset($is_search)):?>
    <header class="page-header"><h1 class="page-title">Search: <?php echo $search->title;?></h1></header>
<?php endif;?>
<?php if (isset($is_type)):?>
    <header class="page-header"><h1 class="page-title">Type: <?php echo ucfirst($type->title);?></h1></header>
<?php endif;?>
<style>
.jump-link {
	text-align: right;
}
.jump-link a {
	font-family: Georgia, "Times New Roman", Times, serif;
	color: #57ad68;
}
.jump-link a:after {
    content: '→';
    padding-left: 5px;
}
.link-out a:after {
    font-family: "Genericons";
    content: "\f442";
    position: relative;
    top: 3px;
    font-weight: normal;
}
</style>
<?php $i = 0; $len = count($posts); ?>
<?php foreach ($posts as $p): ?>
    <?php if ($i == 0) {
        $class = 'first-post';
    } elseif ($i == $len - 1) {
        $class = 'last-post';
    } else {
        $class = 'post';
    }
    $i++; ?>
<article class="first-post post h-entry hentry">
    <?php if (!empty($p->link)) { ?>
	<header class="entry-header">
		<h2 style="margin-bottom:20px;" class="entry-title p-name link-out">
			<a target="_blank" href="<?php echo $p->link;?>" title="<?php echo $p->title;?>" rel="bookmark"><?php echo $p->title;?></a>
		</h2>
	</header>
	<?php } else { ?>
	<header class="entry-header">
		<h2 style="margin-bottom:20px;" class="entry-title p-name">
			<a href="<?php echo $p->url;?>" title="<?php echo $p->title;?>" rel="bookmark"><?php echo $p->title;?></a>
		</h2>
	</header>
    <?php } ?>
	<!-- .entry-header -->
	
    <?php if (!empty($p->image)):?>
    <div class="featured-wrapper">
        <img style="width:100%;" title="<?php echo $p->title; ?>" alt="<?php echo $p->title; ?>" class="attachment-post-thumbnail wp-post-image" src="<?php echo $p->image; ?>">
    </div>
    <?php endif; ?>
    <?php if (!empty($p->audio)):?>
    <div class="featured-wrapper">
        <iframe width="100%" height="200px" class="embed-responsive-item" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=<?php echo $p->audio;?>&amp;auto_play=false&amp;visual=true"></iframe>
    </div>
    <?php endif; ?>
    <?php if (!empty($p->video)):?>
    <div class="featured-wrapper">
        <iframe width="100%" height="315px" class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo get_video_id($p->video); ?>" frameborder="0" allowfullscreen></iframe>
    </div>
    <?php endif; ?>
    <?php if (!empty($p->quote)):?>
    <div class="featured-wrapper">
        <blockquote class="quote"><?php echo $p->quote ?></blockquote>
    </div>
    <?php endif; ?>

	<div class="entry-content e-content">
		<?php echo get_teaser($p->body, $p->url);?>
        <?php if (config('teaser.type') === 'trimmed'):?><div class="enhanced-excerpt-read-more" style="margin-top:1em;"><a class="more-link" href="<?php echo $p->url; ?>"><?php echo config('read.more'); ?> →</a></div><?php endif;?>
	</div>
	<!-- .entry-content -->
		
	<footer class="entry-meta">
	
		<span><a href="<?php echo $p->url;?>"><?php echo format_date($p->date);?></a></span> <span class="sep"> | </span>	

		<span class="cat-links">Posted by <a href="<?php echo $p->authorUrl;?>"><?php echo $p->author;?></a> in <?php echo $p->category;?></span> 
		
        <?php if (disqus_count()) { ?>
			<span class="sep"> |</span>		
            <span class="comments-link"><a href="<?php echo $p->url ?>#disqus_thread"> comments</a></span>
        <?php } elseif (facebook()) { ?>
			<span class="sep"> |</span>
            <span class="comments-link"><a href="<?php echo $p->url ?>#comments"><span><fb:comments-count href=<?php echo $p->url ?>></fb:comments-count> comments</span></a></span>
        <?php } ?>
		
		<?php if (login()) { echo '<span class="sep"> |</span> <span><a href="'. $p->url .'/edit?destination=post">Edit</a></span>'; } ?>
	</footer>
	<!-- .entry-meta -->
</article>
<?php endforeach;?>
<?php if (!empty($pagination['prev']) || !empty($pagination['next'])): ?>
<nav role="navigation" id="nav-below" class="site-navigation paging-navigation">
	<h2 class="screen-reader-text">Post navigation</h2>
    <?php if (!empty($pagination['next'])): ?>
	<div class="nav-next"><a href="?page=<?php echo $page + 1 ?>"><button>Previous page <span class="meta-nav">→</span></button></a></div>
	<?php endif;?>
	<?php if (!empty($pagination['prev'])): ?>
	<div class="nav-previous"><a href="?page=<?php echo $page - 1 ?>"><button><span class="meta-nav">←</span> Next page</button></a></div>
    <?php endif;?>
</nav>
<?php endif; ?>
<?php if (disqus_count()): ?>
    <?php echo disqus_count() ?>
<?php endif; ?>