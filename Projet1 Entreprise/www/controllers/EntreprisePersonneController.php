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

                if (!isset($body['nom_entreprise'])) {
                    throw new Exception("Aucun nom_entreprise n'a été spécifié");
                }
                if (!isset($body['nom_personne'])) {
                    throw new Exception("Aucun nom_personne n'a été spécifié");
                }
                if (!isset($body['entreprise_id'])) {
                    throw new Exception("Aucun entreprise_id n'a été spécifié");
                }
                if (!isset($body['personne_id'])) {
                    throw new Exception("Aucun personne_id n'a été spécifié");
                }
                
                $keys = array_keys($body);
                $valuesToInsert = [];
                foreach($keys as $key) {
                    if (in_array($key, ['nom_entreprise', 'nom_personne', 'entreprise_id', 'personne_id'])) {
                        $valuesToInsert[$key] = $body[$key];
                    }
                }
        
                $entreprisePersonne = $EntreprisePersonneModel->insertEntreprisePersonne($valuesToInsert);
        
                $responseData = json_encode($entreprise);
        
                $this->sendOutput($responseData);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
                $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
            }
        }
    }