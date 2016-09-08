<?php

class AO_RentDatepicker extends AvadaTemplate
{
	const SHORTCODE_TAG = 'rent-datepicker';
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
        $r->_('<div><div class="rent-datepicker" ng-controller="DatePickerRoomSearch" ng-app="AlphenHotel" ng-cloak>');

        	$r->_($r->row_start());
        		$r->_($r->column(3, 4, '
                    <div class="picker-holder">
                        <div class="picker">
    						<div class="title">'.__('Arrive', 'hotel').'</div>
    						<div class="input">
                                <md-datepicker ng-model="arrive"></md-datepicker>
    						</div>
            			</div>
                        <div class="picker-separator">&mdash;</div>
                        <div class="picker">
                            <div class="title">'.__('Departure', 'hotel').'</div>
                            <div class="input">
                                <md-datepicker ng-model="deperture"></md-datepicker>
                            </div>
                        </div>
                    </div>', 'no'));
        		$r->_($r->column(1, 4, '<div class="search-btn">
                    <button>'.__('Search Rooms', 'hotel').' <i class="fa fa-search"></i></button>
                    </div>', 'no', true));
         	$r->_($r->row_end());

        $r->_('</div></div>');


        /* Return the output of the tooltip. */
        return apply_filters( self::SHORTCODE_TAG, $this->render );
    }

    private function _($text){
    	$this->render .= $text;
    }
}

new AO_RentDatepicker();
