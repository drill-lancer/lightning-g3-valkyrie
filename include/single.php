<?php
/**
 * 投稿詳細ページの HTML を変更
 *
 * @package Lightning G3 Valkyrie
 */

/**
 * 記事本文外側のクラス名を変更
 */
function ltg3_valkyrie_article_outer_class( $article_outer_class ) {
	$article_outer_class = 'article-outer';
	return $article_outer_class;
}
add_filter( 'lightning_article_outer_class', 'ltg3_valkyrie_article_outer_class' );

/**
 * コメント外側に HTML 挿入(上部)
 */
function ltg3_valkyrie_add_comment_before() {
	global $post;
	$before_html = '';
	if ( post_type_supports( get_post_type(), 'comments' ) && ( comments_open( $post->ID ) || have_comments() ) ) {
		$before_html .= '<div class="comments-outer">';
		$before_html .= '<div class="comments-header">' . __( 'Comments', 'lightning-g3-valkyrie' ) . '</div>';
	}
	echo $before_html;

}
add_action( 'lightning_comment_before', 'ltg3_valkyrie_add_comment_before' );

/**
 * コメント外側に HTML 挿入(下部)
 */
function ltg3_valkyrie_add_comment_after() {
	global $post;
	$after_html = '';
	if ( post_type_supports( get_post_type(), 'comments' ) && ( comments_open( $post->ID ) || have_comments() ) ) {
		$after_html .= '</div>';
	}
	echo $after_html;
}
add_action( 'lightning_comment_after', 'ltg3_valkyrie_add_comment_after' );
