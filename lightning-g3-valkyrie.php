<?php
/**
 * Plugin Name: Lightning G3 Valkyrie
 * Plugin URI: https://github.com/drill-lancer/lightning-g3-valkyrie
 * Description: Lightning G3 Valkyrie
 * Author: DRILL LANCER
 * Author URI: https://www.drill-lancer.com
 * Text Domain: lightning-g3-valkyrie
 * Domain Path: /languages
 * Version: 1.0.0
 *
 * @package Lightning G3 Valkyrie
 */

// Do not load directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Composer のファイルを読み込み ( composer install --no-dev ).
require_once plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';

// アップデーターの設定.
$my_update_checker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/drill-lancer/lightning-g3-valkyrie',
	__FILE__,
	'lightning-g3-valkyrie'
);
$my_update_checker->setBranch( 'master' );

// is_plugin_active の準備.
require_once ABSPATH . 'wp-admin/includes/plugin.php';

// 条件判定.
$current_theme = get_template();
$generation    = get_option( 'lightning_theme_generation' );
$use_pro_unit  = is_plugin_active( 'lightning-g3-pro-unit/lightning-g3-pro-unit.php' );

if ( 'lightning' !== $current_theme ) {
	return;
}

/**
 * Undocumented function
 *
 * @param array $skins テーマや他のプラグインによって生成されたされたスキン情報の配列.
 * @return array
 */
function ltg3_valkyrie_add_skin_valkyrie( $skins ) {

	$data = get_file_data( __FILE__, array( 'version' => 'Version' ) );

	// sample の部分が識別名です。好きな名前に変更してください.
	$skins['valkyrie'] = array(
		// label が Lightning デザイン設定 のスキン選択プルダウンに表示される名称.
		'label'          => __( 'Valkyrie', 'lightning-g3-valkyrie' ),
		'css_url'        => plugin_dir_url( __FILE__ ) . '/assets/build/css/style.css',
		'css_path'       => plugin_dir_path( __FILE__ ) . '/assets/build/css/style.css',
		'editor_css_url' => plugin_dir_url( __FILE__ ) . '/assets/build/css/editor.css',
		'version'        => $data['version'],
		'php_path'       => plugin_dir_path( __FILE__ ) . '/functions.php',
		'js_url'         => plugin_dir_url( __FILE__ ) . '/assets/build/js/script.js',
	);
	return $skins;
}
add_filter( 'lightning_g3_skins', 'ltg3_valkyrie_add_skin_valkyrie' );
