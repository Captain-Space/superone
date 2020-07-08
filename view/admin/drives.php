<?php view::layout('layout')?>

<?php view::begin('content');?>
	<div class="mdui-typo">
	  <h1> 磁盘管理 <small>更多配置请编辑配置文件,添加新盘需要注销当前登陆账户或者隐私模式</small></h1>
	</div>
<a  href="/install.php" class="mdui-btn  mdui-color-theme-accent mdui-ripple"><i class="mdui-icon material-icons">add</i></a>
	<div class="mdui-divider-inset"></div>
	<div class="mdui-table-fluid">
  <table class="mdui-table">
    <thead>
      <tr>
        <th>#</th>
        <th>公开</th>
        <th>类型</th>
        <th>管理</th>
      </tr>
    </thead>
    <tbody>
    
     
     
     <?php 
  
  if($_GET["action"]=="del")
  {
      
     unlink(ROOT."config/".$_GET["name"].".php") ;
     header('Location: /admin/drives');
      
  }
  if($_GET["action"]=="share"){
      $data= config('@'.$_GET["name"]);
      if(config('@'.$_GET["name"])["share"]=="on")
      {
          $data["share"]="off";
          config('@'.$_GET["name"],$data);
       
      }else{
           $data["share"]="on";
           config('@'.$_GET["name"],$data);
      }
      
       header('Location: /admin/drives');
  }
  
  
  
  
  $filess = scandir(ROOT."config/");
    foreach ($filess as $part) {
        if ('base.php' == $part||'.' == $part ||'..' == $part||'uploads.php' == $part||'uploaded.php' == $part||".DS_Store"==$part) continue;
        else {
             $v=str_replace(".php","",$part);
             echo'  
      <tr>
        <td>'.$v.'</td>
        <td> <a href="/admin/drives?action=share&name='.$v.'">'.config('@'.$v)["share"].'</a></td>
        <td>'.config('@'.$v)["drivestype"].'</td>
        <td><a href="/admin/drives?action=del&name='.$v.'">删除</a></td>
      </tr>
     ';
     
	    	
             }
        
        }
  
  ?>
  
     
     
     
     
     
     
    </tbody>
  </table>
</div>

 
  
  
  
  
  
  
  
  
  
  
  
  
  
  


<?php view::end('content');?>