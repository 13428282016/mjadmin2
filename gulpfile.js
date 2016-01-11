/**
 * Created by wmj on 2015/12/17.
 */

var uglify = require('gulp-uglify'),
    gulp = require('gulp'),
    sourceMaps = require('gulp-sourcemaps'),
    webpack = require('webpack'),
    webpackDevServer = require('webpack-dev-server'),
    webpackConfig = require('./webpack.admin.config'),
    minifyCSS = require('gulp-minify-css'),
    less = require('gulp-less'),
    imageMin = require('gulp-imagemin'),
    autoPrefixer=require('gulp-autoprefixer'),
    concat=require('gulp-concat'),
    rename=require('gulp-rename');

gulp.task('admin:build:js', function (cb) {

    webpack(webpackConfig,function(err,stat){

       if(err){
           console.log(err);
           return;
       }
        gulp.src(['resources/assets/build/js/admin/bundles/**/*.js'])
            .pipe(sourceMaps.init())
            .pipe(uglify())
            .pipe(rename({extname:'.min.js'}))
            .pipe(sourceMaps.write('source_maps'))

            .pipe(gulp.dest('resources/assets/dist/js/admin'));
    });

});


gulp.task('admin:build:css:adminlte',function(cb){

 return    gulp.src('resources/assets/build/css/admin/less/admin-lte/AdminLTE.less')

        .pipe(less())
        .pipe(  autoPrefixer())
        .pipe(sourceMaps.init())

        .pipe(minifyCSS())
        .pipe(rename({extname:'.min.css'}))
        .pipe(sourceMaps.write('source_maps'))

        .pipe(gulp.dest('resources/assets/dist/css/admin'));

});

gulp.task('admin:build:css:skins',function(cb){

  return  gulp.src('resources/assets/build/css/admin/less/admin-lte/skins/*.less')
        .pipe(less())
        .pipe(  autoPrefixer())
        .pipe(sourceMaps.init())
        .pipe(minifyCSS())
        .pipe(rename({extname:'.min.css'}))


        .pipe(gulp.dest('resources/assets/dist/css/admin/skins'));

});


gulp.task('admin:build:css:minify',['admin:build:css:adminlte','admin:build:css:skins'],function(cb){

    return gulp.src(['resources/assets/build/css/admin/*.css'])
        .pipe(  autoPrefixer())
        .pipe(sourceMaps.init())
        .pipe(minifyCSS())
        .pipe(rename({extname:'.min.css'}))

        .pipe(sourceMaps.write('source_maps'))
        .pipe(gulp.dest('resources/assets/dist/css/admin'));


});

gulp.task('vendor:build:css:minify',[],function(){

    return gulp.src(['resources/assets/build/css/vendor/*.css'])
        .pipe(  autoPrefixer())
        .pipe(sourceMaps.init())
        .pipe(minifyCSS())
        .pipe(rename({extname:'.min.css'}))
        .pipe(sourceMaps.write('source_maps'))
        .pipe(gulp.dest('resources/assets/dist/css/vendor'));
});

gulp.task('admin:build:css:concat',['admin:build:css:minify','vendor:build:css:minify'],function(cb){

    return gulp.src(['resources/assets/dist/css/vendor/normalize.min.css','resources/assets/dist/css/admin/AdminLTE.min.css','resources/assets/dist/css/vendor/bootstrap.min.css','resources/assets/dist/css/admin/app.min.css','resources/assets/dist/css/vendor/font-awesome.min.css','resources/assets/dist/css/vendor/ionicons.min.css'])
        .pipe(sourceMaps.init())

        .pipe(concat('common.min.css'))
        .pipe(sourceMaps.write('source_maps'))
        .pipe(gulp.dest('resources/assets/dist/css/admin'));

});
gulp.task('admin:build:css',['admin:build:css:adminlte','admin:build:css:skins','admin:build:css:minify','admin:build:css:concat']);


gulp.task('build:font', function (cb) {

  return   gulp.src('resources/assets/build/fonts/*.*').
        pipe(gulp.dest('resources/assets/dist/fonts'))


});

gulp.task('admin:build:image', function (cb) {
  return   gulp.src('resources/assets/build/img/admin/*.*').
        pipe(imageMin()).
        pipe(gulp.dest('resources/assets/dist/img/admin'))

});


gulp.task('admin:build',['admin:build:js','admin:build:css','build:font','admin:build:image']);
gulp.task('server:webpack', function () {

    new webpackDevServer(webpack(webpackConfig), {
        publicPath: config.output.publicPath,
        hot: true,
        quiet: false,
        historyApiFallback: true,
        noInfo: false,
        stats: {color: true}

    }).listen(8080, 'localhost', function (err, result) {
            if (err) {
                console.log(err);
            }
            console.log('Listening at localhost:8080');
        })


});


/*

 laravel


 */

var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function (mix) {
    mix.sass('app.scss');
});


//一个包含任务列表的数组，这些任务会在你当前任务运行之前完成。
//
// gulp.task('mytask', ['array', 'of', 'task', 'names'], function() {
// // 做一些事
// });
// 注意： 你的任务是否在这些前置依赖的任务完成之前运行了？请一定要确保你所依赖的任务列表中的任务都使用了正确的异步执行方式：使用一个 callback，或者返回一个 promise 或 stream。
//
// 你也可以省略最后那个函数，如果你只是想要执行依赖的任务：
//
// gulp.task('mytask', ['array', 'of', 'task', 'names']);
// 注意： 这些任务会一次并发执行，因此，请不要假定他们会按顺序开始和结束。
//
// fn
//
// 该函数定义任务所要执行的一些操作。通常来说，它会是这种形式：gulp.src().pipe(someplugin())。
//
// 异步任务支持
//
// 任务可以异步执行，如果 fn 能做到以下其中一点：
//
// 接受一个 callback
//
// // 在 shell 中执行一个命令
// var exec = require('child_process').exec;
// gulp.task('jekyll', function(cb) {
// // 编译 Jekyll
// exec('jekyll build', function(err) {
// if (err) return cb(err); // 返回 error
// cb(); // 完成 task
// });
// });
// 返回一个 stream
//
// gulp.task('somename', function() {
// var stream = gulp.src('client/**/*.js')
//    .pipe(minify())
//    .pipe(gulp.dest('build'));
//return stream;
//});
//返回一个 promise
//
//var Q = require('q');
//
//gulp.task('somename', function() {
//    var deferred = Q.defer();
//
//    // 执行异步的操作
//    setTimeout(function() {
//        deferred.resolve();
//    }, 1);
//
//    return deferred.promise;
//});
//注意： 默认的，task 将以最大的并发数执行，也就是说，gulp 会一次性运行所有的 task 并且不做任何等待。如果你想要创建一个序列化的 task 队列，并以特定的顺序执行，你需要做两件事：
//
//给出一个提示，来告知 task 什么时候执行完毕，
//并且再给出一个提示，来告知一个 task 依赖另一个 task 的完成。
//对于这个例子，让我们先假定你有两个 task，"one" 和 "two"，并且你希望它们按照这个顺序执行：
//
//在 "one" 中，你加入一个提示，来告知什么时候它会完成：可以再完成时候返回一个 callback，或者返回一个 promise 或 stream，这样系统会去等待它完成。
//
//在 "two" 中，你需要添加一个提示来告诉系统它需要依赖第一个 task 完成。
//
//因此，这个例子的实际代码将会是这样：
//
//var gulp = require('gulp');
//
//// 返回一个 callback，因此系统可以知道它什么时候完成
//gulp.task('one', function(cb) {
//    // 做一些事 -- 异步的或者其他的
//    cb(err); // 如果 err 不是 null 或 undefined，则会停止执行，且注意，这样代表执行失败了
//});
//
//// 定义一个所依赖的 task 必须在这个 task 执行之前完成
//gulp.task('two', ['one'], function() {
//    // 'one' 完成后
//});
//
//gulp.task('default', ['one', 'two']);