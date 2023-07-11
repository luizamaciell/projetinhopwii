<?php

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

ob_start();

$route = new Router(url(), ":");

$route->namespace("Source\App");

$route->group(null);

$route->get("/", "Web:home");
$route->get("/sobre", "Web:about");
$route->get("/agenda","Web:schedule");
$route->get("/blog","Web:blog");
$route->get("/contato","Web:contact");
$route->get("/faq","Web:faq");
$route->get("/treinadores","Web:trainers");

$route->get("/registro","Web:register");
$route->get("/login","Web:login");

$route->get("/planos","Web:plans");
$route->get("/planos/{categoriesName}","Web:plans");



$route->group("/app");
$route->get("/", "App:home");

$route->group(null);

$route->dispatch();

if ($route->error()) {
    $route->redirect("/ops/{$route->error()}");
}

ob_end_flush();




