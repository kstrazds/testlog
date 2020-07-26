var gulp = require('gulp'),
    sass = require('gulp-sass'),
    cssnano = require('gulp-cssnano'),
    rename = require('gulp-rename');

gulp.task('sass', function(){
    return gulp.src('resources/assets/sass/main.scss')
        .pipe(sass())
        .pipe(gulp.dest('resources/assets/css'))
});

gulp.task('minicss', function(){
    return gulp.src('resources/assets/css/main.css')
        .pipe(cssnano())
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(gulp.dest('resources/assets/css'))
});
