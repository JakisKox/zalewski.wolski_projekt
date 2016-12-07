<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Ładujemy bibliotekę sesji
        $this->load->library('session');
    }

    public function start()
    {
        $this->load->model('user_model');
        $dane["aukcje"] = $this->user_model->aukcje();


        // Zwracamy widoki, przypisując do jednego z nich tablicę $data
        $this->load->view('partials/header');
        $this->load->view('start', $dane);
        $this->load->view('partials/footer');
    }


    public function produkt($produkt)
    {
        $this->session->set_userdata('produkt', $produkt);
        $this->load->model('user_model');
        $dane["produkt"] = $this->user_model->produkt($produkt);
        $this->load->view('partials/header');
        $this->load->view('produkt', $dane);
        $this->load->view('partials/footer');
    }


    public function login()
    {
        // Ładujemy bibliotekę walidacji formularza
        $this->load->library('form_validation');
        // Określamy jakie tagi będą otaczać komunikat błędu walidacji.
        // To kwestia stricte kosmetyczna - dostosowanie wyglądu do Twitter Bootstrap.
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert"><a class="close" data-dismiss="alert" href="#">×</a>', '</div>');

        // Ustalamy reguły walidacji dla formularza
        $this->form_validation->set_rules('email', 'Login', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Hasło', 'required|trim');

        // Sprawdzamy, czy formularz został wysłany i czy wystąpiły błędy walidacji
        if ($this->form_validation->run() === FALSE) {
            // Ładujemy helper Form, aby ułatwić sobie pracę z formularzem.
            $this->load->helper('form');

            // Jeśli walidacja formularza nie powiodła się (lub metoda jest wywołana po raz pierwszy), wyświetlamy pliki z katalogu partials oraz widok "user_login",
            // który znajduje się w katalogu "application/views". Ewentualne informacje o błędach w formularzu są przekazywane automatycznie.
            $this->load->view('partials/header');
            $this->load->view('user_login');
            $this->load->view('partials/footer');
        } else {
            // Jeśli walidacja formularza powiodła się, przypisujemy odpowiednie zmienne z tablicy $_POST do zmiennej $email i $password
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            // Ładujemy wcześniej utworzony model
            $this->load->model('user_model');

            // Wywołujemy metodę "login" modelu "user_model" wraz z parametrami i przypisujemy zwrócony wynik do zmiennej $user
            if ($user = $this->user_model->login($email, $password)) {
                // Jeśli zwrócony wynik nie jest pusty (czyli znaleziono użytkownika o podanym adresie email i haśle),
                // ustawiamy zmienną sesyjną o nazwie "user_id" na wartość unikalnego identyfikatora użytkownika.
                $this->session->set_userdata('user_id', $user['id']);
                // Ustawiamy zmienną flashadata o nazwie success i przypisujemy do niej komunikat o powodzeniu logowania.
                $this->session->set_flashdata('success', 'Logowanie przebiegło pomyślnie!');
                // Przekierowujemy użytkownika na stronę ze wszystkimi postami podając w funkcji nazwę kontrolera/metody, która ma zostać wywołana.
                // W tym wypadku nie ma znaczenia, czy podamy 'posts/index', czy samo 'posts', ponieważ CodeIgniter domyślnie zinterpretuje samo 'posts' jako wywołanie
                // metody 'index' - jako domyślnej funkcji dla każdego kontrolera.
                redirect('users/start');
            } else {
                // Jeśli zwrócony wynik jest pusty (czyli nie znaleziono użytkownika o podanym adresie email i haśle),
                // ustawiamy zmienną flashadata o nazwie error i podajemy komunikat o niepowodzeniu logowania.
                $this->session->set_flashdata('error', 'Podany login lub hasło są nieprawidłowe!');
                // Przekierowujemy użytkownika na stronę logowania podając dla funkcji nazwę kontrolera/metody, która ma zostać wywołana
                redirect('users/login');
            }
        }
    }

    public function logout()
    {
        // Niszczymy aktualną sesję
        $this->session->sess_destroy();
        // Przekierowujemy na stronę logowania
        redirect('users/login');
    }

    public function przypomnij()
    {
        $this->load->model('user_model');

        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'email', 'required|trim');
        $this->form_validation->set_message('required', 'Pole  %s nie może zostać puste!');


        if ($this->form_validation->run() === FALSE) {
            // Ładujemy helper Form, aby ułatwić sobie pracę z formularzem.
            $this->load->helper('form');

            // Jeśli walidacja formularza nie powiodła się (lub metoda jest wywołana po raz pierwszy), wyświetlamy pliki z katalogu partials oraz widok "user_login",
            // który znajduje się w katalogu "application/views". Ewentualne informacje o błędach w formularzu są przekazywane automatycznie.
            $this->load->view('partials/header');
            $this->load->view('przypomnij');
            $this->load->view('partials/footer');
        } else {
            $this->load->view('partials/header');
            $this->load->view('przypomnij');
            $this->load->view('partials/footer');
            $email = $this->input->post('email');
            if ($mail = $this->user_model->przypomnij($email)) {
                $this->session->set_flashdata('success', 'Emial z hasłem został wysłany!');
                redirect('users/login');
            } else {
                $this->session->set_flashdata('error', 'Emial z hasłem nie został wysłany! Błąd!');
                redirect('users/login');
            }
        }
    }

    public function rejestracja()
    {

        // Ładujemy bibliotekę walidacji formularza
        $this->load->library('form_validation');
        // Określamy jakie tagi będą otaczać komunikat błędu walidacji.
        // To kwestia stricte kosmetyczna - dostosowanie wyglądu do Twitter Bootstrap.
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert"><a class="close" data-dismiss="alert" href="#">×</a>', '</div>');

        // Ustalamy reguły walidacji dla formularza
        $this->form_validation->set_rules('imie', 'Imię', 'required|trim');
        $this->form_validation->set_rules('nazwisko', 'Nazwisko', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Hasło', 'required|trim');

        $this->form_validation->set_message('required', 'Pole  %s nie może zostać puste!');

        // Ładujemy wcześniej utworzony model
        $this->load->model('user_model');


        // Sprawdzamy, czy formularz został wysłany i czy wystąpiły błędy walidacji
        if ($this->form_validation->run() === FALSE) {
            // Ładujemy helper Form, aby ułatwić sobie pracę z formularzem.
            $this->load->helper('form');

            // Jeśli walidacja formularza nie powiodła się (lub metoda jest wywołana po raz pierwszy), wyświetlamy pliki z katalogu partials oraz widok "user_login",
            // który znajduje się w katalogu "application/views". Ewentualne informacje o błędach w formularzu są przekazywane automatycznie.
            $this->load->view('partials/header');
            $this->load->view('user_rejestracja');
            $this->load->view('partials/footer');
        } else {
            // Jeśli walidacja formularza powiodła się, przypisujemy odpowiednie zmienne z tablicy $_POST do zmiennej $email i $password

            $imie = $this->input->post('imie');
            $nazwisko = $this->input->post('nazwisko');
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            // Wywołujemy metodę "login" modelu "user_model" wraz z parametrami i przypisujemy zwrócony wynik do zmiennej $user
            if ($user = $this->user_model->rejestracja($imie, $nazwisko, $email, $password)) {
                $this->session->set_flashdata('success', 'Rejestracja przebiegła pomyślnie! Możesz się zalogować.');
                redirect('users/login');
            } else {

                // Jeśli zwrócony wynik jest pusty (czyli nie znaleziono użytkownika o podanym adresie email i haśle),
                // ustawiamy zmienną flashadata o nazwie error i podajemy komunikat o niepowodzeniu logowania.
                $this->session->set_flashdata('error', 'Podany użytkownik lub mail już istnieje!');
                // Przekierowujemy użytkownika na stronę logowania podając dla funkcji nazwę kontrolera/metody, która ma zostać wywołana
                redirect('users/rejestracja');
            }
        }

    }

    public function ustawienia()
    {
        $this->load->view('partials/header');
        $this->load->view('ustawienia');
        $this->load->view('partials/footer');
    }

    public function add_auction()
    {

        // Ładujemy bibliotekę walidacji formularza
        $this->load->library('form_validation');
        // Określamy jakie tagi będą otaczać komunikat błędu walidacji.
        // To kwestia stricte kosmetyczna - dostosowanie wyglądu do Twitter Bootstrap.
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert"><a class="close" data-dismiss="alert" href="#">×</a>', '</div>');

        // Ustalamy reguły walidacji dla formularza
        $this->form_validation->set_rules('nazwa', 'Nazwa', 'required|trim');
        $this->form_validation->set_rules('typ', 'Typ', 'required|trim');
        $this->form_validation->set_rules('cena', 'Cena', 'required|trim');
        $this->form_validation->set_rules('kiedy', 'Kiedy', 'required|trim');
        $this->form_validation->set_rules('opis', 'Opis', 'required|trim');
        $this->form_validation->set_message('required', 'Pole  %s nie może zostać puste!');

        // Ładujemy wcześniej utworzony model
        $this->load->model('user_model');


        // Sprawdzamy, czy formularz został wysłany i czy wystąpiły błędy walidacji
        if ($this->form_validation->run() === FALSE) {
            // Ładujemy helper Form, aby ułatwić sobie pracę z formularzem.
            $this->load->helper('form');

            // Jeśli walidacja formularza nie powiodła się (lub metoda jest wywołana po raz pierwszy), wyświetlamy pliki z katalogu partials oraz widok "user_login",
            // który znajduje się w katalogu "application/views". Ewentualne informacje o błędach w formularzu są przekazywane automatycznie.
            $this->load->view('partials/header');
            $this->load->view('add_auction');
            $this->load->view('partials/footer');
        } else {
            // Jeśli walidacja formularza powiodła się, przypisujemy odpowiednie zmienne z tablicy $_POST do zmiennej $email i $password

            $nazwa = $this->input->post('nazwa');
            $typ = $this->input->post('typ');
            $cena = $this->input->post('cena');
            $kiedy = $this->input->post('kiedy');
            $opis = $this->input->post('opis');

            // Wywołujemy metodę "login" modelu "user_model" wraz z parametrami i przypisujemy zwrócony wynik do zmiennej $user
            if ($user = $this->user_model->add_auction($nazwa, $typ, $cena, $kiedy, $opis)) {
                $this->session->set_flashdata('success', 'Dodano aukcję!');
                redirect('users/start');
            } else {

                // Jeśli zwrócony wynik jest pusty (czyli nie znaleziono użytkownika o podanym adresie email i haśle),
                // ustawiamy zmienną flashadata o nazwie error i podajemy komunikat o niepowodzeniu logowania.
                $this->session->set_flashdata('error', 'Podany użytkownik lub mail już istnieje!');
                // Przekierowujemy użytkownika na stronę logowania podając dla funkcji nazwę kontrolera/metody, która ma zostać wywołana
                redirect('users/add_auction');
            }
        }
    }

    public function aukcja($id)
    {


        // Ładujemy wcześniej utworzony model
        $this->load->model('user_model');
        $dane["aukcja"] = $this->user_model->aukcja($id);
        $dane['story'] = $this->user_model->story($id);
        $dane['photos'] = $this->user_model->photos($id);
        $aukcja=$this->user_model->aukcja($id);
        // Ładujemy bibliotekę walidacji formularza
        $this->load->library('form_validation');
        // Określamy jakie tagi będą otaczać komunikat błędu walidacji.
        // To kwestia stricte kosmetyczna - dostosowanie wyglądu do Twitter Bootstrap.
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert"><a class="close" data-dismiss="alert" href="#">×</a>', '</div>');

        // Ustalamy reguły walidacji dla formularza
        $this->form_validation->set_rules('cena', 'Cena', 'required|trim|greater_than['.$aukcja['cena'].']');
        $this->form_validation->set_message('required', 'Pole  %s nie może zostać puste!');


        // Sprawdzamy, czy formularz został wysłany i czy wystąpiły błędy walidacji
        if ($this->form_validation->run() === FALSE) {
            // Ładujemy helper Form, aby ułatwić sobie pracę z formularzem.
            $this->load->helper('form');

            // Jeśli walidacja formularza nie powiodła się (lub metoda jest wywołana po raz pierwszy), wyświetlamy pliki z katalogu partials oraz widok "user_login",
            // który znajduje się w katalogu "application/views". Ewentualne informacje o błędach w formularzu są przekazywane automatycznie.
            $this->load->view('partials/header');
            $this->load->view('aukcja', $dane);
            $this->load->view('partials/footer');
        } else {
            // Jeśli walidacja formularza powiodła się, przypisujemy odpowiednie zmienne z tablicy $_POST do zmiennej $email i $password

            $cena = $this->input->post('cena');
            $koniec = $aukcja['koniec'];

            // Wywołujemy metodę "login" modelu "user_model" wraz z parametrami i przypisujemy zwrócony wynik do zmiennej $user
            if ($this->user_model->licytuj($id, $cena, $koniec)) {
                $this->session->set_flashdata('success', 'Licytacja przebiegła pomyślnie');
                redirect('users/aukcja/'.$id);
            } else {

                // Jeśli zwrócony wynik jest pusty (czyli nie znaleziono użytkownika o podanym adresie email i haśle),
                // ustawiamy zmienną flashadata o nazwie error i podajemy komunikat o niepowodzeniu logowania.
                $this->session->set_flashdata('error', 'Błąd');
                // Przekierowujemy użytkownika na stronę logowania podając dla funkcji nazwę kontrolera/metody, która ma zostać wywołana
                redirect('users/aukcja/'.$id);
            }
        }



    }

    public function kup($id, $cena)
    {
        $array = array(
            'cena' => $cena,
            'koniec' => date('Y-m-d H:m:s'),
            'id_zwyciezcy' => $this->session->userdata('user_id')
        );

        $this->db->set($array);
        $this->db->where('id', $id);
        $this->db->update('auctions');
        redirect('users/aukcja/'.$id);
    }

    public function your_auctions()
    {
        $this->load->model('user_model');
        $dane["aukcje"] = $this->user_model->your();


        // Zwracamy widoki, przypisując do jednego z nich tablicę $data
        $this->load->view('partials/header');
        $this->load->view('start', $dane);
        $this->load->view('partials/footer');
    }

    public function participate()
    {
        $this->load->model('user_model');
        $dane["aukcje"] = $this->user_model->participate();


        // Zwracamy widoki, przypisując do jednego z nich tablicę $data
        $this->load->view('partials/header');
        $this->load->view('start', $dane);
        $this->load->view('partials/footer');
    }

    public function do_upload()
    {
        $config['upload_path']          = 'photos';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100000;
        $config['max_width']            = 10240;
        $config['max_height']           = 7680;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());

           return print_r($error);
        }
        else
        {
            $this->load->model('user_model');
            $this->user_model->add_photo($this->session->userdata('aukcja'), $this->upload->data('file_name'));
            $data = array('upload_data' => $this->upload->data());

            return redirect('users/aukcja/'.$this->session->userdata('aukcja'));
        }
    }
}

/* End of file users.php */
/* Location: ./application/controllers/users.php */