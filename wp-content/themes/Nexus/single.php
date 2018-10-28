<?php get_header(); ?>

<div class="page-wrap container">
	<div id="main-content">
		<div class="main-content-wrap clearfix">
			<div id="content">
				<?php get_template_part( 'includes/breadcrumbs', 'index' ); ?>

				<div id="left-area">

				<?php while ( have_posts() ) : the_post(); ?>
					<?php if (et_get_option('nexus_integration_single_bottom') <> '' && et_get_option('nexus_integrate_singlebottom_enable') == 'on') echo(et_get_option('nexus_integration_single_bottom')); ?>

					<article class="entry-content clearfix">
						<!-- Article header -->
						<div class="post-heading">
							<div class="post-meta">
									<?php the_date(); ?> <span class="meta-author">de <?php the_author_link(); ?></span>											 			 
							</div><!-- /.post-meta -->				
							<h1 class="title">
								<?php the_title(); ?>
							</h1>
						</div>

						<hr class="gray-line" />

						<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); ?>
						<?php if($image) : ?>
							<div class="post-featured-image">
								<img src="<?php echo $image[0] ?>" />
							</div>
						<?php endif; ?>

				<?php
					if ( has_post_format( 'video' ) ) {
						global $wp_embed;

						$video_width = (int) apply_filters( 'nexus_video_width', 838 );

						$et_video_url = get_post_meta( get_the_ID(), '_format_video_embed', true );
						$video = apply_filters( 'the_content', $wp_embed->shortcode( '', esc_url( $et_video_url ) ) );

						$video = preg_replace('/<embed /','<embed wmode="transparent" ',$video);
						$video = preg_replace('/<\/object>/','<param name="wmode" value="transparent" /></object>',$video);

						$video = preg_replace("/width=\"[0-9]*\"/", "width={$video_width}", $video);

						echo '<div class="et-single-video">' . $video . '</div>';
					}
				?>

					<?php
						the_content();

						wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'Nexus' ), 'after' => '</div>' ) );
					?>
					</article> <!-- .entry -->

					<?php if (et_get_option('nexus_integration_single_bottom') <> '' && et_get_option('nexus_integrate_singlebottom_enable') == 'on') echo(et_get_option('nexus_integration_single_bottom')); ?>

					<div id="et-box-author">
						<div id="et-post-share" class="clearfix">
							<?php echo do_shortcode('[quotcoll orderby="random" limit=1]'); ?>
						</div>
					</div>

				<?php
					if ( et_get_option('nexus_468_enable') == 'on' ){
						echo '<div class="et-single-post-ad">';
						if ( et_get_option('nexus_468_adsense') <> '' ) echo( et_get_option('nexus_468_adsense') );
						else { ?>
							<a href="<?php echo esc_url(et_get_option('nexus_468_url')); ?>"><img src="<?php echo esc_attr(et_get_option('nexus_468_image')); ?>" alt="468 ad" class="foursixeight" /></a>
				<?php 	}
						echo '</div> <!-- .et-single-post-ad -->';
					}
				?>

					<?php
						if ( comments_open() && 'on' == et_get_option( 'nexus_show_postcomments', 'on' ) )
							comments_template( '', true );
					?>
				<?php endwhile; ?>

				</div> 	<!-- end #left-area -->
			</div> <!-- #content -->

			<?php get_sidebar(); ?>
		</div> <!-- .main-content-wrap -->

		<?php get_template_part( 'includes/footer-banner', 'single' ); ?>
	</div> <!-- #main-content -->

	<?php get_footer(); ?>