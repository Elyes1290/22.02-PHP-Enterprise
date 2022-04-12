<?php 
    require_once __DIR__ . "/Database.php";

    class EntreprisePersonneModel extends Database {

        public $entreprise_id;
        public $personne_id;
        public $id;

        /**
         * ---- TODO : Inserer une entreprise ----
         */
        public function insertEntreprisePersonne($entreprise_id, $personne_id) {
          
            // ---- TODO : Insere une nouvelle ligne avec le key/values donne dans l'array  ----
            $this->addRelation('entreprise_personne', 'entreprise_id', 'personne_id', $entreprise_id, $personne_id);

            return $this->getSingle("SELECT * FROM entreprise_personne");
            
        }

        /**
         * ---- TODO : Elimine une entreprise par son id ----
         */
        public function deleteEntreprisePersonne($id) {
            // ---- Elimine une entreprise par son id ----
            return $this->removeRelation('entreprise_personne', 'personne_id', $id);

            return $this->getSingle("SELECT * FROM entreprise_personne");
        }
    }