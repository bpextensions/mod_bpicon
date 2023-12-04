# BP Icon Joomla! module
![GitHub](https://img.shields.io/github/license/bestproject/mod_bpicon.svg)
![GitHub issues](https://img.shields.io/github/issues-raw/bestproject/mod_bpicon.svg)

A Joomla! 4 module for displaying an icon with text, title and a button.

## Functionality
- Image file as icon.
- Linking type (button, all).
- Linking (external url, article, menu item).
- Update server.
- Bootstrap 5 ready.

## Build from repo
To build from repository you gonna need following tools:
- PHP 7
- Composer (installed globally)
- Phing (installed globally)
- Node/NPM (installed globally)

### How to prepare development environment
- Clone repository into working Joomla! 4.4 installation
- Run `composer install`

### How to build installation package
- Run `phing` or `composer build`
- Your installation package should be ready in `/.build/mod_bpicon.zip` directory

## Changelog
### 2.x
- Rewritten for Joomla! 4
- Removed common icon providers in favor of image icons
- Added the ability to add multiple icons in same module and set number of columns to display
- Improved accessibility.

### 1.5.4
- Removed duplicated stylesheets.

### 1.5
- Added support for [Google Material Design Icons](https://design.google.com/icons/).
- Added support for selecting icon from images.
- Changed module name.

### 1.2.1
- Fixed a bug where module text was saved with HTML tags removed.

### 1.2.0
- Added an easy selection for FontAwesome icons.
- Fixed version number.

### 1.0.1
Removing K2 support. Developers ignore bug reports and refuse to fix them. 

### 1.0.0
Initial release

