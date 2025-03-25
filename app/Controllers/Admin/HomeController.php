<?php
class HomeController{
    public function dashboard(){
        $homemodel = new HomeModel();
        $dataUser = $homemodel->getUsers();
        var_dump($dataUser);
    }
}