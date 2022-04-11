<?php

// ---- TODO : Commenter ce bout de code, qu'est-ce qu'il recherche ? ----
require_once __DIR__ . "/controllers/BaseController.php";
require_once __DIR__ . "/controllers/UserController.php";
require_once __DIR__ . "/controllers/PersonneController.php";
require_once __DIR__ . "/controllers/EntrepriseController.php";
require_once __DIR__ . "/controllers/VilleController.php";

// ---- TODO : Commenter ce bout de code ----
$routes = [
  "/api/users/list" => ['GET', 'UserController', 'getList'],
  "/api/users/get" => ['GET', 'UserController', 'get'],
  "/api/users/add" => ['POST', 'UserController', 'store'],
  "/api/users/update" => ['PUT', 'UserController', 'update'],
  "/api/users/remove" => ['DELETE', 'UserController', 'destroy'],
  // routes personne
  "/api/personne/list" => ['GET', 'PersonneController', 'getList'],
  "/api/personne/get" => ['GET', 'PersonneController', 'get'],
  "/api/personne/add" => ['POST', 'PersonneController', 'store'],
  "/api/personne/update" => ['PUT', 'PersonneController', 'update'],
  "/api/personne/remove" => ['DELETE', 'PersonneController', 'destroy'],
  // routes entreprise
  "/api/entreprise/list" => ['GET', 'EntrepriseController', 'getList'],
  "/api/entreprise/get" => ['GET', 'EntrepriseController', 'get'],
  "/api/entreprise/add" => ['POST', 'EntrepriseController', 'store'],
  "/api/entreprise/update" => ['PUT', 'EntrepriseController', 'update'],
  "/api/entreprise/remove" => ['DELETE', 'EntrepriseController', 'destroy'],
  // routes ville
  "/api/ville/list" => ['GET', 'VilleController', 'getList'],
  "/api/ville/get" => ['GET', 'VilleController', 'get'],
  "/api/ville/add" => ['POST', 'VilleController', 'store'],
  "/api/ville/update" => ['PUT', 'VilleController', 'update'],
  "/api/ville/remove" => ['DELETE', 'VilleController', 'destroy'],
];
