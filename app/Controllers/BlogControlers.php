<?php 

namespace App\Controllers;

Class BlogController extends Controller{
    public function __construct()
    {
        
    }
    public function index(){
        return $this->view("blog.index");
    }
    public function contact(){
        return $this->view("blog.contact");
    }
    public function test(){
        return $this->view("blog.test");
    }

    public function show(int $id)
    {
        return $this->view("blog.show",compact('id'));
    }
}

?>