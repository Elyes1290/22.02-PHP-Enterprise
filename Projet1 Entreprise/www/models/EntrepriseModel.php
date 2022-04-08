<?php 
    require_once __DIR__ . "/Database.php";

    class EntrepriseModel extends Database {

        public $id;
        public $nom;
        public $telephone;
        public $website;

        public function getAllEntreprise($offset = 0, $limit = 10) {
            // ---- TODO : Montre tous les entreprise ordonee para nom et maximum 10 ----
            return $this->getMany(
                "SELECT * FROM entreprise ORDER BY nom ASC LIMIT $offset, $limit",
                "EntrepriseModel"
            );
        }

        public function getSingleEntreprise($id) {
            // ---- TODO : Montre un seul entreprise para son id ----
            return $this->getSingle(
                "SELECT * FROM entreprise WHERE id = $id",
                "EntrepriseModel"
            );
        }

        /**
         * ---- TODO : Inserer une entreprise ----
         */
        public function insertEntreprise($array) {
            // ---- TODO : Donne forme a l'array donnee dans les parametre ----
            $keys = implode(", ", array_keys($array));
            $values = implode("', '", array_values($array));

            // ---- TODO : Insere une nouvelle ligne avec le key/values donne dans l'array  ----
            return $this->insert(
                "INSERT INTO entreprise ($keys) VALUES ('$values')",
                "EntrepriseModel",
                "SELECT * FROM entreprise"
            );
        }

        /**
         * ---- TODO : Modifier une entreprise, declare son id et une array (valeur des colonne a modifie) ----
         */
        public function updateEntreprise($array, $id) {
            // ---- TODO : Declare un array, pour chaque cle dans l'array il prend ça valeur puis il les separe par ","  ----
            $values_array = [];
            foreach($array as $key => $value) {
                $values_array[] = "$key = '$value'";
            }
            $values = implode(",", array_values($values_array));

            // ---- TODO : Modifie une entreprise selectionner par son id ----
            return $this->update(
                "UPDATE entreprise SET $values WHERE id = $id",
                "EntrepriseModel",
                "SELECT id FROM entreprise WHERE id=$id",
                "SELECT * FROM entreprise WHERE id=$id"
            );
        }

        /**
         * ---- TODO : Elimine une entreprise par son id ----
         */
        public function deleteEntreprise($id) {
            // ---- Elimine une entreprise par son id ----
            return $this->delete(
                "DELETE FROM entreprise WHERE id=$id",
                "SELECT id FROM entreprise WHERE id=$id"
            );
        }
    }