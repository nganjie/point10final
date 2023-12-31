<?php 
namespace Router;
class Router{
    public $url;
    public $routes=[];
    function __construct($url)
    {
        $this->url=trim($url,'/');
    }
  public function get(string $path,string $action)
  {
    $route=new Route($path,$action);
    $this->routes['GET'][]=$route;
    /*echo " et".$route->action."<br><br>";
    var_dump($this->routes);*/
  }
  public function post(string $path,string $action)
  {
    $route=new Route($path,$action);
    $this->routes['POST'][]=$route;
    /*echo " et".$route->action."<br><br>";
    var_dump($this->routes);*/
  }
  public function run(){
   // echo $_SERVER['REQUEST_METHOD'];
    foreach($this->routes[$_SERVER['REQUEST_METHOD']] as $route){
        //echo " route -> ".$route->path." et : ";
           // var_dump($route);
        if($route->matches($this->url))
        {
          // echo "on voit bien";
            return $route->execute();
        }
    }
    return header('HTTP/1.0 404 not Found');
  }
}


?>