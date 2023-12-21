<?php

class Homepage extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Homepage'
        ];

        $this->view('Homepage/index', $data);
    }

    public function getModels()
    {
        $brandName = $_POST['brandName'];

        $data = [
            'title' => 'Homepage',
            'models' => $this->model('HomepageModel')->getCarModels($brandName),
        ];

        $this->view('Homepage/index', $data);
    }

    public function getJoke()
    {
        $joke = [
            'title' => 'Homepage',
            'joke' => $this->model('HomepageModel')->getDadJoke(),
        ];

        $this->view('Homepage/index', $joke);
    }
}
