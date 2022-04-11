<?php 
    require_once __DIR__ . "/Database.php";

    class EntreprisePersonneModel extends Database {

        public $nom_entreprise;
        public $nom_personne;
        public $entreprise_id;
        public $personne_id;

        /**
         * ---- TODO : Inserer une entreprise ----
         */
        public function insertEntreprisePersonne($array) {
            // ---- TODO : Donne forme a l'array donnee dans les parametre ----
            $keys = implode(", ", array_keys($array));
            $values = implode("', '", array_values($array));

            // ---- TODO : Insere une nouvelle ligne avec le key/values donne dans l'array  ----
            return $this->addRelation(
                "INSERT INTO entreprise_personne ($values[2], $values[3]) VALUES ((SELECT id FROM entreprise WHERE nom = $values[0]), (SELECT Id FROM personne WHERE nom = $values[1]))",
                "EntrepriseModel",
                "SELECT * FROM entreprise_personne"
            );
        }
    }
