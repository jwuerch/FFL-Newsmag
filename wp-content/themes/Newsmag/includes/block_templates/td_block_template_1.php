<?php
/**
 * this is the default block template
 * Class td_block_header_1
 */
class td_block_template_1 {

    /**
     * @var string the template data, it's set on construct
     */
    var $template_data_array = '';

    /**
     * @param $template_data_array array - all the data for the template
     */
    function __construct($template_data_array) {
        $this->template_data_array = $template_data_array;
    }

    /**
     * renders the CSS for each block, each template may require a different css generated by the theme
     * @return string CSS the rendered css and <style> block
     */
    function get_css() {


        extract(shortcode_atts(
            array(
                'header_color' => '',
                'header_text_color' => ''
            ), $this->template_data_array['atts']));




        // check if we have a header color, do nothing if we don't have a header_color or header_text_color
        if ((empty($header_color) or $header_color == '#') and (empty($header_text_color) or $header_text_color == '#')) {
            return '';
        }

        // $unique_block_class - the unique class that is on the block. use this to target the specific instance via css
        $unique_block_class =  $this->template_data_array['unique_block_class'];

        // the css that will be compiled by the block, <style> - will be removed by the compiler
        $raw_css = "
        <style>

            /* @header_color */
            .$unique_block_class .td_module_wrap:hover .entry-title a,
            .$unique_block_class .td-load-more-wrap a:hover,
        	.$unique_block_class .td_quote_on_blocks {
                color: @header_color;
            }

            .$unique_block_class .td-next-prev-wrap a:hover i {
                background-color: @header_color;
                border-color: @header_color;
            }
            .$unique_block_class .td_module_wrap .td-post-category:hover {
                background-color: @header_color;
            }

            .$unique_block_class .td-wrapper-pulldown-filter .td-pulldown-filter-display-option:hover {
                color: @header_color;
            }

            .$unique_block_class a.td-pulldown-filter-link:hover {
                color: @header_color;
            }

			.$unique_block_class .td-trending-now-title,
            .$unique_block_class .block-title span,
            .$unique_block_class .block-title a {
                background-color: @header_color;
            }

            /* @header_text_color */
            .$unique_block_class .td-trending-now-title,
            .$unique_block_class .block-title span,
            .$unique_block_class .block-title a {
                color: @header_text_color;
            }
        </style>
    ";

        $td_css_compiler = new td_css_compiler($raw_css);
        $td_css_compiler->load_setting_raw('header_color', $header_color);
        $td_css_compiler->load_setting_raw('header_text_color', $header_text_color);

        $compiled_style = $td_css_compiler->compile_css();
        if (!empty($compiled_style)) {
            /** scoped - @link http://www.w3schools.com/tags/att_style_scoped.asp */
            $compiled_style = PHP_EOL . '<style scoped>' . PHP_EOL . $compiled_style . PHP_EOL . '</style>';
        }

        return $compiled_style;
    }


    /**
     * renders the block title
     * @return string HTML
     */
    function get_block_title() {
        extract(shortcode_atts(
            array(
                'custom_title' => '',
                'custom_url' => '',
                'header_color' => '',
                'header_text_color' => '',
            ), $this->template_data_array['atts']));


        if (empty($custom_title)) {
            //no title selected, and no default title - do nothing
            return '';
        }


        // there is a custom title
        $buffy = '';
        $buffy .= '<h4 class="block-title">';
        if (!empty($custom_url)) {
            $buffy .= '<a href="' . esc_url($custom_url) . '">' . esc_html($custom_title) . '</a>';
        } else {
            $buffy .= '<span>' . esc_html($custom_title) . '</span>';
        }
        $buffy .= '</h4>';
        return $buffy;
    }


    /**
     * renders the filter of the block
     * @return string
     */
    function get_pull_down_filter() {
        $buffy = '';

        if (empty($this->template_data_array['td_pull_down_items'])) {
            return '';
        }

        $buffy .= '<div class="td-wrapper-pulldown-filter">';
            $buffy .= '<div class="td-pulldown-filter-display-option">';


                //show the default display value
                $buffy .= '<div id="td-pulldown-' . $this->template_data_array['block_uid'] . '-val"><span>';
                $buffy .=  $this->template_data_array['td_pull_down_items'][0]['name'] . ' </span><i class="td-icon-menu-down"></i>';
                $buffy .= '</div>';

                //builde the dropdown
                $buffy .= '<ul class="td-pulldown-filter-list">';
                foreach ($this->template_data_array['td_pull_down_items'] as $item) {
                    $buffy .= '<li class="td-pulldown-filter-item"><a class="td-pulldown-filter-link" id="' . td_global::td_generate_unique_id() . '" data-td_filter_value="' . $item['id'] . '" data-td_block_id="' . $this->template_data_array['block_uid'] . '" href="#">' . $item['name'] . '</a></li>';
                }
                $buffy .= '</ul>';

            $buffy .= '</div>';  // /.td-pulldown-filter-display-option
        $buffy .= '</div>';

        return $buffy;
    }
}