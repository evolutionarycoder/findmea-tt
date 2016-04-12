// plugins
var gulp        = require('gulp'),
    render      = require('gulp-nunjucks-render'),
    ext_replace = require('gulp-ext-replace');

// configuration
var paths = require('./config.js');

// paths
gulp.task('render-site', function () {
    return gulp.src(paths.pages)
        .pipe(render({
            path: paths.templates
        }))
        .pipe(ext_replace('.php'))
        .pipe(gulp.dest('./auth/'));
});