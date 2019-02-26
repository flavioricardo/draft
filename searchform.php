<form role="search" method="get" class="form-inline my-2 my-lg-0" action="<?php echo home_url( '/' ); ?>">
    <input type="search" class="form-control mr-sm-2" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
    <input type="submit" class="btn btn-primary my-2 my-sm-0" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
</form>