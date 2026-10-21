<?php
$cube_travel_latest_articles_section_title = get_theme_mod(
    'cube_travel_latest_articles_section_title',
    __( 'Latest Articles', 'cube-travel' )
);

if (
    get_theme_mod( 'cube_travel_latest_articles', true ) &&
    ! empty( $cube_travel_latest_articles_section_title )
) :
?>
    <div id="latest-articles" class="section-header">
        <h2 class="section-title">
            <?php echo esc_html( $cube_travel_latest_articles_section_title ); ?>
        </h2>
    </div><!-- .section-header -->
<?php endif; ?>