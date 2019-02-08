'use strict';

const gulp = require('gulp');
const sass = require('gulp-sass');
const sourcemaps = require('gulp-sourcemaps');
const autoprefixer = require('gulp-autoprefixer');
const webpack = require('webpack-stream');

sass.compiler = require('node-sass');

var scssSrc = './source/scss/app.scss';
var jsSrc = './source/js/app.js';
var cssDest = './public/css/';
var jsDest = './public/js/';

gulp.task('sass', function () {
  return gulp.src(scssSrc)
    .pipe(sourcemaps.init())
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
    .pipe(sourcemaps.write('./source/maps'))
    .pipe(gulp.dest(cssDest));
});

gulp.task('sass:watch', function () {
  gulp.watch('./source/scss/**/**/*.scss', ['sass']);
});

gulp.task('js', function() {
  return gulp.src(jsSrc)
    .pipe(webpack({
      output: {
        filename: 'app.js',
      },
      module: {
        rules: [{
          loader: 'babel-loader'
        }]
      }
    }))
    .pipe(gulp.dest(jsDest));
});

gulp.task('js:watch', function () {
  gulp.watch('./source/js/**/*.js', ['js']);
});

gulp.task('default', ['sass', 'js', 'sass:watch', 'js:watch']);
