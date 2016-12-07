<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    // Nazwa tabeli, z której będziemy korzystać w modelu
    public $table = 'users';

    /**
     * Logowanie użytkownika
     * Sprawdza, czy użytkownik o podanym adresie email i haśle istnieje w bazie danych
     *
     * @access    public
     * @return    mixed
     */
    public function login($email, $password)
    {
        // Jeśli w bazie zostanie znaleziony użytkownik o podanym adresie email i haśle,
        // to wynik zostanie zwrócony do kontrolera w postaci tablicy, w innym wypadku otrzymamy pusty wynik.
        return $this->db->where(array('email' => $email, 'password' => $password))->get($this->table)->row_array();
    }

    public function rejestracja($imie, $nazwisko, $email, $password)
    {

        $array = array('email' => $email);

        $dane = array('email' => $email, 'password' => $password, 'imie' => $imie, 'nazwisko' => $nazwisko);
        if (!$users = $this->db->where($array)->get($this->table)->row_array()) {
            if ($this->db->insert('users', $dane)) {
                return "Uzytkownik został dodany!";
            }
        } else {
            return false;
        }
    }

    public function przypomnij($email)
    {

        $user = $this->db->where(array('email' => $email))->get($this->table)->row_array();
        if ($user != null) {
            return (mail($email, 'Hasło', $user['password']));
        }
    }

    public function aukcje()
    {
        return $this->db->get('auctions')->result_array();
    }

    public function add_auction($nazwa, $typ, $cena, $kiedy, $opis)
    {
        $dane = array('nazwa' => $nazwa, 'typ' => $typ, 'cena' => $cena, 'koniec' => $kiedy, 'id_wlasciciela' => $this->session->userdata('user_id'), 'opis' => $opis, 'created_at' => date('Y-m-d H:i:s'));
        if ($this->db->insert('auctions', $dane)) {
            return "Uzytkownik został dodany!";
        } else {
            return false;
        }
    }

    public function aukcja($id)
    {
        return $this->db->where(array('id' => $id))->get('auctions')->row_array();
    }

    public function photos($id)
    {
        return $this->db->where(array('id_aukcji' => $id))->get('photos')->result_array();
    }

    public function licytuj($id, $cena, $koniec)
    {
        $array = array(
            'cena' => $cena,
            'id_zwyciezcy' => $this->session->userdata('user_id'),
            'koniec' => $koniec
        );

        $this->db->set($array);
        $this->db->where('id', $id);
        if($this->db->update('auctions'))
        {
            $data = array(
                'cena' => $cena,
                'id_aukcji' => $id,
                'id_użytkownika' => $this->session->userdata('user_id'),
                'created_at' => date('Y-m-d H:m:s')
            );

            $this->db->insert('stories', $data);
            return "Podbito cenę";
        }
        else
        {
            return false;
        }
    }

    public function your()
    {
        return $this->db->where(array('id_wlasciciela' => $this->session->userdata('user_id')))->get('auctions')->result_array();
    }
    
    public function story($id)
    {
        return $this->db->where(array('id_aukcji' => $id))->get('stories')->result_array();
    }

    public function participate()
    {

        $this->db->select('auctions.*, stories.id_użytkownika');
        $this->db->from('auctions');
        $this->db->join('stories', 'auctions.id = stories.id_aukcji');
        $this->db->group_by('stories.id_użytkownika');
        return $this->db->get()->result_array();

    }

    public function add_photo($aukcja, $photo)
    {
        $dane = array('id_aukcji' => $aukcja, 'photo' => $photo);
        if ($this->db->insert('photos', $dane)) {
            return "Uzytkownik został dodany!";
        } else {
            return false;
        }
    }

}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */