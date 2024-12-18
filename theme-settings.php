<?php
/**
 * @file
 * theme-settings.php
 *
 * Theme settings file for Bootstrap 5 Lite.
 */

function zeever_form_system_theme_settings_alter(&$form, &$form_state, $form_id = NULL) {

  if (isset($form_id)) {
    return;
  }
  $theme_name = $form['theme']['#value'];
  $form['bootstrap'] = array(
    '#type' => 'vertical_tabs',
    '#attached' => array(
      'js'  => array(backdrop_get_path('theme', 'zeever') . '/js/theme-settings.js'),
    ),
    '#prefix' => '<h2><small>' . t('Bootstrap Settings') . '</small></h2>',
    '#weight' => -10,
  );
  backdrop_add_css(backdrop_get_path('theme', 'zeever') . '/css/settings.css');

  // Version and CDN.

  $form['zeever_cdn'] = array(
    '#type' => 'fieldset',
    '#title' => t('Version and CDN'),
    '#description' => t('You may use the !bootstrapcdn or choose the bundled library to serve the Bootstrap framework files. If you disable these settings, you must provide your own Bootstrap source and/or optional CDN delivery implementation. !warning', array(
      '!bootstrapcdn' => l(t('Bootstrap CDN'), 'http://ww.bootstrapcdn.com', array(
        'external' => TRUE,
      )),
    '!warning' => '<div class="alert alert-info messages info"><strong>' . t('NOTE') . ':</strong> ' . t('While the Bootstrap CDN (content distribution network) is the preferred method for providing performance gains in load time, this method does depend on using this third party service. BootstrapCDN is under no obligation or commitment to provide guaranteed up-time or service quality for this theme.') . '</div>',
    )),
    '#group' => 'bootstrap',
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );

  $form['zeever_cdn']['zeever_cdn'] = array(
    '#type' => 'select',
    '#title' => t('Bootstrap version'),
    '#options' => array(
      '5.0.1' => t('5.0.1 (CDN)'),
      '5.1.3' => t('5.1.3 (CDN)'),
      '5.3.1' => t('5.3.1 (CDN)'),
      'module' => t('5.3.1 (bundled)'),
    ),
    '#default_value' => theme_get_setting('zeever_cdn', $theme_name),
    '#empty_option' => t('Disabled'),
    '#empty_value' => NULL,
  );

  // Navbar

  $form['navbar'] = array(
    '#type' => 'fieldset',
    '#title' => t('Navbar'),
    '#description' => t('Navigation bar settings.'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
    '#group' => 'bootstrap',
  );
  $form['navbar']['zeever_navbar_position'] = array(
    '#type' => 'select',
    '#title' => t('Navbar Position'),
    '#description' => t('Select your Navbar position.'),
    '#default_value' => theme_get_setting('zeever_navbar_position', $theme_name),
    '#options' => array(
      'static-top' => t('Static Top'),
      'fixed-top' => t('Fixed Top'),
      'fixed-bottom' => t('Fixed Bottom'),
    ),
    '#empty_option' => t('Normal'),
  );

  $form['navbar']['zeever_navbar_menu_position'] = array(
    '#type' => 'select',
    '#title' => t('Navbar Menu Position'),
    '#description' => t('Select your Navbar Menu position.'),
    '#default_value' => theme_get_setting('zeever_navbar_menu_position', $theme_name),
    '#options' => array(
      'navbar-left' => t('Left'),
      'navbar-right' => t('Right'),
    ),
    '#empty_option' => t('Normal'),
  );

  $form['navbar']['zeever_navbar_inverse'] = array(
    '#type' => 'checkbox',
    '#title' => t('Inverse navbar style'),
    '#description' => t('Select if you want the inverse navbar style.'),
    '#default_value' => theme_get_setting('zeever_navbar_inverse', $theme_name),
  );

  $form['navbar']['zeever_navbar_user_menu'] = array(
    '#type' => 'checkbox',
    '#title' => t('Add cog with user-menu'),
    '#description' => t('Select if you want cog style right pulled popup menu.'),
    '#default_value' => theme_get_setting('zeever_navbar_user_menu', $theme_name),
  );

  // Tweaks

  $form['tweaks'] = array(
    '#type' => 'fieldset',
    '#title' => t('Tweaks'),
    '#group' => 'bootstrap',
  );

  $form['tweaks']['zeever_container'] = array(
    '#type' => 'select',
    '#title' => t('Container type'),
    '#default_value' => theme_get_setting('zeever_container', $theme_name),
    '#description' => t('Switch between full width (fluid) or fixed (max 1170px) width.'),
    '#options' => array(
      'container' => t('Fixed'),
      'container-fluid' => t('Fluid'),
    )
  );

  $form['tweaks']['zeever_datetime'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show "XX time ago".'),
    '#default_value' => theme_get_setting('zeever_datetime', $theme_name),
    '#description' => t('If enabled, replace date output for nodes and comments by "XX time ago".'),
  );

}
