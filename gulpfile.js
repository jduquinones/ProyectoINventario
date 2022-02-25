const { src, dest, watch , parallel } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const autoprefixer = require('autoprefixer');
const postcss    = require('gulp-postcss')
const sourcemaps = require('gulp-sourcemaps')
const cssnano = require('cssnano');
const concat = require('gulp-concat');
const terser = require('gulp-terser-js');
const rename = require('gulp-rename');
const imagemin = require('gulp-imagemin');
const notify = require('gulp-notify');
const cache = require('gulp-cache');
const webp = require('gulp-webp');

const patch = {
    scss: 'src/scss/**/*.scss',
    js: 'src/js/**/*.jks',
    imagenes: 'src/img/**/*'
}

// CSS es una funcion que se puede llamar automaticamente

function css() {
    return src(patch.scss)
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(postcss([autoprefixer(), cssnano()]))
        // .pipe(postcss([autoprefixer()]))
        .pipe(sourcemaps.write('.'))
        .pipe( dest('./build/css') );
}

function javascript() {
    return src(patch.js)
        .pipe(sourcemaps.init())
        .pipe(concat('bundle.js')) //Nombre del archivo final
        .pipe(terser())
        .pipe(sourcemaps.write('.'))
        .pipe(rename({suffix: '.min'}))
        .pipe(dest('./build/js'));
}

function imagenes() {
    return src(patch.imagenes)
        .pipe(cache(imagemin({optimizationLevel: 3})))
        .pipe(dest('build/img'))
        .pipe(notify({message: 'Imagen Completa'}));
}

function versionWebp() {
    return src(patch.imagenes)
        .pipe(webp())
        .pipe(dest('build/img'))
        .pipe(notify({message: 'Imagen Completa'}));
}

function watchArchivo() {
    watch(patch.scss, css);
    watch(patch.js, javascript);
    watch(patch.imagenes, imagenes);
    watch(patch.imagenes, versionWebp);
}

exports.default = parallel(css, javascript, imagenes, versionWebp,watchArchivo);