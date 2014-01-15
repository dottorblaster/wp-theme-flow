<?php
/**
 * @package Lean
 * @since Lean 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div id="post-contain">
	<header class="entry-header">
		<div class="entry-posted">
			<?php lean_posted_on(); ?>
		</div><!-- .entry-posted -->
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'lean' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		<?php if ( 'post' == get_post_type() ) : ?>
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'lean' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'lean' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<!-- <?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'lean' ) );
				if ( $categories_list && lean_categorized_blog() ) :
			?>
			 <span class="cat-links">
				<?php printf( __( 'Categoria: %1$s', 'lean' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'lean' ) );
				if ( $tags_list ) :
			?>
			<span class="sep"> - </span>
			<span class="tag-links">
				<?php printf( __( 'Tag: %1$s', 'lean' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<span class="sep"> - </span> -->

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link"><?php comments_popup_link( __( 'Commenta', 'lean' ), __( '1 Commento', 'lean' ), __( '% Commenti', 'lean' ) ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'lean' ), '- <span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
