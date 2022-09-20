// webpack.mix.js

const browserSyncOptions = {
    proxy: 'fictional-university.local',
    startPath: '/',
    open: false,
    watch: true,
    reload: true,
    notify: false,
    files: [
      `style.css`,
      `**/*.css`,
      `**/*.php`,
      `*.php`
    ]
  };

let mix = require('laravel-mix');

mix.browserSync(browserSyncOptions);