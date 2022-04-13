<?php
// ---- TODO : Commenter ce bout de code, qu'est-ce qu'il recherche ? ----
require_once __DIR__ . "/controllers/BaseController.php";
require_once __DIR__ . "/controllers/EntrepriseController.php";
require_once __DIR__ . "/controllers/VilleController.php";

require_once __DIR__ . "/controllers/PersonneController.php";
require_once __DIR__ . "/controllers/EntreprisePersonneController.php";
// ---- TODO : changer le path /api/users/... ----
$routes = [
  "/api/users/list" => ['GET', 'UserController', 'getList'],
  "/api/users/get" => ['GET', 'UserController', 'get'],
  "/api/users/add" => ['POST', 'UserController', 'store'],
  "/api/users/update" => ['PUT', 'UserController', 'update'],
  "/api/users/remove" =>['DELETE', 'UserController', 'destroy'],
  // routes personne
  "/api/personne/list" => ['GET', 'PersonneController', 'getList'],
  "/api/personne/get" => ['GET', 'PersonneController', 'get'],
  "/api/personne/add" => ['POST', 'PersonneController', 'store'],
  "/api/personne/update" => ['PUT', 'PersonneController', 'update'],
  "/api/personne/remove" => ['DELETE', 'PersonneController', 'destroy'],
  "/api/personne/selection2"=>['GET', 'PersonneController', 'selection02'],
  // routes entreprise
  "/api/entreprise/list" => ['GET', 'EntrepriseController', 'getList'],
  "/api/entreprise/get" => ['GET', 'EntrepriseController', 'get'],
  "/api/entreprise/add" => ['POST', 'EntrepriseController', 'store'],
  "/api/entreprise/update" => ['PUT', 'EntrepriseController', 'update'],
  "/api/entreprise/remove" => ['DELETE', 'EntrepriseController', 'destroy'],
  "/api/entreprise/selection1"=>['GET', 'EntrepriseController', 'selection01'],
  
  // routes ville
  "/api/ville/list" => ['GET', 'VilleController', 'getList'],
  "/api/ville/get" => ['GET', 'VilleController', 'get'],
  "/api/ville/add" => ['POST', 'VilleController', 'store'],
  "/api/ville/update" => ['PUT', 'VilleController', 'update'],
  "/api/ville/remove" => ['DELETE', 'VilleController', 'destroy'],

  "/api/entreprisepersonne/add" => ['POST', 'EntreprisePersonneController', "store"],
  "/api/ville/selection3" => ['GET', 'VilleController', 'selection03']
];
