<?php
/**
 * 投稿詳細ページの HTML を変更
 * 
 * @package Lightning G3 Valkyrie
 */

/**
 * 
 */
function ltg3_valkyrie_article_outer_class( $article_outer_class ) {
	$article_outer_class = 'article-outer';
	return $article_outer_class;
}
add_filter( 'lightning_article_outer_class', 'ltg3_valkyrie_article_outer_class' );