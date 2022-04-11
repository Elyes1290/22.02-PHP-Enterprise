<?php
require_once __DIR__ . "/Database.php";

class UserModel extends Database
{
  public $id;
  public $nom;
  public $telephone;
  public $email;
  public $profil;

  /**
   * ---- TODO : Montre tous les users, un maximum de 10 ----
   */
  public function getAllUsers($offset = 0, $limit = 10)
  {
    // ---- TODO : Montre tous les users ordonee para nom et maximum 10 ----
    return $this->getMany(
      "SELECT * FROM users ORDER BY nom ASC LIMIT $offset, $limit",
      "UserModel"
    );
  }

  /**
   * ---- TODO : Montre un seul user, selectioner par le id ----
   */
  public function getSingleUser($id)
  {
    // ---- TODO : Montre un seul user para son id ----
    return $this->getSingle(
      "SELECT * FROM users WHERE id = $id",
      "UserModel"
    );
  }

  /**
   * ---- TODO : Inserer un user ----
   */
  public function insertUser($array)
  {
    // ---- TODO : Donne forme a l'array donnee dans les parametre ----
    $keys = implode(", ", array_keys($array));
    $values = implode("', '", array_values($array));

    // ---- TODO : Insere une nouvelle ligne avec le key/values donne dans l'array  ----
    return $this->insert(
      "INSERT INTO users ($keys) VALUES ('$values')",
      "UserModel",
      "SELECT * FROM users"
    );
  }

  /**
   * ---- TODO : Modifier un user, declare son id et une array (valeur des colonne a modifie) ----
   */
  public function updateUser($array, $id)
  {
    // ---- TODO : Declare un array, pour chaque cle dans l'array il prend ça valeur puis il les separe par ","  ----
    $values_array = [];
    foreach($array as $key => $value) {
      $values_array[] = "$key = '$value'";
    }
    $values = implode(",", array_values($values_array));

    // ---- TODO : Modifie un user selectionner par son id ----
    return $this->update(
      "UPDATE users SET $values WHERE id = $id",
      "UserModel",
      "SELECT id FROM users WHERE id=$id",
      "SELECT * FROM users WHERE id=$id"
    );
  }

  /**
   * ---- TODO : Elimine un user par son id ----
   */
  public function deleteUser($id)
  {
    // ---- Elimine un user par son id ----
    return $this->delete(
      "DELETE FROM users WHERE id=$id",
      "SELECT id FROM users WHERE id=$id"
    );
  }

}
