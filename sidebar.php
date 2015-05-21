<div id="sidebar" class="span4 hidden-phone" role="complementary">
  <div class="fluid-sidebar sidebar">
    <div class="row-fluid">
      <?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>
      <?php dynamic_sidebar( 'sidebar1' ); ?>
      <?php endif; ?>
    </div>
  </div>
</div>
