'use strict';

var gulp = require( 'gulp' );
var sass = require('gulp-sass')(require('sass'));
var cleanCSS = require( 'gulp-clean-css' );
var rename = require( 'gulp-rename' );
var minify = require( 'gulp-minify' );
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');

var paths = {
	styles: {
		src: 'frontend/resources/sass/**/*.scss',
		dest: 'frontend/static/css/',
	},
	scripts: {
		src: 'frontend/resources/js/**/*.js',
		dest: 'frontend/static/js/',
	},
};

var componentPaths = {
	styles: {
		src: 'frontend/components/**/*.scss',
		dest: 'frontend/static/css/',
	},
	scripts: {
		src: 'frontend/components/**/*.js',
		dest: 'frontend/static/js/',
	},
};

var blocks = {
	styles: {
		src: 'acf/blocks/**/css/**/*.scss',
	},
	scripts: {
		src: 'acf/blocks/**/js/**/!(*.min)*.js',
	},
}

var sassOptions = {
	errLogToConsole: true,
	outputStyle: 'expanded',
};

/*
 * Define our tasks using plain functions
 */
function styles() {
	return gulp.src( paths.styles.src )
		.pipe( sass( sassOptions ).on( 'error', sass.logError ) )
		.pipe( cleanCSS( { compatibility: 'ie8' } ) )
		.pipe( rename( { suffix: '.min' } ) )
		.pipe( gulp.dest( paths.styles.dest ) );
}

function scripts() {
	return gulp.src( paths.scripts.src, { sourcemaps: true } )
    .pipe(uglify())
		.pipe( minify( {
			ext: {
				min: '.min.js',
			},
		} ) )
		.pipe( gulp.dest( paths.scripts.dest ) );
}

function componentStyles() {
	return gulp.src( componentPaths.styles.src )
		.pipe( sass( sassOptions ).on( 'error', sass.logError ) )
    .pipe( concat( 'components.css' ) )
		.pipe( cleanCSS( { compatibility: 'ie8' } ) )
		.pipe( rename( { suffix: '.min' } ) )
		.pipe( gulp.dest( componentPaths.styles.dest ) );
}

function componentScripts() {
	return gulp.src( componentPaths.scripts.src, { sourcemaps: true } )
    .pipe( concat( 'components.js' ) )
    .pipe( uglify() )
		.pipe( minify( {
			ext: {
				min: '.min.js',
			},
		} ) )
		.pipe( gulp.dest( componentPaths.scripts.dest ) );
}

function blockStyles() {
	return gulp.src( blocks.styles.src )
		.pipe( sass( sassOptions ).on( 'error', sass.logError ) )
		.pipe( cleanCSS( { compatibility: 'ie8' } ) )
		.pipe( rename( { suffix: '.min' } ) )
		.pipe(gulp.dest(function (file) {
			return file.base;
		}));
}

function blockScripts() {
	return gulp.src( blocks.scripts.src )
    .pipe(uglify())
		.pipe( minify( {
			ext: {
				min: '.min.js',
			},
			noSource: true,
		} ) )
		.pipe(gulp.dest(function (file) {
			return file.base;
		}));
}

const watch = async () => {
	gulp.watch( paths.scripts.src, scripts );
	gulp.watch( paths.styles.src, styles );
  gulp.watch( componentPaths.scripts.src, componentScripts );
	gulp.watch( componentPaths.styles.src, componentStyles );
	gulp.watch( blocks.scripts.src, blockScripts );
	gulp.watch( blocks.styles.src, blockStyles );
}

/*
 * Specify if tasks run in series or parallel using `gulp.series` and `gulp.parallel`
 */
var build = gulp.series( gulp.parallel( styles, scripts, blockScripts, blockStyles, componentStyles, componentScripts ) );

/*
 * CommonJS `exports` module notation to declare tasks
 */
exports.styles = styles;
exports.scripts = scripts;
exports.watch = watch;
exports.build = build;

/*
 * Define default task that can be called by just running `gulp` from cli
 */
exports.default = watch;
