var gulp = require('gulp'),
    gutil = require('gulp-util'),
    compass = require('gulp-compass'),
    connect = require('gulp-connect'),
    gulpif = require('gulp-if'),
    uglify = require('gulp-uglify'),
    minifyHTML = require('gulp-minify-html'),
    concat = require('gulp-concat');

var env,
    cssStyle,
    outputDir;

env='dev';
if( env === 'production'){
    outputDir ="assets";
    cssStyle ="compressed";
}else{
    outputDir ="assets";
    cssStyle ="expanded";
}

// sources
jsSources = [
    '_/scripts/myscripts.js'
];
sassSources =[
    '_/sass/style.scss'
];

gulp.task('js', function(){
   gulp.src(jsSources)
    .pipe( concat('script.js') )
    .pipe( gulpif( env === 'production', uglify() ) )
    .pipe( gulp.dest( outputDir+'/js' ) )
    .pipe(connect.reload());
});

gulp.task('compass', function() {
  gulp.src(sassSources)
    .pipe(compass({
      sass: '_/sass',
      image: outputDir+'/images',
      style: cssStyle
    })
    .on('error', gutil.log))
    .pipe(gulp.dest( outputDir+'/css' ))
    .pipe(connect.reload());;
});


gulp.task('watch', function() {
  gulp.watch(jsSources, ['js']);
  gulp.watch('_/sass/*.scss', ['compass']);
//  gulp.watch('builds/development/*.html', ['html']);
});

gulp.task('html', function() {
  gulp.src('builds/development/*.html')
    .pipe(gulpif(env === 'production', minifyHTML()))
    .pipe(gulpif(env === 'production', gulp.dest(outputDir)))
    .pipe(connect.reload())
});

gulp.task('connect', function() {
  connect.server({
    root: './',
    livereload: true
  });
});

gulp.task('default', [ 'js', 'compass', 'watch', 'connect', 'watch']);

//
//var env,
//    jsSources,
//    sassSources,
//    htmlSources,
//    jsonSources,
//    outputDir,
//    sassStyle;
//
//env = process.env.NODE_ENV || 'development';
//
//if (env==='development') {
//  outputDir = 'builds/development/';
//  sassStyle = 'expanded';
//} else {
//  outputDir = 'builds/production/';
//  sassStyle = 'compressed';
//}
//
//
//jsSources = [
//  'components/scripts/jquery.js',
//  'components/scripts/bootstrap.js',
//  'components/scripts/myscripts.js'
//];
//sassSources = ['components/sass/style.scss'];
//htmlSources = [outputDir + '*.html'];
//
//
//gulp.task('js', function() {
//  gulp.src(jsSources)
//    .pipe(concat('script.js'))
//    .pipe(browserify())
//    .pipe(gulpif(env === 'production', uglify()))
//    .pipe(gulp.dest(outputDir + 'js'))
//    .pipe(connect.reload())
//});
//

//
//gulp.task('watch', function() {
//  gulp.watch(jsSources, ['js']);
//  gulp.watch('components/sass/*.scss', ['compass']);
//  gulp.watch('builds/development/*.html', ['html']);
//});
//
//gulp.task('connect', function() {
//  connect.server({
//    root: outputDir,
//    livereload: true
//  });
//});
//
//gulp.task('html', function() {
//  gulp.src('builds/development/*.html')
//    .pipe(gulpif(env === 'production', minifyHTML()))
//    .pipe(gulpif(env === 'production', gulp.dest(outputDir)))
//    .pipe(connect.reload())
//});
//
//
//gulp.task('default', ['html', 'js', 'compass', 'connect', 'watch']);