<article class="page type-page hentry">
    <header class="entry-header">
        <h1 class="entry-title"><?php echo $name ?></h1>
    </header>
    <div class="entry-content">
        <?php echo $about ?>
        <h2 class="post-index">Posts by this author</h2>
        <?php if (!empty($posts)) { ?>
            <ul class="post-list">
                <?php $i = 0; $len = count($posts); ?>
                <?php foreach ($posts as $p): ?>
                    <?php if ($i == 0) {
                        $class = 'item first';
                    } elseif ($i == $len - 1) {
                        $class = 'item last';
                    } else {
                        $class = 'item';
                    }
                    $i++; ?>
                    <li class="<?php echo $class; ?>">
                        <span><a href="<?php echo $p->url ?>"><?php echo $p->title ?></a></span> on
                        <span><?php echo format_date($p->date) ?></span> - <?php echo i18n('Posted_in');?> <span><?php echo $p->category ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php } else {
            echo i18n('No_posts_found') . '!';
        } ?>
    </div>
</article>
<?php if (!empty($posts)) { ?>
<?php if (!empty($pagination['prev']) || !empty($pagination['next'])): ?>
<nav role="navigation" id="nav-below" class="site-navigation paging-navigation">
	<h2 class="screen-reader-text">Post navigation</h2>
    <?php if (!empty($pagination['next'])): ?>
	<div class="nav-next"><a href="?page=<?php echo $page + 1 ?>"><button>Previous posts <span class="meta-nav">→</span></button></a></div>
	<?php endif;?>
	<?php if (!empty($pagination['prev'])): ?>
	<div class="nav-previous"><a href="?page=<?php echo $page - 1 ?>"><button><span class="meta-nav">←</span> Newer posts</button></a></div>
    <?php endif;?>
</nav>
<?php endif; ?>
<?php } ?>