<?php
/**
 *カスタマイザーの内容を変更
 *
 * @package Lightning G3 Valkyrie
 */

/**
 * ページヘッダー設定は意味ないので無効化
 *
 * @param object $wp_customize : customize object.
 * @return void
 */
function ltg3_valkyrie_customize_register( $wp_customize ) {
	$wp_customize->remove_panel( 'vk_page_header_setting' );
}
add_action( 'customize_register', 'ltg3_valkyrie_customize_register', 9999 );

/**
 * ページタイトルを常に表示
 */
function ltg3_valkyrie_is_entry_header( $is_entry_header_display ) {
	$is_entry_header_display = false;
	if ( ! is_front_page() ) {
		$is_entry_header_display = true;
	}
	return $is_entry_header_display;
}
add_filter( 'lightning_is_entry_header', 'ltg3_valkyrie_is_entry_header', 9999 );