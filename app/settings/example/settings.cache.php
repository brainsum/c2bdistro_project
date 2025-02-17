<?php

/**
 * @file
 * Caching settings.
 */

// @todo: Change if needed. Maybe use getenv().
$settings['cache_prefix'] = 'c2bdistro_local';

if (!empty(getenv('DISABLE_CACHE'))) {
  /* @note
   * Base dev caches.
   */

  if (file_exists(__DIR__ . '/services.cache.yml')) {
    $settings['container_yamls'][] = __DIR__ . '/services.cache.yml';
  }

  $settings['cache']['bins']['render'] = 'cache.backend.null';
  $settings['cache']['bins']['dynamic_page_cache'] = 'cache.backend.null';
  $settings['cache']['bins']['page'] = 'cache.backend.null';
  $settings['cache']['bins']['discovery_migration'] = 'cache.backend.null';
  $settings['cache']['default'] = 'cache.backend.null';
  // Expiration of cached pages to 0.
  $config['system.performance']['cache']['page']['max_age'] = 0;
  // Aggregate CSS files on.
  $config['system.performance']['css']['preprocess'] = FALSE;
  // Aggregate JavaScript files on.
  $config['system.performance']['js']['preprocess'] = FALSE;
}
// Code from this file can be enabled with REDIS_ENABLE.
// Optional.
// If you want to use it, only enable it after Drupal has been installed.
elseif (file_exists(__DIR__ . '/settings.redis.php')) {
  include_once __DIR__ . '/settings.redis.php';
}
