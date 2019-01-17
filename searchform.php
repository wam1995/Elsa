<?php
    /**
     * The default searchform template
     * 
     * @author Maine <maine@cainiaofly.com>
     * @license GPL-3.0
     */
?>
<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="input-group mb-3">
        <input type="search" id="<?php echo $unique_id; ?>" class="form-control" placeholder="搜索其实很简单…" value="<?php echo get_search_query(); ?>" name="s">
    </div>
</form>