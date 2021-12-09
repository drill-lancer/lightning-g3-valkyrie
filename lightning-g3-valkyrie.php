<?php
/**
 * Plugin Name:     Lightning G3 Valkyrie
 * Plugin URI: https://github.com/drill-lancer/lightning-g3-three-column-unit
 * Description: Lightning G3 Three Column Unit
 * Author:  DRILL LANCER
 * Author URI: https://www.drill-lancer.com
 * Text Domain:     lightning-g3-valkyrie（プラグイン固有の識別名）
 * Domain Path:     /languages
 * Version:         1.0.0
 *
 * @package         LIGHTNING_G3_SKIN_SAMPLE（プラグイン固有の識別名）
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
function ltg3_add_skin_sample( $skins ) {

	$data = get_file_data( __FILE__, array( 'version' => 'Version' ) );

	// sample の部分が識別名です。好きな名前に変更してください.
	$skins['sample'] = array(
		// label が Lightning デザイン設定 のスキン選択プルダウンに表示される名称.
		'label'          => __( 'Sample Skin G3', 'lightning-g3-skin-sample' ),
		'css_url'        => plugin_dir_url( __FILE__ ) . 'css/style.css',
		'css_path'       => plugin_dir_path( __FILE__ ) . 'css/style.css',
		'editor_css_url' => plugin_dir_url( __FILE__ ) . 'css/editor.css',
		'version'        => $data['version'],
		// スキン固有の処理を入れる場合（非推奨）.
		'php_path'       => plugin_dir_path( __FILE__ ) . '/functions.php',
		// スキン固有の処理を入れる場合（非推奨）.
		'js_url'         => plugin_dir_url( __FILE__ ) . '/js/script.js',
	);
	return $skins;
}
add_filter( 'lightning_g3_skins', 'ltg3_add_skin_sample' );
