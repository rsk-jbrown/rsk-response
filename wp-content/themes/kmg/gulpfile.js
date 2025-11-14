const autoprefixer = require("autoprefixer");
const babel = require("gulp-babel");
const browsersync = require("browser-sync").create();
const concat = require("gulp-concat");
const cssnano = require("cssnano");
const del = require("del");
const gulp = require("gulp");
const imagemin = require("gulp-imagemin");
const newer = require("gulp-newer");
const plumber = require("gulp-plumber");
const postcss = require("gulp-postcss");
const rename = require("gulp-rename");
const sass = require("gulp-sass")(require('sass'));
const sourcemaps = require("gulp-sourcemaps");
const uglify = require("gulp-uglify");

const paths = {
    styles: {
        src: "./assets/styles/**/*.scss",
        dest: "./dist/styles/"
    },
    scripts: {
        src: "./assets/scripts/custom/**/*.js",
        dest: "./dist/scripts/"
    },
    scriptsVendor: {
        src: "./assets/scripts/vendor/**/*.js",
        dest: "./dist/scripts/"
    },
    images: {
        src: "./assets/images/*",
        dest: "./dist/images/"
    },
    html: {
        src: ["./*.php", "./lib/**/*"]
    }
};

// BrowserSync
function browserSync(done) {
    browsersync.init({
        proxy: "http://localhost:8000"
    });
    done();
}

// BrowserSync Reload
function browserSyncReload(done) {
    //browsersync.reload();
    done();
}


// Optimize Styles
function styles() {
    const plugins = [
        autoprefixer({ browsers: ["last 2 versions"] }),
        cssnano()
    ];
    return gulp
        .src(paths.styles.src)
        .pipe(
            plumber({
                errorHandler: function(err) {
                    console.log(err);
                    this.emit("end");
                }
            })
        )
        .pipe(sourcemaps.init())
        .pipe(sass({ outputStyle: "expanded" }))
        .pipe(postcss(plugins))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(paths.styles.dest))
        .pipe(rename({ suffix: ".min" }))
        .pipe(gulp.dest(paths.styles.dest))
        //.pipe(browsersync.stream());
}

// Optimize Scripts
function scripts() {
    return gulp
        .src(paths.scripts.src, { sourcemaps: true })
        .pipe(
            plumber({
                errorHandler: function(err) {
                    console.log(err);
                    this.emit("end");
                }
            })
        )
        .pipe(babel({ presets: ["@babel/env"] }))
        .pipe(
            uglify({
                compress: {
                    unused: false
                }
            })
        )
        .pipe(concat("main.min.js"))
        .pipe(gulp.dest(paths.scripts.dest))
       // .pipe(browsersync.stream());
}

function scriptsVendor() {
    return gulp
        .src(paths.scriptsVendor.src, { sourcemaps: true })
        .pipe(
            plumber({
                errorHandler: function(err) {
                    console.log(err);
                    this.emit("end");
                }
            })
        )
        .pipe(
            uglify({
                compress: {
                    unused: false
                }
            })
        )
        .pipe(concat("vendor.min.js"))
        .pipe(gulp.dest(paths.scripts.dest));
}

// Optimize Images
function images() {
    return gulp
        .src(paths.images.src)
        .pipe(newer(paths.images.dest))
        .pipe(
            imagemin([
                imagemin.gifsicle({ interlaced: true }),
                imagemin.mozjpeg({ progressive: true }),
                imagemin.optipng({ optimizationLevel: 5 }),
                imagemin.svgo({
                    plugins: [
                        {
                            removeViewBox: false,
                            collapseGroups: true
                        }
                    ]
                })
            ])
        )
        .pipe(gulp.dest(paths.images.dest));
}


// Watch Files
function watchFiles() {
    gulp.watch(paths.styles.src, styles);
    gulp.watch(paths.scripts.src, scripts);
    gulp.watch(paths.images.src, images);
   // gulp.watch(paths.html.src, browserSyncReload);
}

const watch = gulp.parallel(watchFiles);

// Build Assets
const build = gulp.series(
    gulp.parallel(styles, scripts, scriptsVendor, images),
    watch
);

// Tasks
exports.styles = styles;
exports.scripts = scripts;
exports.images = images;
exports.watch = watch;
exports.build = build;

// Default Task
exports.default = build;
