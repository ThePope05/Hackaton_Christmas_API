<?php

class HomepageModel
{
    private $apiUrl = "https://api.api-ninjas.com/v1/cars?";
    private $dadJokeUrl = "https://api.api-ninjas.com/v1/dadjokes?limit=1";

    public function getCarModels(string $brandName)
    {
        $brandApiUrl = $this->apiUrl . "make=" . $brandName;

        $context = stream_context_create([
            'http' => [
                'method' => 'GET',
                'header' => "X-Api-Key: " . API_KEY
            ]
        ]);

        $response = file_get_contents($brandApiUrl, false, $context);
        $data = json_decode($response, true);

        return $data;
    }

    public function getDadJoke(string $brandName)
    {
        $brandApiUrl = $this->dadJokeUrl . "make=" . $brandName;

        $context = stream_context_create([
            'http' => [
                'method' => 'GET',
                'header' => "X-Api-Key: " . API_KEY
            ]
        ]);

        $response = file_get_contents($brandApiUrl, false, $context);
        $data = json_decode($response, true);

        foreach ($data as $joke) {
            $data = $joke['joke'];
        }
        return $data;
    }
}
