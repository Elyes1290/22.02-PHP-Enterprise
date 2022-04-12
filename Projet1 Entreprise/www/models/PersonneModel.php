<?php
require_once __DIR__ . "/Database.php";

class PersonneModel extends Database
{
  public $id;
  public $nom;
  public $telephone;
  public $email;
  public $profile;
  public $personne_ville;

  /**
   * ---- TODO : Montre tous les users, un maximum de 10 ----
   */
  public function getAllUsers($offset = 0, $limit = 10)
  {
    // ---- TODO : Montre tous les users ordonee para nom et maximum 10 ----
    return $this->getMany(
      "SELECT * FROM personne ORDER BY nom ASC LIMIT $offset, $limit",
      "PersonneModel"
    );
  }

  /**
   * ---- TODO : Montre un seul user, selectioner par le id ----
   */
  public function getSingleUser($id)
  {
    // ---- TODO : Montre un seul user para son id ----
    return $this->getSingle(
      "SELECT * FROM personne WHERE id = $id",
      "PersonneModel"
    );
  }

  /**
   * ---- TODO : Inserer un user ----
   */
  public function insertPersonne($array)
  {
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
   * ---- TODO : Modifier un user, declare son id et une array (valeur des colonne a modifie) ----
   */
  public function updatePersonne($array, $id)
  {
    // ---- TODO : Declare un array, pour chaque cle dans l'array il prend ça valeur puis il les separe par ","  ----
    $values_array = [];
    foreach($array as $key => $value) {
      $values_array[] = "$key = '$value'";
    }
    $values = implode(",", array_values($values_array));

    // ---- TODO : Modifie un user selectionner par son id ----
    return $this->update(
      "UPDATE personne SET $values WHERE id = $id",
      "PersonneModel",
      "SELECT id FROM personne WHERE id=$id",
      "SELECT * FROM personne WHERE id=$id"
    );
  }

  /**
   * ---- TODO : Elimine un user par son id ----
   */
  public function deleteUser($id)
  {
    // ---- Elimine un user par son id ----
    return $this->delete(
      "DELETE FROM personne WHERE id=$id",
      "SELECT id FROM personne WHERE id=$id"
    );
  }
  public function selectPersonneInfoVilleEntreprise(){
     return $this->getMany("SELECT personne.id,personne.nom, personne.telephone, personne.email, personne.profile, ville.nom as ville, entreprise.nom
     as entreprise
     FROM personne
     INNER JOIN ville ON ville.id = personne.ville_id
     INNER JOIN entreprise_personne ON entreprise_personne.personne_id = personne.id
     INNER JOIN entreprise  ON entreprise.id = entreprise_personne.entreprise_id
     ORDER BY personne.nom ASC LIMIT 10 OFFSET 0 ;","PersonneModel");
   
  }
// SELECT p.nom, p.telephone, p.email, p.profile, v.nom as ville, e.nom
// as entreprise
// FROM personne p
// INNER JOIN ville v ON v.id = p.ville_id
// INNER JOIN entreprise_personne ep ON ep.personne_id = p.id
// INNER JOIN entreprise e ON e.id = ep.entreprise_id
// ORDER BY p.nom ASC LIMIT $offset, $limit
}
