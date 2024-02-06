<?php 
	do_action('flatsome_before_blog');
?>

<?php if(!is_single() && flatsome_option('blog_featured') == 'top'){ get_template_part('template-parts/posts/featured-posts'); } ?>
<div class="thum-header">

    <div class="container">
<h6 class="entry-category is-xsmall">
    <?php echo get_the_category_list( __( ', ', 'flatsome' ) ); ?>
</h6>

        <?php
if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
}
?>
        <img class="thumnail-header" src="/wp-content/uploads/2019/04/bg-header-top.jpg"/>
        	<h1 class="page-title is-large uppercase">
		<?php

			if ( is_category() ) :
				printf( __( '%s', 'flatsome' ), '<span>' . single_cat_title( '', false ) . '</span>' );

			elseif ( is_tag() ) :
				printf( __( 'Thẻ tìm kiếm %s', 'flatsome' ), '<span>' . single_tag_title( '', false ) . '</span>' );

			elseif ( is_search() ) :
				printf( __( 'Kết quả tìm kiếm với từ khóa: %s', 'flatsome' ), '<span>' . get_search_query() . '</span>' );

			elseif ( is_author() ) :
				/* Queue the first post, that way we know
				 * what author we're dealing with (if that is the case).
				*/
				the_post();
				printf( __( 'Bài viêt của: %s', 'flatsome' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
				/* Since we called the_post() above, we need to
				 * rewind the loop back to the beginning that way
				 * we can run the loop properly, in full.
				 */
				rewind_posts();

			elseif ( is_day() ) :
				printf( __( 'Bài viết ngày: %s', 'flatsome' ), '<span>' . get_the_date() . '</span>' );

			elseif ( is_month() ) :
				printf( __( 'Bài viết tháng %s', 'flatsome' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

			elseif ( is_year() ) :
				printf( __( 'Bài viêt trong năm %s', 'flatsome' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

			elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
				_e( 'Asides', 'flatsome' );

			elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
				_e( 'Images', 'flatsome');

			elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
				_e( 'Videos', 'flatsome' );

			elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
				_e( 'Quotes', 'flatsome' );

			elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
				_e( 'Links', 'flatsome' );

			else :
				_e( '', 'flatsome' );

			endif;
		?>
	</h1>


    </div>
</div>
<div class="row row-large <?php if(flatsome_option('blog_layout_divider')) echo 'row-divided ';?>">
	
	<div class="large-9 col">
	<?php if(!is_single() && flatsome_option('blog_featured') == 'content'){ get_template_part('template-parts/posts/featured-posts'); } ?>
	<?php
		if(is_single()){
			get_template_part( 'template-parts/posts/single');
			comments_template();
		} elseif(flatsome_option('blog_style_archive') && (is_archive() || is_search())){
			get_template_part( 'template-parts/posts/archive', flatsome_option('blog_style_archive') );
		} else {
			get_template_part( 'template-parts/posts/archive', flatsome_option('blog_style') );
		}
	?>
	</div> <!-- .large-9 -->

	<div class="post-sidebar large-3 col">
		<?php get_sidebar(); ?>
	</div><!-- .post-sidebar -->

</div><!-- .row -->

<?php 
	do_action('flatsome_after_blog');
?>