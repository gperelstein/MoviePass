<?php
    namespace Controllers;

    class HomeController
    {
        public function Index($message = null)
        {               
            $_SESSION['error'] = null;
            $_SESSION['cinemaError'] = null;
            $_SESSION['errorMovieShow'] = null;
            $_SESSION['actualView'] = 'ShowSearchMovieView';
            
            header('location:' . FRONT_ROOT . '/Movie/ShowAllMoviesPremieres');                        
        }   
        
        public function Logout ()
        {            
            $_SESSION['userLogged'] = false;
            $_SESSION['adminLogged'] = false;            

            $this->Index();
        }        
    }
?>
