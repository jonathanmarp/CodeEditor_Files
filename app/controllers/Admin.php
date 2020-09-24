<?php

class Admin extends Controller {
	protected $point = false;

	public function index($key1, $key2) {
		$data = [
			"title" => "Code Editor "
		];
		if(($key1 == $_SESSION['key1']) && ($key2 == $_SESSION['key2'])) {
            $this->point = true;
        } else {
            header("Location: " . base_url);
        }
        if(($this->dencrypt($_SESSION['en']) == config['username']) && ($this->dencrypt($_SESSION['id']) == config['password'])) {
        	$this->point = true;
        } else {
        	header("Location: " . base_url);
        }
        if($this->point == true) {
        	$this->view("admin/index", $data);
        }
	}
}