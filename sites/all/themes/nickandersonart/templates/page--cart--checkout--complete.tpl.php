<?php
/**
 * @file
 * Zen theme's implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $secondary_menu_heading: The title of the menu used by the secondary links.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['header']: Items for the header region.
 * - $page['navigation']: Items for the navigation region, below the main menu (if any).
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['footer']: Items for the footer region.
 * - $page['bottom']: Items to appear at the bottom of the page below the footer.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see zen_preprocess_page()
 * @see template_process()
 */
?>


<div id="wrapper">
      <div id="header_row">
        <div id="header">
              <?php if($logo):?>
                  <div id="logo">
                      <h1><a name="top" href="/"><span>Third Eye Pinecones</span></a></h1>
                </div><!-- /#logo -->
              <?php endif;?>

              <div class="navbar topNav">
                  <div class="navbar-inner">
                      <div class="container">
                          <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                          </a>
                          <h4>Navigation</h4>
                          <?php if ($user->uid): ?>
                          <div class="auth_user">
                              <div class="Wel_name">
                                  Welcome, <?php print $user->name; ?>
                                  <?php endif;?>
                              </div>

                              <div class="logoUt_btn">
                                  <!--If loggen in -->
                                  <?php if ($user->uid): ?>
                                  <?php print l(t('Logout'), 'user/logout'); ?>
                              </div>
                          </div>
                      <?php endif; ?>
                          <div class="nav-collapse collapse navbar-responsive-collapse">
                              <div id="cart_link">
                                  <?php if($page['cart_region']):?>
                                      <?php print render($page['cart_region']);?>
                                  <?php endif;?>
                              </div><!-- /#cart_link -->
                              <div id="search">
                                  <?php $block = module_invoke('search', 'block_view', 'form');
                                  print render($block['content']);
                                  ?>
                              </div><!-- /#search -->
                              <div id="social_links" class="clearfix">
                                <ul>
                                    <li><a id="social_links_facebook" href="http://www.facebook.com/ThirdEyePinecones"><span>Facebook</span></a></li>
                                    <li><a id="social_links_twitter" href="https://twitter.com/3rdEyePinecones"><span>Twitter</span></a></li>
                                    <li><a id="social_links_pin"  href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Ftepnew.nickandersonart.com&media=http%3A%2F%2Ftepnew.nickandersonart.com%2Fsites%2Fdefault%2Ffiles%2Fscreenshot.png" class="pin-it-button" count-layout="horizontal">pinterest</a></li>
                                    <li><iframe class="social_links_fb" src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Ftepnew.nickandersonart.com%2F&amp;send=false&amp;layout=button_count&amp;width=150&amp;show_faces=false&amp;font=arial&amp;colorscheme=light&amp;action=like&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:150px; height:21px;" allowTransparency="true"></iframe></li>
                                </ul>
                            </div>
                            <!-- /#social_links -->


                              <div id="main_menu">
                                  <?php if($page['topmenu']):?>
                                      <?php print render($page['topmenu']);?>
                                  <?php endif;?>
                              </div><!-- /#main_menu -->

                              <div id="sub_menu">
                                  <?php if($page['submenu']): ?>
                                      <?php print render($page['submenu'])?>
                                  <?php endif;?>
                              </div><!-- /#sub_menu -->

                          </div><!-- /.nav-collapse -->
                      </div>
                  </div><!-- /navbar-inner -->
              </div>



           <div id="email_signup">

                 <!--If anonim user-->
                  <?php if(!$user->uid):?>
                      <?php if ($page['singup']):?>
                          <?php print render($page['singup']);?>
                          <?php //print l(t('Login'), 'user/login'); ?>
                      <?php endif; ?>
                  <?php endif; ?>
                 <!--If logget in, print username--> 
                   
          </div><!-- /#email_signup -->
          
          
        </div><!-- /#header -->
      </div><!-- /#header_row -->
      <?php if($page['hero']) : ?>
      <div id="hero">
        <?php print render($page['hero']); ?>
        <?php if($page['hero_blocks']) : ?>
        <div id="hero_blocks">
          <?php print render($page['hero_blocks']); ?>
        </div><!-- /#hero_blocks -->
        <?php endif; ?>
      </div><!-- /#hero -->
      <?php endif; ?>
      <?php if(!$is_front) : ?>
        <?php if($page['sidebar']) : ?>
        <div id="sidebar">
          <?php print render($page['sidebar']); ?>
        </div><!-- /#sidebar -->
        <div id="content">
        <?php else : ?>
        <div id="content_full">
        <?php endif; ?>
          <?php print render($tabs); ?> 
            
          
<!-- ====== START Main ====== -->
<div id="complete">
    <div class="main_wrp wrp" id="step5_main_wrp">
      <div class="main in clearfix">
        <div class="content clearfix" id="step5">
            <h1>order complete!</h1>
            <div class="clear"></div>
            <div id="step5_left">
                    <h2>Thank you for your purchase. An email will be sent to you shortly.</h2>
              <h4 id="order_no">order #<?php print $page['content']['system_main']['#order']->order_id; ?></h4>
              
                  <?php
                    $order_id = $page['content']['system_main']['#order']->order_id;

                    $order_items = uc_order_load($order_id);

                    foreach ($order_items->products as $item) {

                        //aggregate info for product item
                        $node = node_load($item->nid);
                        $image = field_get_items('node', $node, 'uc_product_image');
                        $title = $item->title;
                        $price = $item->price;
                        $qty = $item->qty;

                            $output = field_view_value('node', $node, 'uc_product_image', $image[0], array(
                                'type' => 'image',
                                'settings' => array(
                                    'image_style' => 'w330_h400', //place your image style here
                                'image_link' => 'content',
                                ),
                            ));

                            //Render items
                            print '<div class="complete_info">';     
                                print render($output);
                                print '<p>' . $title . '</p>';
                                print '<p>Price: ' . uc_currency_format($price) . '</p>';
                                print '<p>Qty: ' . $qty . '</p>';
                            print '</div>';

                    }
                    
                    $total = $order_items->order_total;
                    print '<b class="complete_total">Total: ' . uc_currency_format($total) . '</b>';
                ?> 
                             
                      
            
              <p>
              You just planted a tree! Every purchase you make actively supports and pays for the planting of a tree through our partner non-profit American Forests. Thank you for actively helping to support non-profits that lobby and promote for education and policy regarding the proper maintenance of fire-climax ecosystems.
              </p>
              <div id="tell_your_friends">
                <?php $node = node_load();?>
                <?php $urlfb = 'http://www.facebook.com/sharer.php?u=' . 'http://' . $_SERVER["HTTP_HOST"] .$node;
                      $urltw = 'https://twitter.com/share?text=' . urlencode($title) . '&url=http://' . $_SERVER["HTTP_HOST"] . $node;
                      $urlpn = 'http://pinterest.com/pin/create/button/?url=' . 'http://' . $_SERVER["HTTP_HOST"] .$node . '&media=http://tepnew.nickandersonart.com/sites/default/files/screenshot.png';
                      $urlgp = 'https://plus.google.com/share?url=' . $GLOBALS['base_root'];
                ?>
                    <h5>tell your friends about your purchase!</h5>
                <ul id="soc_links">
                    <li>
                  <a href="<?=$urlfb?>" class="soc-icon">
                    <img src="/sites/all/themes/nickandersonart/css/styles/images/btn_fb.png" alt="" height="48" width="48">
                  </a>
                </li>
                    <li>
                <a href="<?=$urltw?>" class="soc-icon">
                    <img src="/sites/all/themes/nickandersonart/css/styles/images/btn_tw.png" alt="" height="48" width="48">
                </a>
                </li>
                    <li>
                  <a href="<?=$urlpn?>" class="soc-icon">
                    <img src="/sites/all/themes/nickandersonart/css/styles/images/btn_pin.png" alt="" height="48" width="48">
                  </a>
                </li>
                    <li>
                  <a href="https://plus.google.com/share?url=<?php print $GLOBALS['base_root']; ?>" class="soc-icon">
                    <img src="/sites/all/themes/nickandersonart/css/styles/images/btn_ggl.png" alt="" height="48" width="48">
                  </a>
                </li>
              </ul>
            </div>
              
            <ul id="user_menu">
                    <li><a href="<?php print $GLOBALS['base_root'];?>/products">Our products section.</a></li>
                    <li><a href="<?php print $GLOBALS['base_root'];?>/pinecone-information">Pinecone Info.</a></li>
                    <li><a href="#">Media and Blog.</a></li>
            </ul>
            </div>
            <img src="<?php print $GLOBALS['base_root'];?>/sites/all/themes/nickandersonart/css/styles/images/step5_pic.jpg" alt="" id="step5_pic" height="265" width="275">
        </div>
      </div>
    </div>
</div>    
<!-- ====== END Main ====== -->          
          
          
          
        </div><!-- /#content || /#content_full -->
      </div><!-- /#content_row -->
      <div id="back_to_top">
        <a href="#top"><span>Back to Top</span></a>
      </div><!-- /#back_to_top -->
      <?php endif; ?>
      <div id="footer_row">
        <div id="footer">
          <div id="footer_links">
            <ul id="ftr_wrp wrp">
              <?php if($page['bootom_menu_region']):?>
                <?php print render($page['bootom_menu_region'])?>
              <?php endif;?>  
            </ul>
          </div><!-- /#footer_links -->
          <p id="copyright">
            Copyright &copy; Third Eye Pinecones 2012. All Rights Reserved.
          </p><!-- /#copyright -->
        </div><!-- /#footer -->
      </div><!-- /#footer_row -->
    </div> <!--/#wrapper-->                 