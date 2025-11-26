<?php
/**
 * Initializes the Theme
 *
 * @package MacrosBySara
 * @subpackage CountdownBlock
 */

namespace MacrosBySara\CountdownBlock;

/** Builds the Plugin */
class Plugin_Init {
	/**
	 * Plugin directory path.
	 *
	 * @var string $dir_path
	 */
	private string $dir_path;

	/**
	 * Constructor
	 *
	 * @param string $dir_path The plugin directory path.
	 */
	public function __construct( string $dir_path ) {
		$this->dir_path = $dir_path;
		add_action( 'init', array( $this, 'register_block' ) );
	}

	/**
	 * Activation hook
	 */
	public function activate() {
		_doing_it_wrong(
			__METHOD__,
			'Method not implemented yet.',
			'0.1.0'
		);
		// Activation tasks here.
	}

	/**
	 * Deactivation hook
	 */
	public function deactivate() {
		// Deactivation tasks here.
		_doing_it_wrong(
			__METHOD__,
			'Method not implemented yet.',
			'0.1.0'
		);
	}

	/**
	 * Register Gutenberg Block
	 */
	public function register_block() {
		$blocks_path = $this->dir_path;
		/**
		 * Registers the block(s) metadata from the `blocks-manifest.php` and registers the block type(s)
		 * based on the registered block metadata.
		 * Added in WordPress 6.8 to simplify the block metadata registration process added in WordPress 6.7.
		 *
		 * @see https://make.wordpress.org/core/2025/03/13/more-efficient-block-type-registration-in-6-8/
		 */
		if ( function_exists( 'wp_register_block_types_from_metadata_collection' ) ) {
			wp_register_block_types_from_metadata_collection( $blocks_path, $blocks_path . '/build/blocks-manifest.php' );
			return;
		}

		/**
		 * Registers the block(s) metadata from the `blocks-manifest.php` file.
		 * Added to WordPress 6.7 to improve the performance of block type registration.
		 *
		 * @see https://make.wordpress.org/core/2024/10/17/new-block-type-registration-apis-to-improve-performance-in-wordpress-6-7/
		 */
		if ( function_exists( 'wp_register_block_metadata_collection' ) ) {
			wp_register_block_metadata_collection( $blocks_path, $blocks_path . '/build/blocks-manifest.php' );
		}
		/**
		 * Registers the block type(s) in the `blocks-manifest.php` file.
		 *
		 * @see https://developer.wordpress.org/reference/functions/register_block_type/
		 */
		$manifest_data = require $blocks_path . '/build/blocks-manifest.php';
		foreach ( array_keys( $manifest_data ) as $block_type ) {
			register_block_type( $blocks_path . "/{$block_type}" );
		}
	}
}
