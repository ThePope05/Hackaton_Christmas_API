<?php

class Homepage extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Best of the best',
            'bestModel' => null,
            'worstModel' => null,
            'joke' => $this->model('HomepageModel')->getDadJoke(),
        ];

        $this->view('Homepage/index', $data);
    }

    public function getModels()
    {
        $brandName = $_POST['brandName'];

        $data = [
            'title' => 'Best of the best',
            'bestModel' => $this->model('HomepageModel')->getBestModel($brandName),
            'worstModel' => $this->model('HomepageModel')->getWorstModel($brandName),
            'joke' => $this->model('HomepageModel')->getDadJoke(),
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
