var gulp = require("gulp");
var replace = require("gulp-replace");

gulp.task('dist', function (done) {
	const files = gulp.src(
		[
			"./asetts/**",
			"./languages/**",
			"./vendor/**",
			"./**/*.php",
			"./**/*.txt",
			"!./tests/**",
			"!./dist/**",
			"!./node_modules/**"
		], {
		base: './'
	  }
	)
	files.pipe(gulp.dest("dist/lightning-g3-skin-sample"));
	done();
  });
