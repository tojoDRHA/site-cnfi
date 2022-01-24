<?php

class Meow_MGL_Builders_Masonry extends Meow_MGL_Builders_Core {

	public function __construct( $atts, $infinite, $isPreview = false ) {
		parent::__construct( $atts, $infinite, $isPreview );
		$this->layout = 'masonry';
	}

	function inline_css() {
		$class_id = '#' . $this->class_id;
		$gutter = isset( $this->atts['gutter'] ) ? $this->atts['gutter'] : get_option( 'mgl_masonry_gutter', 10 );
		$columns = isset( $this->atts['columns'] ) ? $this->atts['columns'] : get_option( 'mgl_masonry_columns', 3 );
		$isPreview = $this->isPreview;
		ob_start();
		include dirname( __FILE__ ) . '/masonry.css.php';
		$html = ob_get_clean();
		return $html;
	}

	function build_next_cell( $id, $data ) {
		$html = parent::build_next_cell( $id, $data );
		$columns = ( isset( $this->atts['columns'] ) ? $this->atts['columns'] : get_option( 'mgl_masonry_columns', 3 ) ) + 1;
		$html = str_replace( '100vw', 100 / $columns . 'vw', $html );
		return $html;
	}

}

?>
