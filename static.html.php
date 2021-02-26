<article class="page post">
		<header class="entry-header">
		<?php if (login()) { echo '<div class="entry-title-meta"><span><a href="'. $p->url .'/edit?destination=post">Edit</a></span></div>'; } ?>	
					<h1 class="entry-title p-name"><?php echo $p->title;?></h1>
			</header>
	<!-- .entry-header -->

	<div class="entry-content e-content">
	<?php echo $p->body;?>
	</div>
	<!-- .entry-content -->

</article>