<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once('BDD_models.php');

class Etudiant_model extends BDD_models
{
    public function __construct()
    {
        parent::__construct("etudiant", array("id" => "id_etu", "nom" => "nom_etu", "prenom" => "prenom_etu", "aidant" => "aidant_etu", "email" => "email_etu","mdp" => "mdp_etu", "description" => "desc_etu", "id_promo" => "id_promo"));
    }

    public function get_etudiant($id)
    {
        $this->db->select('*');
        $this->db->from($this->get_table());
        $this->db->where($this->get_colonne()['id'], $id);
        $resultat = $this->db->get();

        return $resultat->row_array();
    }

    public function get_connexion($login, $mdp)
    {
        $error = '';
        if ($this->email_exist($login)) {
            $this->load->library('encrypt');

            $this->db->select('*');
            $this->db->from($this->get_table());
            $this->db->where($this->get_colonne()['email'], $login);
            $resultat = $this->db->get();
            $row = $resultat->row();
            $Vraimdp =  $this->encrypt->decode($row->mdp_etu);
            if ($Vraimdp === $mdp) {
                return $row->id_etu;
            } else {
                $error = 'Mauvais mot de passe.';
                return $error;
                ;
            }
        } else {
            $error  =  "Le compte n'existe pas.";
            return $error;
            ;
        }
    }

    public function ajout_etudiant($etudiant)
    {
        $this->insert($etudiant);
    }

    public function suppr_etudiant($id)
    {
        //$this->insert($etudiant);
    }

    public function email_exist($email)
    {
        $this->db->select('*');
        $this->db->from($this->get_table());
        $this->db->where($this->get_colonne()['email'], $email);
        $resultat = $this->db->get();

        if ($resultat->num_rows() >1) {
            show_error('PLUSIEURS EMAILS ERROR');
        }

        return $resultat->num_rows() === 1;
    }
}
