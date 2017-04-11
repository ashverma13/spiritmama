<!-- NOTE: If you need to make changes to this file, copy it to your current theme's main
	directory so your changes won't be overwritten when the plugin is upgraded. -->

<!-- Start of Post Wrap -->
<div class="post hentry ivycat-post blog_post">
	<div class="blog_title_cont"><h1 class="blog_title"><?php the_title(); ?></h1></div>
	<div class="blog_img">
		<?php 
			$img = genesis_get_image( array(
				'format'  => 'html',
				'size'    => genesis_get_option( 'image_size' ),
				'context' => 'archive',
				'attr'    => genesis_parse_attr( 'entry-image' ),
			) );

			printf( '<a href="%s" title="%s">%s</a>', get_permalink(), the_title_attribute( 'echo=0' ), $img );
		?>
	</div>
	<!-- This is the output of the post TITLE -->

	<!-- This is the output of the EXCERPT -->
	<div class="blog_text">
		<?php the_excerpt(); ?>
	</div>
	<a href="<?php the_permalink(); ?>" class="read_more_btn">Read More</a>
</div>
<!-- // End of Post Wrap -->
