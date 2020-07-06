<?php 
class filecache_{
	private $cache_path;
	
	function __construct($cache_path= null){
		if(empty($cache_path)){
			$cache_path = CACHE_PATH;
		}
		$this->cache_path = $cache_path;
	}

	function get($key){
	//	$file = $this->cache_path . md5($key) . '.php';

	$key=str_replace("/","-",$key);
	$file = $this->cache_path . urldecode($key). '.php';
		$data = @include $file;
		//如果能获取到缓存，且未超时，则返回。
		if( is_array($data) && $data['expire'] > time() && !is_null($data['data']) ){
			return $data['data'];
		}else{
			return null;
		}
	}

	function set($key, $value=null, $expire=99999999){
	    $key=str_replace("/","-",$key);
	    	$file = $this->cache_path . urldecode($key) . '.php';
		//$file = $this->cache_path . md5($key) . '.php';
			if(is_login()){	
			    	$data['expire'] = time() + 600;
			    }else{
			        $data['expire'] = time() + $expire;
			    }
		
		$data['time']=time();
		$data['data'] = $value;
		return @file_put_contents($file, "<?php return " . var_export($data, true) . ";", FILE_FLAGS);
	}

	function clear(){
		array_map('unlink', glob($this->cache_path.'*.php'));
	}
	function gettime($key){
		$key=str_replace("/","-",$key);
	$file = $this->cache_path . urldecode($key). '.php';
		$data = @include $file;
		//如果能获取到缓存，则返回。
		if(is_array($data)){
			return $data['time'];
		}else{
			return null;
		}
	}
}