<?php if($_REQUEST["type"]!="json"): ?>
<!DOCTYPE html>
<html>

    <head>
    <meta charset="utf-8">
    <meta name="google" content="notranslate" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="renderer" content="webkit" />
    <link rel="preconnect" href="//cdn.jsdelivr.net">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
     <title><?php e($title.' - '.config('site_name'));?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mdui@0.4.3/dist/css/mdui.min.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aplayer/dist/APlayer.min.css">
  
  
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
            
background-position: center  0px;
background-size: cover;
        }
#menu {

            background-image: url(<?php echo config("bgimg")?>) !important;
            
background-position: center  0px;
background-size: cover;
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
            max-width: 1024px;
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

        @media screen and (max-width:800px) {
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

       html, body {
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
        <?php echo config("cssstyle");?>
        /* 自带样式 */
body {
	background-color: #FFF;
/*	padding-bottom: 60px; */
	background-position: center bottom;
	background-repeat: no-repeat;
	background-attachment: fixed
}

.nexmoe-item {
	margin: 20px -8px 0!important;
	padding: 15px!important;
	border-radius: 5px;
	background-color: #fff;
	-webkit-box-shadow: 1px 1px 20px 1px rgba(0,0,0,.05);
	box-shadow: 1px 1px 20px 1px rgba(0,0,0,.05);
	background-color: #fff
}

.mdui-img-fluid,.mdui-video-fluid {
	border-radius: 5px;
}

.mdui-list {
	padding: 0
}

.mdui-list-item {
	margin: 0!important;
	border-radius: 5px;
	padding: 0 10px 0 5px!important;
	border: 1px solid #eee;
	margin-bottom: 10px!important
}

.mdui-list-item:last-child {
	margin-bottom: 0!important
}

.mdui-list-item:first-child {
	border: none
}

.mdui-toolbar {
	width: auto;
	margin-top: 0px!important
}

.mdui-appbar .mdui-toolbar {
	height: 56px;
	font-size: 16px
}

.mdui-toolbar>* {
	padding: 0 6px;
	margin: 0 2px;
	opacity: .5
}

.mdui-toolbar>.mdui-typo-headline {
	padding: 0 16px 0 0
}

.mdui-toolbar>i {
	padding: 0
}

.mdui-toolbar>a:hover,a.mdui-typo-headline,a.active {
	opacity: 1
}

.mdui-container {
	max-width: 980px
}

.mdui-list>.th {
	background-color: initial
}

.mdui-list-item>a {
	width: 100%;
	line-height: 48px
}

.mdui-toolbar>a {
	padding: 0 16px;
	line-height: 30px;
	border-radius: 30px;
	border: 1px solid #eee
}

.mdui-toolbar>a:last-child {
	opacity: 1;
	background-color: #7e7e7e;
	color: #ffffff;
}

@media screen and (max-width:980px) {
	.mdui-list-item .mdui-text-right {
		display: none
	}

	.mdui-container {
		width: 100%!important;
		margin: 0
	}

	.mdui-toolbar>* {
		display: none
	}

	.mdui-toolbar>a:last-child,.mdui-toolbar>.mdui-typo-headline,.mdui-toolbar>i:first-child {
		display: block
	}
}
.mdui-theme-accent-blue .mdui-color-theme-accent {
  color: #fff !important;
  background-color: #35B995 !important;
}
.mdui-theme-accent-blue .mdui-typo a {
  color: #35B995;
}
.mdui-theme-accent-blue .mdui-typo a:before {
  background-color: #35B995;
}
.mdui-theme-accent-blue .mdui-textfield-focus .mdui-textfield-input {
  border-bottom-color: #35b995;
  -webkit-box-shadow: 0 1px 0 0 #35b995;
          box-shadow: 0 1px 0 0 #35b995;
}
.mdui-theme-accent-blue .mdui-textfield-focus .mdui-textfield-label,
.mdui-theme-accent-blue .mdui-textfield-focus .mdui-textfield-floating-label.mdui-textfield-focus .mdui-textfield-label,
.mdui-theme-accent-blue .mdui-textfield-focus .mdui-icon {
  color: #35B995;
}
.mdui-theme-primary-blue-grey .mdui-color-theme {
  color: #fff !important;
  background-color: #7e7e7e !important;
}
.mdui-typo code {
  padding: 2px 4px;
  color: #E67474;
  background-color: #f9f9f9;
  border-radius: 2px;
}
    </style>
</head>

    <body class=" mdui-loaded <?php if(config("appbar")):?>mdui-drawer-body-left<?endif?> ">
        <div class=" mdui-appbar-with-toolbar  mdui-color-theme mdui-color-theme">
        <div class="mdui-appbar mdui-appbar-fixed   mdui-theme-layout-["color"]">
            <div class="mdui-toolbar mdui-color-blue "><button mdui-drawer="{target: '.mc-drawer', swipe: true}"
                    class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white"><i
                        class="mdui-icon material-icons">menu</i></button>
                        
                        <!---------->
                    <div id="navess">   <?php foreach((array)$navs as $n=>$l):?>
                    <i class="mdui-icon material-icons mdui-icon-dark" style="margin:0;">chevron_right</i>
                    <a  href="<?php e("/".$驱动器.$l);?>"><?php e($n);?></a>
                    <?php endforeach;?></div>
		<!--------------->
                        	<div class="mdui-toolbar-spacer"></div>


                            <div id ="mangger" class="mdui-float-right " style="<?php  if($_COOKIE["moveitem"]): ?>display:block<?php endif;?><?php  if($_COOKIE["moveitem"]==""): ?>display:none<?php endif;?>">

<button class="mdui-btn mdui-btn-icon  "onclick="moveitem()"><i class="mdui-icon material-icons">content_cut</i></button>
<button class="mdui-btn mdui-btn-icon  " onclick="dellistitem()"><i class="mdui-icon material-icons">delete</i></button>
<button class="mdui-btn mdui-btn-icon  " onclick="pastitem()"><i class="mdui-icon material-icons">content_paste</i></button>

<button class="mdui-btn mdui-btn-icon"  oneclick="downall()"><i class="mdui-icon material-icons">share</i></button>

                      </div>
            
                 
                      <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white" mdui-dialog="{target: '#dialog-docs-theme'}" mdui-tooltip="{content: '设置主题'}"><i class="mdui-icon material-icons">color_lens</i></span>
                
            </div>
        </div>


        <div class="mc-drawer mdui-drawer <?php if(!config("appbar")):?>mdui-drawer-close<?endif?>">
            <div class="mdui-list">
                <a class="mdui-list-item mdui-ripple " href="/"><i
                        class="mdui-list-item-icon mdui-icon material-icons">home</i>
                    <div class="mdui-list-item-content">首页</div>
                </a>
 <?php 
		
	$filess = scandir(ROOT."config/");
    foreach ($filess as $part) {
        if ('.' == $part ||'..' == $part||'default.php' == $part||'default.php' == $part||'uploads.php' == $part||'uploaded.php' == $part||'base.php' == $part||".DS_Store"==$part) continue;
        else {
             $v=str_replace(".php","",$part);
        echo '<a href="/'.$v.'/" class="mdui-list-item mdui-ripple">
		    	<i class="mdui-list-item-icon mdui-icon material-icons">cloud</i>
			    <div class="mdui-list-item-content">'.$v.'</div>
	    	</a>';
             }
        
        }

	if($_COOKIE["admin"]==config("password@base"))	
	echo'<a href="/install.php" class="mdui-list-item mdui-ripple">
			<i class="mdui-list-item-icon mdui-icon material-icons">home</i>
			<div class="mdui-list-item-content">添加新盘</div>
		</a>';
?>
<?php e(config('drawer'));?><a href="https://github.com/742481030/oneindex" class="mdui-list-item mdui-ripple ">
                    <i class="mdui-list-item-icon mdui-icon material-icons">code</i>
                    <div class="mdui-list-item-content">Github</div>
                </a>
            </div>
            <div class="copyright"></div>
        </div>

    </div>
        <div class="mdui-container">

            <div class="mdui-container-fluid"></div>
            <list id="viewlist">
                <?php endif?><?php view::section('content');?>
            <?php if($_REQUEST["type"]!="json"): ?>
            </list>
    </div>

 <ul class="mdui-menu" id="menu">
     <?php  if($_COOKIE["moveitem"]): ?>
      <li class="mdui-menu-item">
            <a href="javascript:;" onclick="pastitem()" ; class="mdui-ripple">粘贴</a>
        </li>
        <?php endif;?>
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
            <a href="javascript:;" onclick="moveoneitem()" ; class="mdui-ripple">移动</a>
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
<zhuti>
    <div class="mdui-dialog" id="dialog-docs-theme">
  <div class="mdui-dialog-title">设置文档主题</div>
  <div class="mdui-dialog-content">

    <p class="mdui-typo-title">主题色</p>
    <div class="mdui-row-xs-1 mdui-row-sm-2 mdui-row-md-3">
      <div class="mdui-col">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-layout" value="" checked/>
          <i class="mdui-radio-icon"></i>
          Light
        </label>
      </div>
      <div class="mdui-col">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-layout" value="dark" />
          <i class="mdui-radio-icon"></i>
          Dark
        </label>
      </div>
    </div>

    <p class="mdui-typo-title mdui-text-color-theme">主色</p>
    <form class="mdui-row-xs-1 mdui-row-sm-2 mdui-row-md-3">
      <div class="mdui-col mdui-text-color-amber">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-primary" value="amber" />
          <i class="mdui-radio-icon"></i>
          Amber
        </label>
      </div>
      <div class="mdui-col mdui-text-color-blue">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-primary" value="blue" />
          <i class="mdui-radio-icon"></i>
          Blue
        </label>
      </div>
      <div class="mdui-col mdui-text-color-blue-grey">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-primary" value="blue-grey" />
          <i class="mdui-radio-icon"></i>
          Blue Grey
        </label>
      </div>
      <div class="mdui-col mdui-text-color-brown">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-primary" value="brown" />
          <i class="mdui-radio-icon"></i>
          Brown
        </label>
      </div>
      <div class="mdui-col mdui-text-color-cyan">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-primary" value="cyan" />
          <i class="mdui-radio-icon"></i>
          Cyan
        </label>
      </div>
      <div class="mdui-col mdui-text-color-deep-orange">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-primary" value="deep-orange" />
          <i class="mdui-radio-icon"></i>
          Deep Orange
        </label>
      </div>
      <div class="mdui-col mdui-text-color-deep-purple">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-primary" value="deep-purple" checked/>
          <i class="mdui-radio-icon"></i>
          Deep Purple
        </label>
      </div>
      <div class="mdui-col mdui-text-color-green">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-primary" value="green" />
          <i class="mdui-radio-icon"></i>
          Green
        </label>
      </div>
      <div class="mdui-col mdui-text-color-grey">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-primary" value="grey" />
          <i class="mdui-radio-icon"></i>
          Grey
        </label>
      </div>
      <div class="mdui-col mdui-text-color-indigo">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-primary" value="indigo" />
          <i class="mdui-radio-icon"></i>
          Indigo
        </label>
      </div>
      <div class="mdui-col mdui-text-color-light-blue">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-primary" value="light-blue" />
          <i class="mdui-radio-icon"></i>
          Light Blue
        </label>
      </div>
      <div class="mdui-col mdui-text-color-light-green">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-primary" value="light-green" />
          <i class="mdui-radio-icon"></i>
          Light Green
        </label>
      </div>
      <div class="mdui-col mdui-text-color-lime">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-primary" value="lime" />
          <i class="mdui-radio-icon"></i>
          Lime
        </label>
      </div>
      <div class="mdui-col mdui-text-color-orange">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-primary" value="orange" />
          <i class="mdui-radio-icon"></i>
          Orange
        </label>
      </div>
      <div class="mdui-col mdui-text-color-pink">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-primary" value="pink" />
          <i class="mdui-radio-icon"></i>
          Pink
        </label>
      </div>
      <div class="mdui-col mdui-text-color-purple">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-primary" value="purple" />
          <i class="mdui-radio-icon"></i>
          Purple
        </label>
      </div>
      <div class="mdui-col mdui-text-color-red">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-primary" value="red" />
          <i class="mdui-radio-icon"></i>
          Red
        </label>
      </div>
      <div class="mdui-col mdui-text-color-teal">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-primary" value="teal" />
          <i class="mdui-radio-icon"></i>
          Teal
        </label>
      </div>
      <div class="mdui-col mdui-text-color-yellow">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-primary" value="yellow" />
          <i class="mdui-radio-icon"></i>
          Yellow
        </label>
      </div>
    </form>

    <p class="mdui-typo-title mdui-text-color-theme-accent">强调色</p>
    <form class="mdui-row-xs-1 mdui-row-sm-2 mdui-row-md-3">
      <div class="mdui-col mdui-text-color-amber">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-accent" value="amber" />
          <i class="mdui-radio-icon"></i>
          Amber
        </label>
      </div>
      <div class="mdui-col mdui-text-color-blue">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-accent" value="blue" />
          <i class="mdui-radio-icon"></i>
          Blue
        </label>
      </div>
      <div class="mdui-col mdui-text-color-cyan">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-accent" value="cyan" />
          <i class="mdui-radio-icon"></i>
          Cyan
        </label>
      </div>
      <div class="mdui-col mdui-text-color-deep-orange">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-accent" value="deep-orange" />
          <i class="mdui-radio-icon"></i>
          Deep Orange
        </label>
      </div>
      <div class="mdui-col mdui-text-color-deep-purple">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-accent" value="deep-purple" />
          <i class="mdui-radio-icon"></i>
          Deep Purple
        </label>
      </div>
      <div class="mdui-col mdui-text-color-green">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-accent" value="green" />
          <i class="mdui-radio-icon"></i>
          Green
        </label>
      </div>
      <div class="mdui-col mdui-text-color-indigo">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-accent" value="indigo" />
          <i class="mdui-radio-icon"></i>
          Indigo
        </label>
      </div>
      <div class="mdui-col mdui-text-color-light-blue">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-accent" value="light-blue" />
          <i class="mdui-radio-icon"></i>
          Light Blue
        </label>
      </div>
      <div class="mdui-col mdui-text-color-light-green">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-accent" value="light-green" checked/>
          <i class="mdui-radio-icon"></i>
          Light Green
        </label>
      </div>
      <div class="mdui-col mdui-text-color-lime">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-accent" value="lime" />
          <i class="mdui-radio-icon"></i>
          Lime
        </label>
      </div>
      <div class="mdui-col mdui-text-color-orange">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-accent" value="orange" />
          <i class="mdui-radio-icon"></i>
          Orange
        </label>
      </div>
      <div class="mdui-col mdui-text-color-pink">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-accent" value="pink" />
          <i class="mdui-radio-icon"></i>
          Pink
        </label>
      </div>
      <div class="mdui-col mdui-text-color-purple">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-accent" value="purple" />
          <i class="mdui-radio-icon"></i>
          Purple
        </label>
      </div>
      <div class="mdui-col mdui-text-color-red">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-accent" value="red" />
          <i class="mdui-radio-icon"></i>
          Red
        </label>
      </div>
      <div class="mdui-col mdui-text-color-teal">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-accent" value="teal" />
          <i class="mdui-radio-icon"></i>
          Teal
        </label>
      </div>
      <div class="mdui-col mdui-text-color-yellow">
        <label class="mdui-radio mdui-m-b-1">
          <input type="radio" name="doc-theme-accent" value="yellow" />
          <i class="mdui-radio-icon"></i>
          Yellow
        </label>
      </div>
    </form>

  </div>
  <div class="mdui-divider"></div>
  <div class="mdui-dialog-actions">
    <button class="mdui-btn mdui-ripple mdui-float-left" mdui-dialog-cancel>恢复默认主题</button>
    <button class="mdui-btn mdui-ripple" mdui-dialog-confirm>ok</button>
  </div>
</div>

</zhuti>
    <footer>


      
 
         <script src="https://cdn.jsdelivr.net/combine/npm/mdui@0.4.3/dist/js/mdui.min.js,gh/mcstudios/glightbox/dist/js/glightbox.min.js,npm/aplayer/dist/APlayer.min.js,npm/js-cookie@2/src/js.cookie.min.js,gh/axios/axios@0.19.2/dist/axios.min.js"></script>
         
          <script src="/view/nexmoe/manger.js"></script>
        <script src="/view/nexmoe/docs.js"></script>

       
    </footer>

</html>
<?php endif?>