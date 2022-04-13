<?php

    require_once __DIR__ . "/../models/EntreprisePersonneModel.php";

    class EntreprisePersonneController extends BaseController {
        
        public function store() {
            try {
                $EntreprisePersonneModel = new EntreprisePersonneModel();
        
                $body = $this->getBody();
                if (!$body) {
                    throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
                }

                if (!isset($body['entreprise_id'])) {
                    throw new Exception("Aucune entreprise_id n'a été spécifié");
                }
                if (!isset($body['personne_id'])) {
                    throw new Exception("Aucune personne_id n'a été spécifié");
                }

                $entreprisePersonne = $EntreprisePersonneModel->insertEntreprisePersonne($body['entreprise_id'], $body['personne_id']);
        
                $responseData = json_encode($entreprisePersonne);
        
                $this->sendOutput($responseData);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
                $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
            }
        }

        public function destroy() {
            try {
                $EntreprisePersonneModel = new EntreprisePersonneModel();
        
                $urlParams = $this->getQueryStringParams();
                if (!isset($urlParams['id']) || !is_numeric($urlParams['id'])) {
                    throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
                }
        
                $entreprisePersonne = $EntreprisePersonneModel->deleteEntreprisePersonne($urlParams['id']);
        
                $responseData = json_encode("L'entreprise_Personne a été correctement supprimé");
        
                $this->sendOutput($responseData);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
                $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
            }
        }
    }