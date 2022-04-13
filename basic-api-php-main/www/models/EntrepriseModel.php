<?php
require_once __DIR__ . "/Database.php";

class EntrepriseModel extends Database
{
  public $id;
  public $nom;
  public $telephone;
  public $email;

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function getAllEntreprise($offset = 0, $limit = 10)
  {
    // ---- TODO : Commenter ce bout de code ----
    return $this->getMany(
      "SELECT * FROM entreprise ORDER BY nom ASC LIMIT $offset, $limit",
      "EntrepriseModel"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function getSingleEntreprise($id)
  {
    // ---- TODO : Commenter ce bout de code ----
    return $this->getSingle(
      "SELECT * FROM entreprise WHERE id = $id",
      "EntrepriseModel"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function insertEntreprise($array)
  {
    // ---- TODO : Commenter ce bout de code ----
    $keys = implode(", ", array_keys($array));
    $values = implode("', '", array_values($array));

    // ---- TODO : Commenter ce bout de code ----
    return $this->insert(
      "INSERT INTO entreprise ($keys) VALUES ('$values')",
      "EntrepriseModel",
      "SELECT * FROM entreprise"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function updateEntreprise($array, $id)
  {
    // ---- TODO : Commenter ce bout de code ----
    $values_array = [];
    foreach($array as $key => $value) {
      $values_array[] = "$key = '$value'";
    }
    $values = implode(",", array_values($values_array));

    // ---- TODO : Commenter ce bout de code ----
    return $this->update(
      "UPDATE entreprise SET $values WHERE id = $id",
      "EntrepriseModel",
      "SELECT id FROM entreprise WHERE id=$id",
      "SELECT * FROM entreprise WHERE id=$id"
    );
  }

  /**
   * ---- TODO : Commenter cette méthode ----
   */
  public function deleteEntreprise($id)
  {
    // ---- TODO : Commenter ce bout de code ----
    return $this->delete(
      "DELETE FROM entreprise WHERE id=$id",
      "SELECT id FROM entreprise WHERE id=$id"
    );
  }

}
