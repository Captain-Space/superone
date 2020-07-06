<?php

require __DIR__.'/init.php';

if (!file_exists(ROOT.'config/base.php') or !file_exists(ROOT.'config/default.php')) {
    header('Location: /install.php');
    exit;
}

switch ($_SERVER['REQUEST_METHOD']) {
   case 'GET':
        break;
    case 'POST':
      break;
    default:
        route::any('{path:#all}', 'ApiController@'.$_SERVER["REQUEST_METHOD"]);exit;
        // require_once ROOT.'lib/api.php';//如果文件管理功能异常,注销上面用这个;
         exit;
}

/*
 *    系统后台

 */
route::group(function () {
    return $_COOKIE['admin'] == config('password');
}, function () {
    route::get('/logout', 'AdminController@logout');
    route::any('/admin/', 'AdminController@settings');
    route::any('/admin/cache', 'AdminController@cache');
    route::any('/admin/update', 'AdminController@update');
    route::any('/admin/show', 'AdminController@show');
    route::any('/admin/setpass', 'AdminController@setpass');
    route::any('/admin/images', 'AdminController@images');
    route::any('/admin/drives', 'AdminController@drives');
    route::any('/admin/sharepoint', 'AdminController@sharepoint');
    // route::any('/admin/upload', 'UploadController@index');
    //守护进程
    route::any('/admin/offline', 'AdminController@offline');
    route::any('/admin/upload/run', 'UploadController@run');
    //上传进程
    route::post('/admin/upload/task', 'UploadController@task');
});
//登陆
route::any('/login', 'AdminController@login');

//跳转到登陆
route::any('/admin/', function () {
    return view::direct(get_absolute_path(dirname($_SERVER['SCRIPT_NAME'])).'?/login');
});

define('VIEW_PATH', ROOT.'view/'.(config('style') ? config('style') : 'nexmoe').'/');
/**
 *    OneImg.
 */
$images = config('images@base');
if (($_COOKIE['admin'] == config('password') || $images['public'])) {
    route::any('/'.$驱动器.'/images', 'ImagesController@index');
    if ($images['home']) {
        route::any('/', 'ImagesController@index');
    }
}

route::any('{path:#all}', 'IndexController@index');

$etime = microtime(true); //获取程序执行结束的时间

$total = $etime - $stime;   //计算差值

?><?php if(is_login()){
    
    echo '<div style="float:center;text-align:center"><font color=red">php 运行时间'.$total.'秒</font> <div>
    ';
    
}?>

<?php if(config("superload")): ?>
<div style="float:right;text-align:center">超级预览模式流量计费请勿开启<div>

<?php endif?>

