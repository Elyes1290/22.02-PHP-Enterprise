<?php
require_once __DIR__ . "/Database.php";

class EntrepriseModel extends Database
{
  public $id;
  public $nom;
  public $telephone;
  public $website;
  

  /**
   * ---- TODO : Montre tous les users, un maximum de 10 ----
   */
  public function getListEntreprise($offset = 0, $limit = 10)
  {
    // ---- TODO : Montre tous les users ordonee para nom et maximum 10 ----
    return $this->getMany(
      "SELECT * FROM entreprise ORDER BY nom ASC LIMIT $offset, $limit",
      "EntrepriseModel"
    );
  }

  /**
   * ---- TODO : Montre un seul user, selectioner par le id ----
   */
  public function getSingleEntreprise($id)
  {
    // ---- TODO : Montre un seul user para son id ----
    return $this->getSingle(
      "SELECT * FROM entreprise WHERE id = $id",
      "EntrepriseModel"
    );
  }

  /**
   * ---- TODO : Inserer un user ----
   */
  public function insertEntreprise($array)
  {
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
   * ---- TODO : Modifier un user, declare son id et une array (valeur des colonne a modifie) ----
   */
  public function updateEntreprise($array, $id)
  {
    // ---- TODO : Declare un array, pour chaque cle dans l'array il prend ça valeur puis il les separe par ","  ----
    $values_array = [];
    foreach($array as $key => $value) {
      $values_array[] = "$key = '$value'";
    }
    $values = implode(",", array_values($values_array));

    // ---- TODO : Modifie un user selectionner par son id ----
    return $this->update(
      "UPDATE entreprise SET $values WHERE id = $id",
      "EntrepriseModel",
      "SELECT id FROM entreprise WHERE id=$id",
      "SELECT * FROM entreprise WHERE id=$id"
    );
  }

  /**
   * ---- TODO : Elimine un user par son id ----
   */
  public function deleteEntreprise($id)
  {
    // ---- Elimine un user par son id ----
    return $this->delete(
      "DELETE FROM entreprise WHERE id=$id",
      "SELECT id FROM entreprise WHERE id=$id"
    );
  }

}
