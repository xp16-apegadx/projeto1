var gulp = require('gulp'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    postcss = require('gulp-postcss'),
    sourcemaps = require('gulp-sourcemaps'),
    prefixes = require('autoprefixer'),
    cssnano = require('cssnano'),
    pump = require('pump'),
    sass = require("gulp-sass"),
    plumber = require('gulp-plumber'),
    pastaSCSS = ["./src/scss/*.scss"],
    pastaCSS = "./src";

gulp.task("sass", function () {
    return gulp.src(pastaSCSS)
        .pipe(plumber())
        .pipe(sass())
        .pipe(gulp.dest(pastaCSS));
});

gulp.task("sass-watch", function () {
    gulp.watch(pastaSCSS, ["sass"]);
});

gulp.task('css', function () {
    var processors = [
        prefixes({
            browsers: ['last 4 versions']
        }),
        cssnano({
            zindex: false,
            reduceIdents: false
        }),
    ];
    return gulp.src('src/*.css')
        .pipe(sourcemaps.init())
        .pipe(postcss(processors))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('dist'));
});

gulp.task('compress', function (done) {
    gulp.src(['src/js/*.js'])
        .pipe(concat('app.js'))
        .pipe(uglify())
        .pipe(gulp.dest('dist'));
    done();
});

gulp.task('uglify-debug', function (cb) {
    pump([
        gulp.src('src/js/*.js'),
        concat('app.js'),
        uglify(),
        gulp.dest('dist')
    ], cb);
});

gulp.task('watch', function (done) {
    gulp.watch(pastaSCSS, gulp.series('sass', 'css'));
    gulp.watch('src/js/**/*.js', gulp.series('compress'));
    done();
});

gulp.task('default', gulp.series('sass', 'css', 'compress', 'watch'));