<?php

// phpcs:ignoreFile

/**
 * @file
 * Development settings. You should include this on your settings.local.php.
 */

$settings['container_yamls'][] = DRUPAL_ROOT . '/sites/default/services.development.yml';

// Expiration of cached pages to 0.
$config['system.performance']['cache']['page']['max_age'] = 0;
// Aggregate CSS files on.
$config['system.performance']['css']['preprocess'] = FALSE;
// Aggregate JavaScript files on.
$config['system.performance']['js']['preprocess'] = FALSE;
// Show all error messages on the site.
$config['system.logging']['error_level'] = 'verbose';

$settings['cache']['bins']['render'] = 'cache.backend.null';
$settings['cache']['bins']['dynamic_page_cache'] = 'cache.backend.null';
$settings['cache']['bins']['page'] = 'cache.backend.null';
$settings['cache']['bins']['discovery_migration'] = 'cache.backend.null';
$settings['cache']['default'] = 'cache.backend.null';

$settings['skip_permissions_hardening'] = TRUE;
