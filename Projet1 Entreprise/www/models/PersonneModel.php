<?php
    require_once __DIR__ . "/Database.php";

    class PersonneModel extends Database {

        public $id;
        public $nom;
        public $telephone;
        public $email;
        public $profile;
        public $ville_id;

        /**
         * ---- TODO : Montre tous les personnes, un maximum de 10 ----
         */
        public function getAllPersonnes($offset = 0, $limit = 10) {
            // ---- TODO : Montre tous les personnes ordonee para nom et maximum 10 ----
            return $this->getMany(
                "SELECT * FROM personne ORDER BY nom ASC LIMIT $offset, $limit",
                "PersonneModel"
            );
        }

        /**
         * ---- TODO : Montre une seul personne, selectioner par le id ----
         */
        public function getSinglePersonne($id) {
            // ---- TODO : Montre une seul personne para son id ----
            return $this->getSingle(
                "SELECT * FROM personne WHERE id = $id",
                "PersonneModel"
            );
        }

        /**
         * ---- TODO : Inserer une personne ----
         */
        public function insertPersonne($array) {
            // ---- TODO : Donne forme a l'array donnee dans les parametre ----
            $keys = implode(", ", array_keys($array));
            $values = implode("', '", array_values($array));

            // ---- TODO : Insere une nouvelle ligne avec le key/values donne dans l'array  ----
            return $this->insert(
                "INSERT INTO personne ($keys) VALUES ('$values')",
                "PersonneModel",
                "SELECT * FROM personne"
            );
        }

        /**
         * ---- TODO : Modifier une personne, declare son id et une array (valeur des colonne a modifie) ----
         */
        public function updatePersonne($array, $id) {
            // ---- TODO : Declare un array, pour chaque cle dans l'array il prend ça valeur puis il les separe par ","  ----
            $values_array = [];
            foreach($array as $key => $value) {
                $values_array[] = "$key = '$value'";
            }
            $values = implode(",", array_values($values_array));

            // ---- TODO : Modifie une personne selectionner par son id ----
            return $this->update(
                "UPDATE personne SET $values WHERE id = $id",
                "PersonneModel",
                "SELECT id FROM personne WHERE id=$id",
                "SELECT * FROM personne WHERE id=$id"
            );
        }

        /**
         * ---- TODO : Elimine une personne par son id ----
         */
        public function deletePersonne($id) {
            // ---- Elimine un personne par son id ----
            return $this->delete(
                "DELETE FROM personne WHERE id=$id",
                "SELECT id FROM personne WHERE id=$id"
            );
        }
    }
