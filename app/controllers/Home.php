<?php

class Home extends Controller {
    public function index($key1, $key2) {
        $data = [
            "title" => "CodeEditor2"
        ];
        if(($key1 == $_SESSION['key1']) && ($key2 == $_SESSION['key2'])) {
            $this->view("Home/index", $data);
        } else {
            header("Location: " . base_url);
        }
    }
}