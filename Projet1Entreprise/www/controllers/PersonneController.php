<?php
   require_once __DIR__ . "/../models/PersonneModel.php";

  class PersonneController extends BaseController
  {

    /**
     * ---- TODO : declare une function qui montre la liste des user ----
     */
    public function getList() {
      try {
        // ---- TODO : Creer un nouveau user ----
        $personneModel = new PersonneModel();

        // ---- TODO :   ----
        $limit = 10;
        $urlParams = $this->getQueryStringParams();
        if (isset($urlParams['limit']) && is_numeric($urlParams['limit'])) {
          $limit = $urlParams['limit'];
        }

        // ---- TODO :  ----
        $offset = 0;
        $urlParams = $this->getQueryStringParams();
        if (isset($urlParams['page']) && is_numeric($urlParams['page']) && $urlParams['page'] > 0) {
          $offset = ($urlParams['page'] - 1) * $limit;
        }

        // ---- TODO : declare une variable users equal a la method getAllusers ----
        $personnes = $personneModel->getAllUsers($offset, $limit);

        // ---- TODO : Retourne la representation JSON de la valeur donnee  ----
        $responseData = json_encode($personnes);

        // ---- TODO : valeur de sorti = la liste de users passe par JSON ----
        $this->sendOutput($responseData);
      } catch (Error $e) {
        // ---- TODO : Declare de variable pour les erreur ----
        $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
        $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
        $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
      }
    }

    /**
     * ---- TODO : declare une function qui va retourner une/unes valeur ----
     */
    public function get() {
      try {
        // ---- TODO : creer un object de la class UserModel ----
        $personneModel =  new PersonneModel();

        // ---- TODO :  ----
        $urlParams = $this->getQueryStringParams();
        if (!isset($urlParams['id']) || !is_numeric($urlParams['id'])) {
          throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
        }

        // ---- TODO : Commenter ce bout de code ----
        $personne = $personneModel->getSingleUser($urlParams['id']);

        // ---- TODO : Commenter ce bout de code ----
        $responseData = json_encode($personne);

        // ---- TODO : Commenter ce bout de code ----
        $this->sendOutput($responseData);
      } catch (Error $e) {
        // ---- TODO : Commenter ce bout de code ----
        $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
        $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
        $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
      }
    }

    /**
     * ---- TODO : Commenter cette méthode ----
     */
    public function store() {
      try {
        // ---- TODO : Commenter ce bout de code ----
        $personneModel = new PersonneModel();

        // ---- TODO : Commenter ce bout de code ----
        $body = $this->getBody();
        if (!$body) {
          throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
        }

        // ---- TODO : Commenter ce bout de code ----
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
          throw new Exception("Aucun profil n'a été spécifié");
        }
        if (!isset($body['ville_id'])) {
          throw new Exception("Aucun ville_id n'a été spécifié");
        }

        // ---- TODO : Commenter ce bout de code ----
        $keys = array_keys($body);
        $valuesToInsert = [];
        foreach($keys as $key) {
          if (in_array($key, ['nom', 'telephone', 'email', 'profile','ville_id'])) {
            $valuesToInsert[$key] = $body[$key];
          }
        }

        // ---- TODO : Commenter ce bout de code ----
        $personne = $personneModel->insertPersonne($valuesToInsert);

        // ---- TODO : Commenter ce bout de code ----
        $responseData = json_encode($personne);

        // ---- TODO : Commenter ce bout de code ----
        $this->sendOutput($responseData);
      } catch (Error $e) {
        // ---- TODO : Commenter ce bout de code ----
        $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
        $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
        $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
      }
    }

    /**
     * ---- TODO : Commenter cette méthode ----
     */
    public function update() {
      try {
        // ---- TODO : Commenter ce bout de code ----
        $personneModel = new PersonneModel();

        // ---- TODO : Commenter ce bout de code ----
        $body = $this->getBody();
        if (!$body) {
          throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
        }

        // ---- TODO : Commenter ce bout de code ----
        if (!isset($body['id'])) {
          throw new Exception("Aucun identifiant n'a été spécifié");
        }

        // ---- TODO : Commenter ce bout de code ----
        $keys = array_keys($body);
        $valuesToUpdate = [];
        foreach($keys as $key) {
          if (in_array($key, ['nom', 'telephone', 'email', 'profil','ville_id'])) {
            $valuesToUpdate[$key] = $body[$key];
          }
        }

        // ---- TODO : Commenter ce bout de code ----
        $personne = $personneModel->updatePersonne($valuesToUpdate, $body['id']);

        // ---- TODO : Commenter ce bout de code ----
        $responseData = json_encode($personne);

        // ---- TODO : Commenter ce bout de code ----
        $this->sendOutput($responseData);
      } catch (Error $e) {
        // ---- TODO : Commenter ce bout de code ----
        $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
        $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
        $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
      }
    }

    /**
     * ---- TODO : Commenter cette méthode ----
     */
    public function destroy() {
      try {
        // ---- TODO : Commenter ce bout de code ----
        $personneModel = new PersonneModel();

        // ---- TODO : Commenter ce bout de code ----
        $urlParams = $this->getQueryStringParams();
        if (!isset($urlParams['id']) || !is_numeric($urlParams['id'])) {
          throw new Exception("L'identifiant est incorrect ou n'a pas été spécifié");
        }

        // ---- TODO : Commenter ce bout de code ----
        $personne = $personneModel->deleteUser($urlParams['id']);

        // ---- TODO : Commenter ce bout de code ----
        $responseData = json_encode("L'utilisateur a été correctement supprimé");

        // ---- TODO : Commenter ce bout de code ----
        $this->sendOutput($responseData);
      } catch (Error $e) {
        // ---- TODO : Commenter ce bout de code ----
        $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
        $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
        $this->sendOutput($strErrorDesc, ['Content-Type: application/json', $strErrorHeader]);
      }
    }

  }
