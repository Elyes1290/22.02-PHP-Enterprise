<?php

    require_once __DIR__ . "/../models/VilleModel.php";

    class VilleController extends BaseController {

        public function getList() {
            try {
                $villeModel = new VilleModel();
        
                $limit = 10;
                $urlParams = $this->getQueryStringParams();
                if (isset($urlParams['limit']) && is_numeric($urlParams['limit'])) {
                    $limit = $urlParams['limit'];
                }
        
                $offset = 0;
                $urlParams = $this->getQueryStringParams();
                if (isset($urlParams['page']) && is_numeric($urlParams['page']) && $urlParams['page'] > 0) {
                    $offset = ($urlParams['page'] - 1) * $limit;
                }
        
                $villes = $villeModel->getAllVille($offset, $limit);
        
                $responseData = json_encode($villes);
        
                $this->sendOutput($responseData);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
                $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
            }
        }
  
        public function get() {
            try {
                $villeModel = new VilleModel();
        
                $urlParams = $this->getQueryStringParams();
                if (!isset($urlParams['id']) || !is_numeric($urlParams['id'])) {
                    throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
                }
        
                $ville = $villeModel->getSingleVille($urlParams['id']);
        
                $responseData = json_encode($ville);
        
                $this->sendOutput($responseData);
            } catch (Error $e) {
            $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
            $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
            }
        }
    
        public function store() {
            try {
                $villeModel = new VilleModel();
        
                $body = $this->getBody();
                if (!$body) {
                    throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
                }

                if (!isset($body['nom'])) {
                    throw new Exception("Aucun nom n'a été spécifié");
                }
                if (!isset($body['lattitude'])) {
                    throw new Exception("Aucun lattitude n'a été spécifié");
                }
                if (!isset($body['longitude'])) {
                    throw new Exception("La longitude n'a pas été spécifié");
                }
                if (!isset($body['pays'])) {
                    throw new Exception("Le pays n'a pas été spécifié");
                }
        
                $keys = array_keys($body);
                $valuesToInsert = [];
                foreach($keys as $key) {
                    if (in_array($key, [ `nom`, `lattitude`, `longitude`, `pays`])) {
                        $valuesToInsert[$key] = $body[$key];
                    }
                }
        
                $ville = $villeModel->insertVille($valuesToInsert);
        
                $responseData = json_encode($ville);
        
                $this->sendOutput($responseData);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
                $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
            }
        }
    
        public function update() {
            try {
                $villeModel = new VilleModel();
        
                $body = $this->getBody();
                if (!$body) {
                    throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
                }
        
                if (!isset($body['id'])) {
                    throw new Exception("Aucun identifiant n'a été spécifié");
                }
        
                $keys = array_keys($body);
                $valuesToUpdate = [];
                foreach($keys as $key) {
                    if (in_array($key, [`nom`, `lattitude`, `longitude`, `pays`])) {
                        $valuesToUpdate[$key] = $body[$key];
                    }
                }
        
                $ville = $villeModel->updateVille($valuesToUpdate, $body['id']);
        
                $responseData = json_encode($ville);
        
                $this->sendOutput($responseData);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
                $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
            }
        }
    
        public function destroy() {
            try {
                $villeModel = new VilleModel();
        
                $urlParams = $this->getQueryStringParams();
                if (!isset($urlParams['id']) || !is_numeric($urlParams['id'])) {
                    throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
                }
        
                $ville = $villeModel->deleteVille($urlParams['id']);
        
                $responseData = json_encode("La Ville a été correctement supprimé");
        
                $this->sendOutput($responseData);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
                $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
            }
        }
    }