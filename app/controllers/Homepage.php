<?php

class Homepage extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Homepage',
            'model' => null
        ];

        $this->view('Homepage/index', $data);
    }

    public function getModels()
    {
        $brandName = $_POST['brandName'];

        $data = [
            'title' => 'Homepage',
            'model' => $this->model('HomepageModel')->getCarModels($brandName),
        ];

        $this->view('Homepage/index', $data);
    }
}
