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
const sass = require("gulp-sass");
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
    fonts: {
        src: "./assets/fonts/*",
        dest: "./dist/fonts/"
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
    browsersync.reload();
    done();
}

// Clean Styles
function clean() {
    return del(["dist"]);
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
        .pipe(browsersync.stream());
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
        .pipe(browsersync.stream());
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
                imagemin.jpegtran({ progressive: true }),
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

// Package Fonts
function fonts() {
    return gulp.src(paths.fonts.src).pipe(gulp.dest(paths.fonts.dest));
}

// Watch Files
function watchFiles() {
    gulp.watch(paths.styles.src, styles);
    gulp.watch(paths.scripts.src, scripts);
    gulp.watch(paths.images.src, images);
    gulp.watch(paths.fonts.src, fonts);
    gulp.watch(paths.html.src, browserSyncReload);
}

const watch = gulp.parallel(watchFiles, browserSync);

// Build Assets
const build = gulp.series(
    clean,
    gulp.parallel(styles, scripts, scriptsVendor, images, fonts),
    watch
);

// Tasks
exports.clean = clean;
exports.styles = styles;
exports.scripts = scripts;
exports.images = images;
exports.fonts = fonts;
exports.watch = watch;
exports.build = build;

// Default Task
exports.default = build;
