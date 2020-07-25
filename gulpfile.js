var gulp = require('gulp'),
    sass = require('gulp-sass'),
    cssnano = require('gulp-cssnano'),
    rename = require('gulp-rename');

gulp.task('sass', function(){
    return gulp.src('src/assets/sass/style.scss')
        .pipe(sass())
        .pipe(gulp.dest('src/assets/css'))
});

gulp.task('minicss', function(){
    return gulp.src('src/assets/css/style.css')
        .pipe(cssnano())
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(gulp.dest('src/assets/css'))
});
