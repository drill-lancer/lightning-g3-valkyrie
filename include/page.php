<?php
/**
 * 固定ページの HTML を変更
 *
 * @package Lightning G3 Valkyrie
 */

/**
 * 固定ページのタイトル追加
 */
function ltg3_valkyrie_entry_body_before( $article_outer_class ) {
	if ( is_page() && ! is_front_page() ) {
		?>
		<header class="<?php lightning_the_class_name( 'entry-header' ); ?>">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>
		<?php
	}
}
add_action( 'lightning_entry_body_before', 'ltg3_valkyrie_entry_body_before' );