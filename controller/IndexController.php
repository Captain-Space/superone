<?php

class IndexController
{
    private $url_path;
    private $name;
    private $path;
    private $items;
    private $time;
    static $驱动器;
    static $请求路径;

     function __construct()
    {
        $requesturi = explode('/', $_SERVER['REQUEST_URI']);
        $驱动器 = $requesturi['1'];
        array_splice($requesturi, 0, 1);
        unset($requesturi['0']);

        $请求路径 = implode('/', $requesturi);
        $请求路径 = str_replace('?'.$_SERVER['QUERY_STRING'], '', $请求路径);

        if ($驱动器 == '') {
            $驱动器 = 'default';
        }
        self::$驱动器 = $驱动器;
        self::$请求路径 = $请求路径;
        //缓存路径不存在就创建
        if(is_login()){
             define('CACHE_PATH', ROOT.'cache/'.$驱动器.'-admin/');
        if (!file_exists(CACHE_PATH)) {
          
            mkdir(CACHE_PATH);
        }
        }else{
             define('CACHE_PATH', ROOT.'cache/'.$驱动器.'/');
        if (!file_exists(CACHE_PATH)) {
            mkdir(CACHE_PATH);
        }
        }
       
        //配置缓存类型
        cache::$type = empty(config('cache_type')) ? 'filecache' : config('cache_type');
        //加载配置文件
        if (file_exists(ROOT.'config/'.$驱动器.'.php')) {
            $配置文件 = include ROOT.'config/'.$驱动器.'.php';
        } elseif (!file_exists(ROOT.'config/base.php') or !file_exists(ROOT.'config/default.php')) {
            header('Location: /install.php');
        }

        //初始化配置文件start
        if ($配置文件['drivestype'] == 'cn') {
            onedrive::$api_url = 'https://microsoftgraph.chinacloudapi.cn/v1.0';
            onedrive::$oauth_url = 'https://login.partner.microsoftonline.cn/common/oauth2/v2.0';
        } else {
            onedrive::$api_url = 'https://graph.microsoft.com/v1.0';
            onedrive::$oauth_url = 'https://login.microsoftonline.com/common/oauth2/v2.0';
        }
        onedrive::$client_id = $配置文件['client_id'];
        onedrive::$client_secret = $配置文件['client_secret'];
        onedrive::$redirect_uri = $配置文件['redirect_uri'];
        onedrive::$typeurl = $配置文件['api'];
        onedrive::$access_token = access_token($配置文件, $驱动器);

        if (!is_login()) {
            if ($配置文件['share'] == 'off') {
                die('管理员可见') ;
                
            }
        }

        ///初始化配置文件完成

        //分页页数
        $this->z_page = config('page_item') ?? 200;
        $paths = explode('/', rawurldecode($请求路径));
        if (substr($_SERVER['REQUEST_URI'], -1) != '/') {
            $this->name = array_pop($paths);
        }

        preg_match_all("(\.page\-([0-9]*)/$)", get_absolute_path(join('/', $paths)), $mat);
        if (empty($mat[1][0])) {
            $this->page = 1;
        } else {
            $this->page = $mat[1][0];
        }
        $this->page = $_GET['page'] ?? '1';
        $this->url_path = preg_replace("(\.page\-[0-9]*/$)", '', get_absolute_path(join('/', $paths)));

        $this->path = get_absolute_path(config('onedrive_root').$this->url_path);
        //获取文件夹下所有元素
        $this->items = $this->items($this->path);
    }

    public function index()
    {
    header("X-Powered-By:  Shanghai Mingxin Technology Co., Ltd."); 
        header("Access-Control-Allow-Origin: *"); 
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS,VIEW"); 
        
        
        //验证缓存是否异常
        $this->checkcache();

        //是否404
        $this->is404();

        $this->is_password();
        //客户端缓存
        $this->clientcache();

        //输出目录或者文件
        if (!empty($this->name)) {//file
            return $this->file();
        } else {//dir
            return $this->dir();
        }
    }

    public function clientcache()
    {if($_COOKIE["moveitem"]){
        echo "文件管理模式";
        
    }else{
        if (!is_login()) {
            $interval = 1200; //20分钟不得超过token有效期
        }else{
               $interval = 300 ;//5分钟
        }

            if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE'])) {
                // HTTP_IF_MODIFIED_SINCE即下面的: Last-Modified,文档缓存时间.
                // 缓存时间+时长.
                $c_time = strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) + $interval;
                // 当大于当前时间时, 表示还在缓存中... 释放304
                if ($c_time > time()) {
                    header('HTTP/1.1 304 Not Modified');
                    exit();
                }
            }
            header('Cache-Control:max-age='.$interval);
            header('Expires: '.gmdate('D, d M Y H:i:s', time() + $interval).' GMT');
            header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');}
       
    }

    public function checkcache()
    {
        if (file_exists(ROOT.'config/'.self::$驱动器.'.php')) {
            if ($this->path == '/') {
                if ($this->items == null) {
                    
                    if (function_exists('opcache_reset')) {
                        opcache_reset();
                    }
                    // oneindex::refresh_cache(self::$请求路径);
                    //  header("refresh: 1");
                   
                   
                }
            }
        } else {
            http_response_code(404);
            view::load('404')->show();
            die();
        }
    }

    //判断是否加密
    public function is_password()
    {
        if (empty($this->items['.password'])) {
            return false;
        } else {
            $this->items['.password']['path'] = get_absolute_path($this->path).'.password';
        }

        $password = $this->get_content2($this->items['.password']);
        list($password) = explode("\n", $password);
        $password = trim($password);
        unset($this->items['.password']);
        if (!empty($password) && strcmp($password, $_COOKIE[md5($this->path)]) === 0) {
            return true;
        }

        $this->password($password);
    }

    public function password($password)
    {
        if (!empty($_REQUEST['password']) && strcmp($password, $_REQUEST['password']) === 0) {
            setcookie(md5($this->path), $_POST['password']);

            return true;
        }
        $navs = $this->navs();
        echo view::load('password')->with('navs', $navs);
        exit();
    }

    //文件
    public function file()
    {
        $item = $this->items[$this->name];
        if ($item['folder']) {//是文件
            $url = $_SERVER['REQUEST_URI'].'/';
        } elseif (!is_null($_GET['t'])) {//缩略图
            $url = $this->thumbnail($item);
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST' || !is_null($_GET['s'])) {
            return $this->show($item);
        } else {//返回下载链接
            if (config('proxy_domain') != '') {
                $url = str_replace(config('main_domain'), config('proxy_domain'), $item['downloadUrl']);
            } else {
                $url = $item['downloadUrl'];
            }
        }
        header('Location: '.$url);
    }

    //文件夹
    public function dir()
    {
        $root = get_absolute_path(dirname($_SERVER['SCRIPT_NAME'])).config('root_path');
        $navs = $this->navs();

        if ($this->items['index.html']) {
            $this->items['index.html']['path'] = get_absolute_path($this->path).'index.html';
            $index = $this->get_content($this->items['index.html']);
            header('Content-type: text/html');
            echo $index;
            exit();
        }

        if ($this->items['README.md']) {
            $this->items['README.md']['path'] = get_absolute_path($this->path).'README.md';
            $readme = $this->get_content2($this->items['README.md']);
            $Parsedown = new Parsedown();
            $readme = $Parsedown->text($readme);
            //不在列表中展示
        //	unset($this->items['README.md']);
        }

        if ($this->items['HEAD.md']) {
            $this->items['HEAD.md']['path'] = get_absolute_path($this->path).'HEAD.md';
            $head = $this->get_content2($this->items['HEAD.md']);
            $Parsedown = new Parsedown();
            $head = $Parsedown->text($head);
            //不在列表中展示
            unset($this->items['HEAD.md']);
        }

        $this->totalpage = ceil(count($this->items) / $this->z_page);

        if ($this->page * $this->z_page >= count($this->items)) {
            $this->page = $this->totalpage;
        }

        return view::load('list')->with('title', config('title_name'))
                    ->with('navs', $navs)
                    ->with('path', join('/', array_map('rawurlencode', explode('/', $this->url_path))))
                    ->with('root', $root)
                    ->with('items', array_slice($this->items, $this->z_page * ($this->page - 1), $this->z_page))
                    ->with('head', $head)
                    ->with('readme', $readme)
                    ->with('page', $this->page)
                    ->with('totalpage', $this->totalpage)->with('驱动器', self::$驱动器)->with('请求路径', self::$请求路径);
    }

    public function show($item)
    {
        $root = get_absolute_path(dirname($_SERVER['SCRIPT_NAME'])).(config('root_path') ? '?/' : '');
        $ext = strtolower(pathinfo($item['name'], PATHINFO_EXTENSION));
        $data['title'] = $item['name'];
        $data['navs'] = $this->navs();
        $data['item'] = $item;
        $data['ext'] = $ext;
        $data['item']['path'] = get_absolute_path($this->path).$this->name;
        $http_type = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://';
        $uri = onedrive::urlencode(get_absolute_path($this->url_path.'/'.$this->name));
        $data['url'] = $http_type.$_SERVER['HTTP_HOST'].$root.$uri;

        $show = config('show');
        foreach ($show as $n => $exts) {
            if ($ext == 'pdf') {
                return view::load('show/pdf')->with($data);
            } elseif (in_array($ext, $exts)) {
                return view::load('show/'.$n)->with($data);
            }
        }

        header('Location: '.$item['downloadUrl']);
    }

    //缩略图
    public function thumbnail($item)
    {
        if (!empty($_GET['t'])) {
            list($width, $height) = explode('|', $_GET['t']);
        } else {
            //800 176 96
            $width = $height = 800;
        }
        $item['thumb'] = onedrive::thumbnail($this->path.$this->name);
        list($item['thumb'], $tmp) = explode('&width=', $item['thumb']);
        $item['thumb'] .= strpos($item['thumb'], '?') ? '&' : '?';

        return $item['thumb']."width={$width}&height={$height}";
    }

    //文件夹下元素
    public function items($path, $fetch = false)
    {
        $items = cache::get('dir_'.$this->path, function () {
            return onedrive::dir($this->path);
        }, config('cache_expire_time'));

        return $items;
    }

    public function navs()
    {
        $root = get_absolute_path(dirname($_SERVER['SCRIPT_NAME'])).config('root_path');
        $navs['/'] = get_absolute_path($root.'/');
        foreach (explode('/', $this->url_path) as $v) {
            if (empty($v)) {
                continue;
            }
            $navs[rawurldecode($v)] = end($navs).$v.'/';
        }
        if (!empty($this->name)) {
            $navs[$this->name] = end($navs).urlencode($this->name);
        }

        return $navs;
    }

    public static function get_content2($item)
    {
        $content = cache::get('content_'.$item['path'], function () use ($item) {
            $resp = fetch::get($item['downloadUrl']);
            if ($resp->http_code == 200) {
                return $resp->content;
            }
        }, config('cache_expire_time'));

        return $content;
    }

    public static function get_content($item)
    {
        $content = cache::get('content_'.$item['path'], function () use ($item) {
            $resp = fetch::get($item['downloadUrl']);
            if ($resp->http_code == 200) {
                return '<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
axios.get("'.$item['downloadUrl'].'")
  .then(function (response) {
    console.log(response);
    document.write(response.data)
  })
  .catch(function (error) {
    console.log(error);
  });
</script>';

                return $resp->content;
            }
        }, config('cache_expire_time'));

        return $content;
    }

    //404
    public function is404()
    {
        if (!empty($this->items[$this->name]) || (empty($this->name) && is_array($this->items))) {
            return false;
        }

        http_response_code(404);
        view::load('404')->show();
        die();
    }

    public function __destruct()
    {
        if (!function_exists('fastcgi_finish_request')) {
            return;
        }
    }
}
