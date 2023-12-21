<?php

class HomepageModel
{
    private $apiUrl = "https://api.api-ninjas.com/v1/cars?";

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
}
