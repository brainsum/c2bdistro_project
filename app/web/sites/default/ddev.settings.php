<?php

// phpcs:ignoreFile

/**
 * @file
 * DDEV settings.
 */

$settings['trusted_host_patterns'] = [
  '^' . getenv('DDEV_SITENAME') . "\." . getenv('DDEV_TLD'),
];

$settings['config_exclude_modules'] = [
  'devel',
  'devel_php',
  'kint',
  'js_testing_ajax_request_test',
  'site_audit',
  'security_review',
// 'views_ui',
];
$config['devel.settings']['devel_dumper'] = 'var_dumper';
$config['imagemagick.settings']['imagemagick_version'] = 'v6';
