<?php
/*
Plugin Name: Frontity injector A/B testing
Plugin URI: -
Description: Replace the Frontity injector with a new version prepared for A/B testing
Author: Luis Herranz
Author URI: -
Version: 1.0.0
*/

DEFINE('FRONTITY_INJECTOR_PERCENTAGE', 10);
DEFINE('TEST_NUMBER', 1);

function frontity_injector_ab_testing($frontity) {
  // Read test ab code
  ob_start();
  include(WP_PLUGIN_DIR . '/frontity-injector-ab-testing/test-ab.js');
  $testab = ob_get_clean();

  // Change percentage of Frontity injector and test number
  $testab = preg_replace('/10;/', FRONTITY_INJECTOR_PERCENTAGE . ';', $testab);
  $testab = preg_replace('/frontity-injector-ab-testing-1/', 'frontity-injector-ab-testing-' . TEST_NUMBER, $testab);

  // Read alternative code
  ob_start();
  include(WP_PLUGIN_DIR . '/frontity-injector-ab-testing/alternative.js');
  $alternative = ob_get_clean();
  
  // Return proper script
  return $testab . 'if (frontityInjectorAbTesting === "frontity") {' . $frontity . '} else {' . $alternative . '}';
}

add_filter( 'frontity_javascript_injector', 'frontity_injector_ab_testing' );