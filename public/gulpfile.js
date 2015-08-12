var gulp = require('gulp'),
gutil = require('gulp-util'),
sass = require('gulp-sass'),
autoprefixer = require('gulp-autoprefixer'),
sass = require('gulp-sass'),
minifyCSS = require('gulp-minify-css'),
rename = require('gulp-rename'); 

gulp.task('build-sass', function () {
    gulp.src('./assets/stylesheets/**/*.scss')
    .pipe(sass())
    .pipe(autoprefixer({
        browsers: ['last 3 versions'],
        cascade: false}))
    .pipe(gulp.dest('./assets/dist/'))
    .pipe(minifyCSS())
    .pipe(rename({
        suffix: '.min'
    }))
    .pipe(gulp.dest('./assets/dist/'))
});

gulp.task('watch-sass', function() {
    gulp.watch(['./assets/stylesheets/**/*.scss'], ['build-sass']);
});


    gulp.task('default', ['build-sass']);