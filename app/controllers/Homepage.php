<?php

class Homepage extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Homepage',
            'models' => null
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
}
