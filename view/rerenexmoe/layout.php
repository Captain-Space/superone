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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/742481030/cdnimg@master/nexmoe.style.css">
  <style>

body {
	background-color: #fff;
	background-image:url(https://cdn.jsdelivr.net/gh/742481030/cdnimg@master/E2JNM8.jpg) !important;
	padding-bottom: 60px;
	background-position:auto!important;
	background-size: cover !important;
	background-attachment: fixed !important;
	background-repeat: no-repeat !important;
}
  
   @media screen and (max-width:980px) {
            .mdui-list-item .mdui-text-right {
               display: none;
            }
  
@media screen and (max-device-width:980px){
   body {
	background-image:url(https://ae01.alicdn.com/kf/H53a20f9dcdb84181a24adbcc1a3fbf062.jpg) !important;
	background-position:auto!important;
	background-size: cover !important;
	background-attachment: fixed !important;
	background-repeat: no-repeat !important;
		}

}
 
 
 

     .mdui-toolbar {
    width: 100%;
    margin-top: 1rem!important/*链接导航高度*/;
}   
        
        
        .forcedownload{display:none;}
      
         .thumb .forcedownload {
            display: none;
        }
        
         .thumb .th {
            display: none;
        }
</style>


<body class="mdui-theme-primary-blue-grey mdui-theme-accent-blue">

   


  		<div class="navSize">
			<a href="/"><img class="avatar" src="//q.qlogo.cn/g?b=qq&nk=5598786&s=100"/></a>
			
			
<!--	<center>
<a href="/"><button class="btn btn-gradient">
  首页
</button></a>
<a href="//youqv.com"><button class="btn btn-gradient">
  博客
</button></a>
<a href="/images"><button class="btn btn-gradient">
  图床
</button></a>
</center>	-->	
			
			
			<div class="navRight">
				<ul class="navul">
					<li class="navli"><a href="#" target="_blank">博客</a></li>
					<li class="navli"><a href="/login">登陆</a></li>
				</ul>
				<div class="icon"></div>
			</div>
		</div>          

  
</head>

    	<div class="mdui-container">
	    <div class="mdui-container-fluid">
	    <div class="mdui-toolbar nexmoe-item">
			<a href="/"><?php e(config('site_name'));?></a>
			<?php foreach((array)$navs as $n=>$l):?>
			<i class="mdui-icon material-icons mdui-icon-dark" style="margin:0;">chevron_right</i>
			<a href="<?php e("/".$驱动器.$l);?>"><?php e($n);?></a>
			<?php endforeach;?>
			<!--<a href="javascript:;" class="mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">refresh</i></a>-->
		</div>
		</div>
    	<?php view::section('content');?>
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
  	
  	<div id="blog">
  	<div id="comeIn">
  	<center>
  	    <a href="/" target="_blank" class="links" id="a1">🍭主站</a><a class="links"> ・ </a>
  	    <?php 
		
	$filess = scandir(ROOT."config/");
    foreach ($filess as $part) {
        if ('.' == $part ||'..' == $part||'default1.php' == $part||'default.php' == $part||'uploads.php' == $part||'uploaded.php' == $part||'base.php' == $part||".DS_Store"==$part) continue;
        else {
             $v=str_replace(".php","",$part);
             echo'<a class="links" href="/'.$v.'/" target="_blank" id="a2">'.$v.'</a>';
     
	    	
             }
        
        }

	
?>
  	    
  	  
  	   <a class="links"> ・ </a>
  	     <a href="/"  class="links" id="a1">主题</a>
  	    </center>
  	</div>
  	</div>  	
   
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


      
 
         <script src="https://cdn.jsdelivr.net/combine/npm/mdui@0.4.3/dist/js/mdui.min.js,gh/mcstudios/glightbox/dist/js/glightbox.min.js,npm/aplayer/dist/APlayer.min.js,npm/js-cookie@2/src/js.cookie.min.js,gh/axios/axios@0.19.2/dist/axios.min.js,gh/newcdn/ui/js/dianjiyuanquan.js,gh/newcdn/ui/js/beijingzhuwang.js"></script>
       

          <script src="/view/nexmoe/manger.js"></script>
        

       
    </footer>

</html>
<?php endif?>