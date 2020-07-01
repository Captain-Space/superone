<!--<?php if($_REQUEST["type"]!="json"): ?>-->
<!DOCTYPE html>
<html>

    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="renderer" content="webkit" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
    <title><?php e($title.' - '.config('site_name'));?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mdui@0.4.3/dist/css/mdui.min.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aplayer/dist/APlayer.min.css">
    <script src="https://cdn.jsdelivr.net/npm/mdui@0.4.3/dist/js/mdui.min.js"></script>
    <script src="//cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/aplayer/dist/APlayer.min.js"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/clipboard.js/2.0.6/clipboard.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/axios/axios@0.19.2/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
  
    <style>
        .mc-drawer {
            background-color: rgba(255, 255, 255, 0.5);
<?php if( oneindex::is_mobile()): ?>
 background-color: rgba(255, 255, 255, 0.8);
<?php endif ?>
        }
 <?php if( !oneindex::is_mobile()): ?>
        .mdui-toolbar {

            background-image: url(<?php echo config("bgimg")?>) !important;
            color: #FFF;

        }

<?php endif?>

 <?php if( oneindex::is_mobile()): ?>
        .mdui-toolbar {

            background-image: url(<?php echo config("mobileimg")?>) !important;
            color: #FFF;

        }

<?php endif?>
        .mdui-toolbar>* {
            padding: 0 6px;
            margin: 0 2px;
            opacity: 0.5;
        }

        .mdui-toolbar>.mdui-typo-headline {
            padding: 0 1px 0 0;
        }

        .mdui-toolbar>i {
            padding: 0;
        }

        .mdui-toolbar>a:hover,
        a.mdui-typo-headline,
        a.active {
            opacity: 1;
        }

        .mdui-container {
            max-width: 950px;
        }

        .mdui-list-item {
            -webkit-transition: none;
            transition: none;
        }

        .mdui-list>.th {
            background-color: initial;
        }

        .mdui-list-item>a {
            width: 100%;
            line-height: 45px
        }

        .mdui-row>.mdui-list>.mdui-list-item {
            margin: 0px 0px 0px 0px;
            padding: 0;
           
        }
	
        .mdui-toolbar>a:last-child {
            opacity: 1;
        }

        #instantclick-bar {
            background: white;

        }

        .mdui-video-fluid {
            height: -webkit-fill-available;
        }

        .dplayer-video-wrap .dplayer-video {
            height: -webkit-fill-available !important;
        }

        .gslide iframe,
        .gslide video {
            height: -webkit-fill-available;
        }

        @media screen and (max-width:950px) {
            .mdui-list-item .mdui-text-right {
                display: none;
            }

            .mdui-container {
                width: 100% !important;
                margin: 0px;
            }

            .1111mdui-toolbar>* {
                display: none;
            }

            .mdui-toolbar>a:last-child,
            .mdui-toolbar>a:nth-last-of-type(2),
            .mdui-toolbar>.mdui-typo-headline,
            .mdui-toolbar>i:first-child,
            .mdui-toolbar-spacer {
                display: block;
            }
        }

        .spec-col {
            padding: .9em;
            display: flex;
            align-items: center;
            white-space: nowrap;
            flex: 1 50%;
            min-width: 225px
        }

        .spec-type {
            font-size: 1.35em
        }

        .spec-value {
            font-size: 1.25em
        }

        .spec-text {
            float: left
        }

        .device-section {
            padding-top: 30px
        }

        .spec-device-img {
            height: auto;
            height: 340px;
            padding-bottom: 30px
        }

        #dl-header {
            margin: 0
        }

        #dl-section {
            padding-top: 10px
        }

        #dl-latest {
            position: relative;
            top: 50%;
            transform: translateY(-50%)
        }

        .mdui-typo.mdui-shadow-3 {
            background-color: rgba(255, 255, 255, 0.5);
        }

        .nexmoe-item {
            background-color: rgba(255, 255, 255, 0.5);
        }

        .mdui-row {
            margin-right: 1px;
            margin-left: 1px;
        }

        body {
            width: -webkit-fill-available;
            height: -webkit-fill-available;
            background-size: cover;
            <?php if( !oneindex::is_mobile()): ?> background-image: url(<?php echo config("bgimg")?>) !important;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            <?php else: ?> background-image: url(<?php echo config("mobileimg")?>) !important;
            background-position: center ;
            background-attachment: fixed;
            background-repeat: no-repeat;
            <?php endif?>
        }
        
         .thumb .th {
            display: none;
        }

        .thumb .mdui-text-right {
            display: none;
        }

        .thumb .mdui-list-item a,
        .thumb .mdui-list-item {
            width: 213px;
            height: 230px;
            float: left;
            margin: 10px 10px !important;
        }

        .thumb .mdui-col-xs-12,
        .thumb .mdui-col-sm-7 {
            width: 100% !important;
            height: 230px;
        }

        .thumb .mdui-list-item .mdui-icon {
            font-size: 100px;
            display: block;
            margin-top: 40px;
            color: #7ab5ef;
        }

        .thumb .mdui-list-item span {
            float: left;
            display: block;
            text-align: center;
            width: 100%;
            position: absolute;
            top: 180px;
        }

        .thumb .forcedownload {
            display: none;
        }

        .mdui-checkbox-icon::after {
            border-color: transparent;
        }
        .mdui-fab-fixed, .mdui-fab-wrapper {
   
    bottom: 64px;
}
        
        
    </style>
</head>

    <body class="mdui-drawer-body-left  ">
        <div class=" mdui-appbar-with-toolbar  mdui-theme-accent-pink mdui-theme-primary-indigo">
        <div class="mdui-appbar mdui-appbar-fixed mdui-color-theme-blue">
            <div class="mdui-toolbar mdui-color-blue"><button mdui-drawer="{target: '.mc-drawer', swipe: true}"
                    class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white"><i
                        class="mdui-icon material-icons">menu</i></button>
                        
                        	<div class="mdui-toolbar-spacer"></div>


                            <div id ="mangger" class="mdui-float-right " style="<?php  if($_COOKIE["moveitem"]): ?>display:block<?php endif;?><?php  if($_COOKIE["moveitem"]==""): ?>display:none<?php endif;?>">

<button class="mdui-btn mdui-btn-icon  "onclick="moveitem()"><i class="mdui-icon material-icons">content_cut</i></button>
<button class="mdui-btn mdui-btn-icon  " onclick="dellistitem()"><i class="mdui-icon material-icons">delete</i></button>
<button class="mdui-btn mdui-btn-icon  " onclick="pastitem()"><i class="mdui-icon material-icons">content_paste</i></button>

<button class="mdui-btn mdui-btn-icon"  oneclick="downall()"><i class="mdui-icon material-icons">share</i></button>

                        </div>
             <!--   <div class="mdui-typo-title mdui-hidden-xs-down">首页</div>
                <div class="mdui-toolbar-spacer"></div>
                <div class="mc-login-btn mdui-btn mdui-btn-dense mdui-ripple mdui-ripple-white">登录</div>
                <div class="mc-register-btn mdui-btn mdui-btn-dense mdui-ripple mdui-ripple-white">注册</div>
                -->
                
                
                
            </div>
        </div>


        <div class="mc-drawer mdui-drawer">
            <div class="mdui-list">
                <a class="mdui-list-item mdui-ripple " href="/"><i
                        class="mdui-list-item-icon mdui-icon material-icons">home</i>
                    <div class="mdui-list-item-content">首页</div>
                </a>
                <a class="mdui-list-item mdui-ripple" href="/questions"><i
                        class="mdui-list-item-icon mdui-icon material-icons">forum</i>
                    <div class="mdui-list-item-content">问答</div>
                </a>
                <a href="/docs" class="mdui-list-item mdui-ripple"><i
                        class="mdui-list-item-icon mdui-icon material-icons">book</i>
                    <div class="mdui-list-item-content">开发文档</div>
                </a>
                <a href="/design" class="mdui-list-item mdui-ripple"><i
                        class="mdui-list-item-icon mdui-icon material-icons">layers</i>
                    <div class="mdui-list-item-content">设计规范</div>
                </a>


                <?php 
		
		$filess = scandir(ROOT."config/");
 foreach ($filess as $part) {
        if ('.' == $part) continue;
        if ('..' == $part) continue;
        if ('default.php' == $part) continue;
         if ('uploads.php' == $part) continue;
          if ('uploaded.php' == $part) continue;
           if ('base.php' == $part) continue;
        else {
             $v=str_replace(".php","",$part);
          echo '
    <a href="/'.$v.'/" class="mdui-list-item mdui-ripple">
			<i class="mdui-list-item-icon mdui-icon material-icons">cloud</i>
			<div class="mdui-list-item-content">'.$v.'</div>
		</a>
    ';
        }}

	if($_COOKIE["admin"]==config("password@base"))	
	echo'
	  
		<a href="/install.php" class="mdui-list-item mdui-ripple">
			<i class="mdui-list-item-icon mdui-icon material-icons">home</i>
			<div class="mdui-list-item-content">添加新盘</div>
		</a>
	
	';
		
		
		?>

                <?php e(config('drawer'));?>

                <a href="https://github.com/742481030/oneindex" class="mdui-list-item mdui-ripple">
                    <i class="mdui-list-item-icon mdui-icon material-icons">code</i>
                    <div class="mdui-list-item-content">Github</div>
                </a>
            </div>
            <div class="copyright">1111111</div>
        </div>






    </div>
        <div class="mdui-container">

            <div class="mdui-container-fluid"></div>
            <htmlhtml id="htmlhtml">
                <?php endif?><?php view::section('content');?>
            <?php if($_REQUEST["type"]!="json"): ?>
            </htmlhtml>
    </div>

 <ul class="mdui-menu" id="menu">
        <li class="mdui-menu-item">
            <a href="javascript:;" onclick="share()" ; class="mdui-ripple">分享链接</a>
        </li>
        <li class="mdui-menu-item">
            <a href="javascript:;" onclick="deldel()" ; class="mdui-ripple">刷新</a>
        </li>
        <?php if(is_login()): ?>
        <li class="mdui-menu-item">
            <a href="javascript:;" class="mdui-ripple" onclick="renamebox()" ;>重命名</a>
        </li>
        <li class="mdui-menu-item">
            <a href="javascript:;" class="mdui-ripple" onclick="delitem()" ;>删除</a>
        </li>
        <li class="mdui-menu-item">
            <a href="/admin" class="mdui-ripple" onclick="changebg()">更换背景</a>
        </li>
        <?php endif;?>
        <li class="mdui-menu-item">
            <a href="/admin" class="mdui-ripple">系统设置</a>
        </li>
    </ul>
        <upload>

        <div class="mdui-dialog mdui-dialog-open" id="exampleDialog" style="top: 89.703px; display: none; height:auto;">
            <div class="mdui-dialog-content" style="height: 665.594px;">
                <div class="mdui-dialog-title">文件上传</div>

                <div id="upload_div" style="margin:0 0 16px 0;">
                    <div id="upload_btns" align="center" style="display:none" ;>
                        <select onchange="document.getElementById('upload_file').webkitdirectory=this.value;">
                            <option value="">上传文件</option>
                            <option value="1">上传文件夹</option>
                        </select>
                        <input id="upload_file" type="file" name="upload_filename" multiple="multiple"
                            class=" layui-btn" onchange="preup();">
                        <input id="upload_submit" onclick="preup();" value="上传" type="button">
                    </div>
                </div>
                <br><br><br><br><br><br><br><br>
            </div>
            <div class="mdui-dialog-actions">

                <button class="mdui-btn mdui-ripple" mdui-dialog-confirm="" onclick="uploadkill()">完成上传</button>
            </div>
        </div>




    </upload>
    </body>

    <footer>


       

        
        
        <script src="/view/nexmoe/manger.js"></script>

       
    </footer>

</html>
<?php endif?>