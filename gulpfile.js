const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const autoprefixer = require('gulp-autoprefixer');
const plumber = require('gulp-plumber');
const concat = require('gulp-concat');
const notify = require('gulp-notify');

gulp.task('sass', (done) => {
	gulp.src(['./assets/src/_scss/*.scss'])
		.pipe(
			plumber({
				errorHandler: notify.onError('<%= error.message %>'),
			})
		)
		.pipe(
			sass({
				errLogToConsole: true,
				outputStyle: 'compressed',
			})
		)
		.pipe(autoprefixer())
		.pipe(gulp.dest('./assets/build/css/'));
	done();
});

gulp.task('dist', function (done) {
	const files = gulp.src(
		[
			'./assets/**',
			'./languages/**',
			'./vendor/**',
			'./**/*.php',
			'./**/*.txt',
			'!./tests/**',
			'!./dist/**',
			'!./node_modules/**'
		], {
		base: './'
	  }
	)
	files.pipe(gulp.dest('dist/lightning-g3-valkyrie'));
	done();
  });
