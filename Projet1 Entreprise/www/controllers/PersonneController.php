<?php
    require_once __DIR__ . "/../models/PersonneModel.php";

    class PersonneController extends BaseController{

        public function getList() {
            try {
                $personneModel = new PersonneModel();

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

                $personnes = $personneModel->getAllPersonne($offset, $limit);

                $responseData = json_encode($personnes);

                $this->sendOutput($responseData);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
                $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
            }
        }

        public function get() {
            try {
                $personneModel = new PersonneModel();

                $urlParams = $this->getQueryStringParams();
                if (!isset($urlParams['id']) || !is_numeric($urlParams['id'])) {
                    throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
                }

                $personne = $personneModel->getSinglePersonne($urlParams['id']);

                $responseData = json_encode($personne);

                $this->sendOutput($responseData);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
                $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
            }
        }

        public function store() {
            try {
                $personneModel = new PersonneModel();

                $body = $this->getBody();
                if (!$body) {
                    throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
                }

                if (!isset($body['nom'])) {
                    throw new Exception("Aucun nom n'a été spécifié");
                }
                if (!isset($body['telephone'])) {
                    throw new Exception("Aucun téléphone n'a été spécifié");
                }
                if (!isset($body['email'])) {
                    throw new Exception("Aucun e-mail n'a été spécifié");
                }
                if (!isset($body['profile'])) {
                    throw new Exception("Aucun profile n'a été spécifié");
                }
                if (!isset($body['ville_id'])) {
                    throw new Exception("Aucune ville n'a été spécifié");
                }

                $keys = array_keys($body);
                $valuesToInsert = [];
                foreach($keys as $key) {
                    if (in_array($key, ['nom', 'telephone', 'email', 'profile', 'ville_id'])) {
                    $valuesToInsert[$key] = $body[$key];
                    }
                }

                $personne = $personneModel->insertPersonne($valuesToInsert);

                $responseData = json_encode($personne);

                $this->sendOutput($responseData);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
                $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
            }
        }

        public function update() {
            try {
                $personneModel = new PersonneModel();

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
                    if (in_array($key, ['nom', 'telephone', 'email', 'profile', 'ville_id'])) {
                    $valuesToUpdate[$key] = $body[$key];
                    }
                }

                $personne = $personneModel->updatePersonne($valuesToUpdate, $body['id']);

                $responseData = json_encode($personne);

                $this->sendOutput($responseData);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
                $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
            }
        }

        public function destroy() {
            try {
                $personneModel = new PersonneModel();

                $urlParams = $this->getQueryStringParams();
                if (!isset($urlParams['id']) || !is_numeric($urlParams['id'])) {
                throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
                }

                $personne = $personneModel->deletePersonne($urlParams['id']);

                $responseData = json_encode("La personne a été correctement supprimé");

                $this->sendOutput($responseData);
            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
                $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
            }
        }
    }
