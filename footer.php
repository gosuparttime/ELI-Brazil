</div><a href="#wrapper" class="btn-inverse btn-small"><i class="icon-arrow-up"></i>Back To Top</a>
<footer role="contentinfo">
  <div class="row-fluid" id="inner-footer">
    <div class="span9">
      
      <nav class="row-fluid clearfix hidden-phone" role="navigation">
        <?php eli_footer_links(); ?>
      </nav>
      <div class="row-fluid" id="footer-information">
        <div class="span8 phone-half">
        <h4>For More Information</h4>
        <p class="zero-mar-b"><strong>Contact:</strong> <? echo get_field('name', 'option')?><br />
<em><? echo get_field('position', 'option')?></em></p>
        <ul id="contact-foot" class="menu clearfix" role="list">
        	<li role="listitem"><a href="mailto:<? echo get_field('email', 'option')?>?subject=<?php bloginfo('name') ?> Question" title="Email English Language Institute"><i class="icon-envelope-alt icon-2x"></i>elimail@syr.edu</a></li>
            <li role="listitem"><a href="tel:13154432390" title="Call English Language Institute"><i class="icon-phone-sign icon-2x"></i>1-315-443-2390</a></li>
        </ul>
        <p><a href="http://eli.syr.edu/" target="_blank">English Language Institute at Syracuse University Homepage</a></p>
        </div>
        <a id="translation"></a><div class="span4 phone-half" id="translation"><h4>Translate</h4>
        <?php echo do_shortcode('[google-translator]'); ?>
        </div>
      </div>
    </div>
    <div class="span3 mar-two-t visible-desktop"><div class="pad-one-b pull-right"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/UC-Logo.png" alt="University College of Syracuse University" /></div></div>
  </div>
</footer>
</div>
<!-- end #container --> 
</div>
<!-- end #wrapper --> 
<!-- end footer -->
<div id="colophon" class="container" role="contentinfo">
  <div class="row-fluid">
    <div class="span12 pad-one-t"><div class="pad-me notranslate">&copy;
      <?php echo the_time('Y'); ?> <?php bloginfo('description') ?>, <?php bloginfo('name') ?> <span class="hidden-phone"> | </span><address class="in-block">Syracuse University<span class="hidden-phone"> | </span><span class="in-block">700 University Ave, Syracuse NY 13244</span></address></div>
      
    </div>
  </div>
</div>
<!-- end #container --> 

<!--[if lt IE 7 ]>
  			<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  			<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->

<?php wp_footer(); // js scripts are inserted using this function ?>
</body></html>