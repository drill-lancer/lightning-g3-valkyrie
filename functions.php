<?php
/**
 * Skin Functions
 *
 * スキン固有のコードを書く場所
 *
 * @package lightning-skin-sample
 *
 * ここにPHPのコードを書いてください
 */

/**
 * ページヘッダーを無効化
 */
function ltg3_valkyrie_disable_page_header( $page_header_title_html ) {
	$page_header_title_html = '';
	return $page_header_title_html;
}
add_filter( 'lightning_page_header_title_html', 'ltg3_valkyrie_disable_page_header' );