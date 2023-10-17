# Branding Settings WordPress Plugin

## Overview

The Branding Settings plugin allows WordPress site administrators to manage various branding elements across the site. It uses Advanced Custom Fields (ACF) to provide an easy-to-use interface for setting up branding elements like business name, email, and more. These settings can then be accessed using shortcodes.

## Features

- Easy-to-use settings page built with ACF.
- Shortcodes to display branding elements.
- Supports different types of information like standard text, email, and phone numbers.

## Requirements

- WordPress 5.0 or higher
- Advanced Custom Fields (ACF) Plugin

## Installation

1. Download the plugin and upload it to your WordPress plugins directory (`wp-content/plugins/`).
2. Activate the plugin through the WordPress admin interface.
3. Install and activate the Advanced Custom Fields (ACF) plugin if you haven't already.

## ACF Options Page Setup

In order for the ACF fields to show up on the settings page, you'll need to manually set up an Options Page in ACF:

1. Go to the WordPress admin panel.
2. Navigate to Custom Fields > Options Pages.
3. Click on "Add New Options Page".
4. Set the Menu Slug to `brand_settings`.

## Usage

Once the ACF Options Page is set up, you can navigate to the Branding Settings page in the WordPress admin to manage your branding elements.

### Shortcodes

Use the `[branding]` shortcode to display branding elements within your posts, pages, or widgets. For example:

- `[branding key="business"]` will display the business name.
- `[branding key="email"]` will display the email as a clickable `mailto` link.

## Support

For issues, feature requests, and contributions, please use the GitHub issues page.
