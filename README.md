# Frontity injector A/B Testing

WordPress plugin to create an A/B test between the Frontity injector and an alternative.

It stores the result in `localStorage` to keep consistency.

## How to use

You can add your alternative javascript to the `alternative.js` file. If you just want to test Frontity vs your responsive theme, you can leave it as it is.

You can edit the `frontity-injector-ab-testing.php` file if you want to change these globals:

- FRONTITY_INJECTOR_PERCENTAGE: Percentage of times Frontity is loaded out of 100 (default: 10)
- TEST_NUMBER: In case you want to start a new experiment from scratch (default: 1)

## Requirements

It needs at least v1.9.0 of our [Frontity WP plugin](https://wordpress.org/plugins/wp-pwa/).
