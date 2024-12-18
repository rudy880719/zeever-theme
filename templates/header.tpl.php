<?php
/**
 * @file
 * Display generic site information such as logo, site name, etc.
 *
 * Available variables:
 *
 * - $base_path: The base URL path of the Backdrop installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $front_page: The URL of the front page. Use this instead of $base_path, when
 *   linking to the front page. This includes the language domain or prefix.
 * - $site_name: The name of the site, empty when display has been disabled.
 * - $site_slogan: The site slogan, empty when display has been disabled.
 * - $menu: The menu for the header (if any), as an HTML string.
 */
?>
<header id="navbar" role="banner" class="navbar navbar-expand-lg navbar-light">
  <div class="<?php print $container_class;?>">
    <div class="navbar-header">
      <?php if ($site_name || $logo): ?>
        <div class="header-content">
          <a class="name navbar-brand" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
            <?php if ($logo): ?>
              <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
            <?php endif; ?>
            <?php if ($site_name): ?>
              <?php print $site_name; ?>
            <?php endif; ?>
          </a>
          <div role="banner" id="page-header">
            <?php if (!empty($site_slogan)): ?>
              <p class="lead"><?php print $site_slogan; ?></p>
            <?php endif; ?>
          </div> <!-- /#page-header -->
        </div>
      <?php endif; ?>
      <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
      <div type="button" class="navbar-toggler" data-toggle="collapse" data-target=".navbar-collapse">
        <div class="right quarter">
          <a class="toggle-title" ></a>
          <a class="toggle-nav" href="#">&#9776;</a>
        </div> <!-- .one-half right -->
      </div>
    </div>

    <?php if ($navigation or $menu): ?>
      <div class="navbar-collapse collapse <?php print $navbar_menu_position; ?>">
        <?php if ($menu) print $menu; ?>
        <?php if ($navigation) print $navigation; ?>
      </div>
    <?php endif; ?>
  </div>
</header>
