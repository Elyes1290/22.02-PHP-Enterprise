<?php

// ---- TODO : Commenter ce bout de code, qu'est-ce qu'il recherche ? ----
require_once __DIR__ . "/controllers/BaseController.php";
require_once __DIR__ . "/controllers/UserController.php";
require_once __DIR__ . "/controllers/EntrepriseController.php";

// ---- TODO : Commenter ce bout de code ----
$routes = [
  "/api/users/list" => ['GET', 'UserController', 'getList'],
  "/api/users/get" => ['GET', 'UserController', 'get'],
  "/api/users/add" => ['POST', 'UserController', 'store'],
  "/api/users/update" => ['PUT', 'UserController', 'update'],
  "/api/users/remove" => ['DELETE', 'UserController', 'destroy'],

  "/api/entreprise/list" => ['GET', 'EntrepriseController', 'getList'],
  "/api/entreprise/get" => ['GET', 'EntrepriseController', 'get'],
  "/api/entreprise/add" => ['POST', 'EntrepriseController', 'store'],
  "/api/entreprise/update" => ['PUT', 'EntrepriseController', 'update'],
  "/api/entreprise/remove" => ['DELETE', 'EntrepriseController', 'destroy'],
];
