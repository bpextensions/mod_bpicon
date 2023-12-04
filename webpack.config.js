var Encore = require('@symfony/webpack-encore');

// Module build configuration
Encore
    .setOutputPath('./modules/mod_bpicon/assets')
    .setPublicPath('/modules/mod_bpicon/assets')
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSassLoader()
    .disableSingleRuntimeChunk()
    .addExternals({
        jquery: 'jQuery'
    })
    .addEntry('module', [
        './modules/mod_bpicon/.dev/sass/fontawesomepreview.scss',
        './modules/mod_bpicon/.dev/sass/materialdesigniconspreview.scss',
        './modules/mod_bpicon/.dev/js/fontawesomepreview.js',
        './modules/mod_bpicon/.dev/js/materialdesigniconspreview.js'
    ]);

const config = Encore.getWebpackConfig();

// Export configurations
module.exports = [config];