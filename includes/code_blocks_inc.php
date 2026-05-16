<?php

define( 'PLUGIN_GUID_CK_CODEBLOCKS', 'ck_codeblocks' );

global $gLibertySystem;

$gLibertySystem->registerPlugin( PLUGIN_GUID_CK_CODEBLOCKS, [
	'title'             => 'CKEditor Code Block Conversion',
	'description'       => 'Converts {code} wiki blocks to <pre class="bwcode"> for CKEditor editing, and back on save.',
	'auto_activate'     => true,
	'plugin_type'       => FILTER_PLUGIN,
	'prestore_function' => 'ckeditor_code_pre_to_wiki_filter',
]);

/**
 * Convert {code params}...{/code} wiki markup to <pre class="bwcode"> for CKEditor.
 * HTML-encodes the content so CKEditor preserves it as text (protects <?php etc. from PI stripping).
 * Stores the original {code} params in data-bwcode-params for lossless round-trip.
 */
function ckeditor_code_wiki_to_pre( string $content ): string {
	return preg_replace_callback(
		'/\{code([^}]*)\}([\s\S]*?)\{\/code\}/i',
		function( array $m ): string {
			$params   = trim( $m[1] );
			$code     = htmlspecialchars( $m[2], ENT_COMPAT | ENT_HTML5, 'UTF-8' );
			$dataAttr = $params !== ''
				? ' data-bwcode-params="' . htmlspecialchars( $params, ENT_COMPAT | ENT_HTML5, 'UTF-8' ) . '"'
				: '';
			return '<pre class="bwcode"' . $dataAttr . '>' . $code . '</pre>';
		},
		$content
	);
}

/**
 * Reverse of ckeditor_code_wiki_to_pre — called by the prestore filter.
 * Converts <pre class="bwcode" data-bwcode-params="...">...</pre> back to {code ...}...{/code}.
 */
function ckeditor_code_pre_to_wiki( string $content ): string {
	return preg_replace_callback(
		'/<pre\b([^>]*?class="[^"]*\bbwcode\b[^"]*"[^>]*)>([\s\S]*?)<\/pre>/i',
		function( array $m ): string {
			$attrStr = $m[1];
			// Strip any trailing <br> CKEditor appends inside <pre>
			$raw  = preg_replace( '/<br\s*\/?>\s*$/i', '', $m[2] );
			$code = html_entity_decode( $raw, ENT_QUOTES | ENT_HTML5, 'UTF-8' );
			$params = '';
			if( preg_match( '/data-bwcode-params="([^"]*)"/', $attrStr, $pm ) ) {
				$params = html_entity_decode( $pm[1], ENT_QUOTES | ENT_HTML5, 'UTF-8' );
			}
			$open = $params !== '' ? "{code $params}" : '{code}';
			return $open . $code . '{/code}';
		},
		$content
	);
}

function ckeditor_code_pre_to_wiki_filter( &$pData, &$pFilterHash, $pObject = null ): void {
	if( !empty( $pData ) ) {
		$pData = ckeditor_code_pre_to_wiki( $pData );
	}
}
