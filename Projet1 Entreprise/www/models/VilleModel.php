<?php

    require_once __DIR__ . "/Database.php";

    class VilleModel extends Database {

        public $id;
        public $nom;
        public $lattitude;
        public $longitude;
        public $pays;

        public function getAllVille($offset = 0, $limit = 10) {
            // ---- TODO : Montre tous les ville ordonee para nom et maximum 10 ----
            return $this->getMany(
                "SELECT * FROM ville ORDER BY nom ASC LIMIT $offset, $limit",
                "VilleModel"
            );
        }

        public function getSingleVille($id) {
            // ---- TODO : Montre un seul ville para son id ----
            return $this->getSingle(
                "SELECT * FROM ville WHERE id = $id",
                "VilleModel"
            );
        }

        /**
         * ---- TODO : Inserer une ville ----
         */
        public function insertVille($array) {
            // ---- TODO : Donne forme a l'array donnee dans les parametre ----
            $keys = implode(", ", array_keys($array));
            $values = implode("', '", array_values($array));

            // ---- TODO : Insere une nouvelle ligne avec le key/values donne dans l'array  ----
            return $this->insert(
                "INSERT INTO ville ($keys) VALUES ('$values')",
                "VilleModel",
                "SELECT * FROM ville"
            );
        }

        /**
         * ---- TODO : Modifier une ville, declare son id et une array (valeur des colonne a modifie) ----
         */
        public function updateVille($array, $id) {
            // ---- TODO : Declare un array, pour chaque cle dans l'array il prend ça valeur puis il les separe par ","  ----
            $values_array = [];
            foreach($array as $key => $value) {
                $values_array[] = "$key = '$value'";
            }
            $values = implode(",", array_values($values_array));

            // ---- TODO : Modifie une ville selectionner par son id ----
            return $this->update(
                "UPDATE ville SET $values WHERE id = $id",
                "VilleModel",
                "SELECT id FROM ville WHERE id=$id",
                "SELECT * FROM ville WHERE id=$id"
            );
        }

        /**
         * ---- TODO : Elimine une ville par son id ----
         */
        public function deleteVille($id) {
            // ---- Elimine une ville par son id ----
            return $this->delete(
                "DELETE FROM ville WHERE id=$id",
                "SELECT id FROM ville WHERE id=$id"
            );
        }
    }