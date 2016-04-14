// plugins
var gulp        = require('gulp'),
    render      = require('gulp-nunjucks-render'),
    ext_replace = require('gulp-ext-replace');

// configuration
var paths = require('./config.js');

gulp.task('render-site', function () {
    return gulp.src(paths.pages.site)
        .pipe(render({
            path: paths.templates
        }))
        .pipe(ext_replace('.php'))
        .pipe(gulp.dest('./auth/'));
});

gulp.task('render-blog', function () {
    return gulp.src(paths.pages.blog)
        .pipe(render({
            path: paths.templates
        }))
        .pipe(ext_replace('.php'))
        .pipe(gulp.dest('./auth/blog/'));
});
gulp.task('render-business', function () {
    return gulp.src(paths.pages.business)
        .pipe(render({
            path: paths.templates
        }))
        .pipe(ext_replace('.php'))
        .pipe(gulp.dest('./auth/business/'));
});

gulp.task('render-all', ['render-blog', 'render-site'], function () {
});