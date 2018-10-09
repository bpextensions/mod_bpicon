# mod_bpicon
A Joomla! 3 module for displaying an FontAwesome/Google Material Design Icons/Image Icon.

## Functionality
- FontAwesome Icons support (easy selection from a preview window).
- Google Material Design Icons support (easy selection from a preview window).
- Icons fonts are served from CDNs.
- Image file as icon.
- Linking type (title, text, icon, all).
- Linking (external url, article, menu item).
- Update server.
- Bootstrap3 ready.

## Build from repo
To build from repository you gonna need following tools:
- PHP 7
- Composer (installd globaly)
- Node/NPM

### How to prepare development environmnt
- Clone repository into working Joomla! 3.8 installation
- Run `composer install`
- Run `npm install`
- When all the requirements are installed just run `npm gulp watch`

## Changelog
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

