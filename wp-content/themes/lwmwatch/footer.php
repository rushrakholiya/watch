<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

		</div><!-- #content -->
        
        
     <div class="call-us"> 
        <?php
		if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
			<div class="footer-widget-1">       
            <div class="wrap">

				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			</div>
            </div>
		<?php } ?>
     
     </div>
     
        

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="wrap">
				<?php
				get_template_part( 'template-parts/footer/footer', 'widgets' );

				if ( has_nav_menu( 'social' ) ) : ?>
					<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'twentyseventeen' ); ?>">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'social',
								'menu_class'     => 'social-links-menu',
								'depth'          => 1,
								'link_before'    => '<span class="screen-reader-text">',
								'link_after'     => '</span>' . twentyseventeen_get_svg( array( 'icon' => 'chain' ) ),
							) );
						?>
					</nav><!-- .social-navigation -->
				<?php endif;

				get_template_part( 'template-parts/footer/site', 'info' );
				?>
			</div><!-- .wrap -->
		</footer><!-- #colophon -->
	</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>



<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
 <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/js/owl.carousel.js"></script>
 
 <script>
	jQuery(document).ready(function() {
     
    jQuery("#owl-demo").owlCarousel({
     
          navigation : false, // Show next and prev buttons
          slideSpeed : 300,
          paginationSpeed : 400,
          singleItem: true,
		  autoPlay: true,
		  pagination : false,
		  autoPlay : 5000
     
          // "singleItem:true" is a shortcut for:
          // items : 1, 
          // itemsDesktop : false,
          // itemsDesktopSmall : false,
          // itemsTablet: false,
          // itemsMobile : false
     
      });
     
    });

</script>

<script>

    jQuery(document).ready(function() {
     
      jQuery("#owl-demo2").owlCarousel({
     
          autoPlay: 3000, //Set AutoPlay to 3 seconds
     
          items : 3,
          itemsDesktop : [1199,3],
          itemsDesktopSmall : [979,3]
     
      });
     
        jQuery(".brandlogoSlider").owlCarousel({
     
          autoPlay: 3000, //Set AutoPlay to 3 seconds
     
          items : 4,
          itemsDesktop : [1199,3],
          itemsDesktopSmall : [979,3]
     
      });
     
    });

</script>



<script>
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

function filterFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    div = document.getElementById("myDropdown");
    a = div.getElementsByTagName("a");
    for (i = 0; i < a.length; i++) {
        if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
            a[i].style.display = "";
        } else {
            a[i].style.display = "none";
        }
    }
}
</script>




 <script>

var stickyNavTop = jQuery('section').offset().top;
  jQuery(window).scroll(function() {
  
   if(jQuery(window).scrollTop() > stickyNavTop){
   
    jQuery('section.scrollspy-nav').addClass('sticky');
   }else{
   
    jQuery('section.scrollspy-nav').removeClass('sticky'); 
   }
  
});
  
</script>


<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

 <script>

var stickyNavTop = jQuery('header').offset().top;
  jQuery(window).scroll(function() {
  
   if(jQuery(window).scrollTop() > stickyNavTop){
   
    jQuery('header.header_bar').addClass('sticky');
   }else{
   
    jQuery('header.header_bar').removeClass('sticky'); 
   }
  
});
  
</script>


<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>



<script>(function(){
  var ticker = function() {
    var now = new Date(),
        seconds = now.getSeconds(),
        minutes = now.getMinutes(),
        hours = now.getHours();
    
    hours = ((hours > 11 ? hours - 12 : hours) / 12) * 60;
    
    document.querySelector(".clock__hours").dataset.value = hours;
    document.querySelector(".clock__seconds").dataset.value = seconds;
    document.querySelector(".clock__minutes").dataset.value = minutes;
  }
  
  setInterval(ticker, 100);
})();//@ sourceURL=pen.js
</script>


<script>
    jQuery(document).ready(function() {
     
      jQuery("#owl-demo3").owlCarousel({
     
          autoPlay: 3000, //Set AutoPlay to 3 seconds
     
          items : 3,
          itemsDesktop : [1199,3],
          itemsDesktopSmall : 1[979,2]
		  
     
      });
     
    });

</script>

<script>
jQuery(document).ready(function(){
    jQuery(".dropdown-toggle").dropdown();
});
</script>




</body>
</html>
