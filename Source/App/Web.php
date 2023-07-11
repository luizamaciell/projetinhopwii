<?php

namespace Source\App;

use League\Plates\Engine;
use Source\Models\Category;
use Source\Models\Faq;
use Source\Models\Plan;
use Source\Models\Trainer;

class Web
{

    private $view;
    private $categories;

    public function __construct(){

        $this->view = new Engine(__DIR__ . "/../../themes/web", "php");
        $category = new Category();
        $this->categories = $category->selectAll();

    }

    public function home()
    {
  
        echo $this->view->render("home", [
            "categories" => $this->categories
        ]);

    }

    public function about()
    {
        $trainer = new Trainer();
        $trainers = $trainer->selectAll();

        echo $this->view->render("about",[
            "trainers" => $trainers
        ]);

    }

    public function location()
    {
        echo $this->view->render("about");
    }

    public function schedule()
    {
        echo $this->view->render("schedule");
    }

    public function blog (){
        echo $this->view->render("blog");
    }
    public function contact (){
        echo $this->view->render("contact");
    } 
    public function faq () {
        $faq = new Faq();
        $faqs = $faq->selectAll();
     
        echo $this->view->render("faq",[
            "faqs" => $faqs
        ]);
    }
    public function plans (array $data)
    {
        $categories = new Category();
        $plan = new Plan();
        $plans = $plan->selectAll();

         if(!empty ($data["categoriesName"])){
            echo $this->view->render("plans",[
                "plans" => $plan->selectByCategories($data["categoriesName"]),
                "categories" => $categories->selectAll()
            ]);
            return;
         } 

        echo $this->view->render("plans",[
            "plans" => $plans,
            "categories" => $categories->selectAll()
        ]);

    }
    public function register(array $data)
    {
        if(!empty ($data)){
            $response = json_encode($data);
            echo $response;
            return;
         } 

        echo $this->view->render("register",[
            "categories" => $this->categories
        ]);
    }
    public function login(array $data)
    {
        echo $this->view->render("user-auth",[]);
    }

    
}