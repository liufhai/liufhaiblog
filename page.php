<?php
/**
 * Page 主题文件
 *
 * @package    LIUFHAI
 * @subpackage ZanBlog
 * @since      ZanBlog 3.0.0
 */
?>

<?php get_header(); ?>
<section id="zan-bodyer">
	<div class="container">
		<section class="row">
			<div class="col-md-8">
				<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
					<article class="article zan-post">
						<p><?php the_content(); ?></p>
					</article>
				<?php endwhile; ?>
			</div>
			<?php get_sidebar(); ?>
		</section>
	</div>
</section>
<?php get_footer(); ?>
</body>
</html>