<?php if (!defined('HTMLY')) die('HTMLy'); ?>
<style>
.link-out a:after {
    font-family: "Genericons";
    content: "\f442";
    position: relative;
    top: 3px;
    font-weight: normal;
}
.tag-list a:after {
    content: ', ';
}
.tag-list a:last-child:after {
	content: '';
}
</style>
<article class="post">
	<header class="entry-header">
		<div class="entry-title-meta">
			<span><a href="<?php echo $p->url;?>" title="<?php echo $p->title;?>" rel="bookmark"><time class="entry-date dt-published"><?php echo format_date($p->date);?></time></a></span> <?php if (login()) { echo '<span class="sep"> |</span> <span><a href="'. $p->url .'/edit?destination=post">Edit</a></span>'; } ?>
		</div>
		<?php if (!empty($p->link)) { ?>
		<h1 class="entry-title p-name link-out" style="margin-bottom:20px;"><a target="_blank" href="<?php echo $p->link;?>"><?php echo $p->title;?></a></h1>
		<?php } else { ?>
		<h1 class="entry-title p-name" style="margin-bottom:20px;"><?php echo $p->title;?></h1>
		<?php } ?>
	</header>
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
	<?php echo $p->body;?>	
	</div>
	<!-- .entry-content -->
		
	<footer class="entry-meta">
		Posted by <a href="<?php echo $p->authorUrl;?>"><?php echo $p->author;?></a> in <?php echo $p->category;?></span> <span class="sep"> |</span>		
				
		<span class="tag-list">Tag: <?php echo $p->tag;?></span>
		
		
	</footer>
	<!-- .entry-meta -->
	
    <div class="related">
		<style>
			.related {
				border-top: solid 1px #ddd;
				margin-top:30px;
				}
			.related ul {
				margin-bottom:0;
				margin-left: 30px;
				}
			.related li {
				line-height: .80;
				padding-top: 5px;
				padding-bottom: 5px;
				margin: 0;			
			}
			.related li, .related a {
				font-family: "Myriad Pro", "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Geneva, Verdana, sans-serif;
				font-size: 16px;
				line-height: 1.2em;
				}
			</style>
        <h4 class="widget-title" style="padding-top:30px;font-size: 18px;margin-top:0;margin-bottom: 15px;">Related Posts</h4>
        <?php echo get_related($p->related);?>
    </div>

</article>

<?php if (disqus()): ?>
    <?php echo disqus($p->title, $p->url) ?>
<?php endif; ?>
<?php if (facebook() || disqus()): ?>
<div class="comments-area" id="comments" style="margin:30px 0 0 0;">
    <?php if (facebook()): ?>
        <div class="fb-comments" data-href="<?php echo $p->url ?>" data-numposts="<?php echo config('fb.num') ?>" data-colorscheme="<?php echo config('fb.color') ?>"></div>
    <?php endif; ?>
    <?php if (disqus()): ?>
        <div id="disqus_thread"></div>
    <?php endif; ?>
</div>
<?php endif; ?>

<?php if (!empty($next) || !empty($prev)): ?>
<nav role="navigation" id="nav-below" style="margin-top:30px;" class="site-navigation paging-navigation">
	<h2 class="screen-reader-text">Post navigation</h2>
    <?php if (!empty($next)): ?>
	<div class="nav-previous"><a href="<?php echo($next['url']); ?>"><button><span class="meta-nav">←</span> Next post</button></a></div>
	<?php endif;?>
	<?php if (!empty($prev)): ?>
	<div class="nav-next"><a href="<?php echo($prev['url']); ?>"><button>Previous post <span class="meta-nav">→</span></button></a></div>
    <?php endif;?>
</nav>
<?php endif; ?>