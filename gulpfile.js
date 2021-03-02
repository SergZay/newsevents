var gulp        = require('gulp');
var sass        = require('gulp-sass');
var browserSync = require('browser-sync');
var cssnano     = require('gulp-cssnano');
var rename      = require('gulp-rename');
var csscomb     = require('gulp-csscomb');
var autoprefixer = require('gulp-autoprefixer');

gulp.task('sass', function(){
    return gulp.src('assets/sass/**/*.sass')
        .pipe(sass())
        .pipe(csscomb())
        .pipe(autoprefixer('last 2 versions', 'ie11'))
        .pipe(gulp.dest('assets/css'))
        .pipe(browserSync.reload({stream: true}));
});

gulp.task('wow-css', function(){
    return gulp.src('node_modules/wowjs/css/libs/animate.css')
        .pipe(cssnano())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('assets/css'));
});

gulp.task('watch-js', function(){
    return gulp.src('assets/js/**/*.js')
        .pipe(browserSync.reload({stream: true}));
});

gulp.task('wow-js', function(){
    return gulp.src('node_modules/wowjs/dist/wow.min.js')
        .pipe(gulp.dest('assets/js'));
});

gulp.task('watch-html', function(){
    return gulp.src('*.html')
        .pipe(browserSync.reload({stream: true}));
});

gulp.task('css-libs', function() {
    return gulp.src('assets/sass/main.sass')
        .pipe(sass())
        .pipe(cssnano())
        .pipe(csscomb())
        .pipe(autoprefixer('last 2 versions'))
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('assets/css'))
        .pipe(browserSync.reload({stream: true}));
});

gulp.task('browser-sync', function(){
    browserSync.init({
        server: {
            port: 8080,
            baseDir: './'
        }
    });
});

//
gulp.task('default', gulp.parallel('browser-sync', 'css-libs', function(){
    // gulp.watch('assets/sass/**/*.sass', gulp.series('sass'));
    gulp.watch('assets/sass/**/*.sass', gulp.series('css-libs'));
    gulp.watch('*.html', gulp.series('watch-html'));
    gulp.watch('assets/js/**/*.js', gulp.series('watch-js'));
}));