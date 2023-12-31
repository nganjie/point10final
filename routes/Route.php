<?php
namespace Router;

require "../vendor/autoload.php";

//require "../database/DBConnection.php";
require "../app/Controllers/BlogControlers.php";
require "../app/Controllers/Admin/PostController.php";
use Database\DBConnection;
use App\Controllers\BlogController;
use App\Admin\PostController;

class Route
{
    public $path;
    public $action;
    public $matches;

    public function __construct(string $path, string $action)
    {
        $this->path = trim($path, '/');
        $this->action = $action;

    }
    public function matches(string $url)
    {
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);
        //echo $path;
        $pathToMatch = "#^$path$#";
        if (preg_match($pathToMatch, $url, $matches)) {
            $this->matches = $matches;
            /*echo "cela marche ici".$matches[0];
            var_dump($matches);
            echo $path;*/
            //echo $path.' et '.$pathToMatch.' ET '.$url.' et ';
            //var_dump($matches);
            //echo "ok";
            return true;
        } else {
            // echo $path.' et '.$pathToMatch.' ET '.$url.' et ';
            // var_dump($matches);

            return false;
        }
    }
    public function execute()
    {
  
        $params =explode('@',$this->action);
       /* echo "et on a : ".$this->action;
        var_dump($params);
        echo "qt ";
        echo $params[1];*/
        //$d=new DBConnection();
        //var_dump($d->getPDO());
        $controller =new $params[0](new DBConnection());
       // var_dump($controller);
        $method=$params[1];
       
        return isset($this->matches[1])? $controller->$method($this->matches[1]): $controller->$method();
    }
}

?>