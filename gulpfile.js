const gulp        = require('gulp');
const del         = require('del');
// const sass        = require('gulp-sass');
// const uglify      = require('gulp-uglify');
// const concat      = require('gulp-concat');
// const browserify  = require('browserify');
// const source      = require('vinyl-source-stream');
// const hbsfy       = require('hbsfy');


const libraries = function () {
    return del([ './public/components' ]).then(function () {
        return gulp.src([
            './node_modules/@bower_components/**/*',
        ], { base: 'node_modules/@bower_components' })
            .pipe(gulp.dest('./public/components/'));
    });
};

gulp.task('default', libraries);
