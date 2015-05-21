<div id="sidebar" role="complementary">
  <div class="fluid-sidebar sidebar">
    <div class="row-fluid">
      <?php if ( is_active_sidebar( 'sidebar-home' ) ) : ?>
      <?php dynamic_sidebar( 'sidebar-home' ); ?>
      <?php endif; ?>
    </div>
  </div>
</div>
