const { series, parallel, src , dest , watch} = require('gulp');
const browserSync = require('browser-sync').create();
const sass  = require('gulp-sass');

// Static Server + watching scss/html files
function serve(cb){
  browserSync.init({
      proxy: "/admin2",
      files: ['/css'],
      serveStatic: ['/css'],
      rewriteRules:[
        {
          match: new RegExp('admin.css'),
          fn: function() {
              return `/css/admin.css`;
          }
        }
      ]
  });

  watch("build/sass/*.scss", { events: 'change' } ,function(cb){
    compile();
    series(browserSync.reload);
    cb();
  });

  cb();
}

// Compile sass into CSS & auto-inject into browsers
function compile(cb) {
  return src("build/sass/*.scss")
      .pipe(sass())
      .pipe(dest("css"))
      .pipe(browserSync.stream());
  cb();
}

// gulp.task('default', ['serve']);
// exports.build = series(compile, serve);

exports.default = series(serve);
