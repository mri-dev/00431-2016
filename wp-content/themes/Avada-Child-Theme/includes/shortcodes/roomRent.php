<?php

class AO_RoomRentForm extends AvadaTemplate
{
	const SHORTCODE_TAG = 'roomrentform';
	private $render = "";

    /**
     * Sets up our actions/filters.
     *
     * @since 0.1.0
     * @access public
     * @return void
     */
    public function __construct()
    { 
        /* Register shortcodes on 'init'. */
        add_action( 'init', array( &$this, 'register_shortcode' ) );
    }

    /**
     * Registers the [tooltip] shortcode.
     *
     * @since  0.1.0
     * @access public
     * @return void
     */
    public function register_shortcode() {
        add_shortcode( self::SHORTCODE_TAG, array( &$this, 'do_shortcode' ) );
    }

    public function do_shortcode( $attr, $content = null )
    {
    	$r = $this;
    	  /* Set up the default arguments. */
        $defaults = apply_filters(
            self::SHORTCODE_TAG.'_defaults',
            array(
            )
        );

        /* Parse the arguments. */
        $attr = shortcode_atts( $defaults, $attr );

        /* Set up the default variables. */
        $r->_('<div><div class="room-rent-container">');

        	$r->_($r->row_start());
				ob_start();
        		include(locate_template('templates/shortcodes/roomrentform.php'));
				$template = ob_get_contents();
				ob_end_clean();
				$r->_($template);
         	$r->_($r->row_end());

        $r->_('</div></div>');


        /* Return the output of the tooltip. */
        return apply_filters( self::SHORTCODE_TAG, $this->render );
    }

    private function _($text){
    	$this->render .= $text;
    }
}

new AO_RoomRentForm();
