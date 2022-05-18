'use strict';
var gulp = require('gulp');
var sass = require('gulp-sass')(require('sass'));
var concat = require('gulp-concat');
sass.compiler = require('node-sass');
gulp.task('sass', function () {
    return gulp.src('./library/scss/style.scss')
        .pipe(concat('custom.css'))
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./library/scss/'));
});
gulp.task('watch', function() {
    gulp.watch('./library/scss/*.scss');
});