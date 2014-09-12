<!DOCTYPE html>
<html lang="en">
<head>
	<?php get_partial('metadata'); ?>
</head>
<body>
	<?php get_partial('header'); ?>

	<div class="container">		
		<div class="row">
			<div class="col-md-9">
				<?php if($label): ?>
				<h1>Post dengan label "<?php echo $label; ?>"</h1><hr>
				<?php endif; ?>
				
				<?php foreach ($posts['entries'] as $post): ?>
				<article class="the-content">
					<h1><?php echo anchor($post['url'], $post['title']); ?></h1>

					<span class="date"><i class="glyphicon glyphicon-calendar"></i> <?php echo date("d F Y", strtotime($post['date'])); ?></span>
					<span class="cat">
						<i class="glyphicon glyphicon-tags"></i> 
						<?php foreach ($post['labels'] as $post_label): ?>
							<span><?php echo anchor(POST_TERM.'/label/'.$post_label, $post_label); ?></span>
						<?php endforeach; ?>
					</span>
					<span class="comment-count"><i class="glyphicon glyphicon-comment"></i> <a href="<?php echo site_url($post['url'].'#disqus_thread'); ?>">Komentari</a></span>

					<div class="content">
						<?php echo $post['content']; ?>
					</div>
					
				</article>
				<?php endforeach; ?>

				<ul class="pagination">
					<?php echo $this->pusaka->pagination($posts['total'], $label); ?>
				</ul>
			</div>

			<div class="col-md-3">
				<?php get_partial('post_sidebar'); ?>
			</div>
		</div>
	</div>

	<?php get_partial('footer'); ?>

	<?php get_snippet('disqus_count'); ?>
</body>
</html>