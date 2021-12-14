<?php
/**
 * アーカイブページの HTML を変更
 * 
 * @package Lightning G3 Valkyrie
 */

/**
 * アーカイブに外枠を追加（上部）
 */
function ltg3_valkyrie_add_main_section_prepend() {
	if ( is_home() && ! is_front_page() || is_archive() || is_search() || is_404() ) {
		$title = '';
		if ( is_home() && ! is_front_page() || is_archive() ) {
			$title = get_the_archive_title();
		} elseif ( is_search() ) {
			if ( ! empty( get_search_query() ) ) {
				$title = sprintf( __( 'Search Results for : %s', 'lightning-g3-valkyrie' ), get_search_query() );
			} else {
				$title = __( 'Search Results', 'lightning-g3-valkyrie' );
			}
		} elseif ( is_404() ) {
			$title = __( 'Not found', 'lightning-g3-valkyrie' );
		}

		$archive_header_html  =  '<div class="archive-outer">';
		$archive_header_html .= '<header class="archive-header"><h1 class="archive-header-title">' . $title . '</h1></header>';
		if ( is_category() || is_tax() || is_tag() ) {
			$archive_description = term_description();
			if ( ! empty( $archive_description ) ) {
				$archive_header_html .= '<div class="archive-description">' . $archive_description . '</div>';
			}
		}
		echo wp_kses_post( $archive_header_html );
	}
}
add_action( 'lightning_main_section_prepend', 'ltg3_valkyrie_add_main_section_prepend' );

/**
 * アーカイブタイトルを設定
 */
function ltg3_valkyrie_change_archive_header( $archive_header_html ) {
	$archive_header_html = '';
	return $archive_header_html;
}
add_filter( 'lightning_archive_header', 'ltg3_valkyrie_change_archive_header' );

/**
 * アーカイブタイトルを設定
 */
function ltg3_valkyrie_change_archive_description( $archive_description_html ) {
	$archive_description_html = '';
	return $archive_description_html;
}
add_filter( 'lightning_archive_description', 'ltg3_valkyrie_change_archive_description' );

/**
 * アーカイブに外枠を追加（下部）
 */
function ltg3_valkyrie_add_main_section_append() {
	if ( is_home() && ! is_front_page() || is_archive() || is_search() || is_404() ) {
		echo '</div>';
	}
}
add_action( 'lightning_main_section_append', 'ltg3_valkyrie_add_main_section_append' );