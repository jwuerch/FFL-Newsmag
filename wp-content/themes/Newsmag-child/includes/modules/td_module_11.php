<?php


class td_module_11 extends td_module {

    function __construct($post) {
        //run the parrent constructor
        parent::__construct($post);
    }

    function render() {
        ob_start();
        ?>

        <div class="<?php echo $this->get_module_classes();?>">
            <?php echo $this->get_image('td_238x178');?>

            <div class="item-details">
                <div class="meta-info">
                    <?php echo $this->get_date();?>
                    <?php echo $this->get_comments();?>
                </div>
                <?php echo $this->get_title();?>

                <div class="td-excerpt">
                    <?php echo $this->get_excerpt();?>
                </div>

            </div>
            <div class="sub-item-details">
                <div class="sub-item-details-1">
                    <div class="category-box">
                        <div class="sub-category-box">
                            <?php if (td_util::get_option('tds_category_module_11') == 'yes') { echo $this->get_category(); }?>
                        </div>
                    </div>
                    <div class="author-box">
                            <?php echo $this->get_author();?>
                    </div>
                </div>
                <div class="sub-item-details-2">
                    <div class="td-read-more">
                            <a href="<?php echo $this->href;?>"><?php echo __td('>', TD_THEME_NAME);?></a>
                    </div>
                </div>
            </div>

        </div>

        <?php return ob_get_clean();
    }
}