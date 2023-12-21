<?php

class HomepageModel
{
    private $apiUrl = "https://api.api-ninjas.com/v1/cars?limit=500&";
    private $dadJokeUrl = "https://api.api-ninjas.com/v1/dadjokes?limit=1";

    public function getBestModel(string $brandName)
    {
        $brandApiUrl = $this->apiUrl . "make=" . $brandName;

        $brandApiUrl = str_replace(' ', '%20', $brandApiUrl);

        $context = stream_context_create([
            'http' => [
                'method' => 'GET',
                'header' => "X-Api-Key: " . API_KEY
            ]
        ]);

        $response = file_get_contents($brandApiUrl, false, $context);
        $data = json_decode($response, true);

        if (is_null($data)) return null;

        return $this->compareModels($data);
    }

    public function getWorstModel(string $brandName)
    {
        $brandApiUrl = $this->apiUrl . "make=" . $brandName;

        $brandApiUrl = str_replace(' ', '%20', $brandApiUrl);

        $context = stream_context_create([
            'http' => [
                'method' => 'GET',
                'header' => "X-Api-Key: " . API_KEY
            ]
        ]);

        $response = file_get_contents($brandApiUrl, false, $context);
        $data = json_decode($response, true);

        $modelsPoints = [];
        $i = 0;
        foreach ($data as $model) {
            $modelsPoints[$i] = $this->getModelPoints($model);
            $i++;
        }

        if (!isset($modelsPoints[0])) {
            return null;
        }

        $minPoints = min($modelsPoints);
        $minPointsIndex = array_search($minPoints, $modelsPoints);

        return $data[$minPointsIndex];
    }

    public function compareModels(array $models)
    {
        $modelsPoints = [];
        $i = 0;
        foreach ($models as $model) {
            $modelsPoints[$i] = $this->getModelPoints($model);
            $i++;
        }

        if (!isset($modelsPoints[0])) {
            return null;
        }

        $maxPoints = max($modelsPoints);
        $maxPointsIndex = array_search($maxPoints, $modelsPoints);

        return $models[$maxPointsIndex];
    }

    public function getModelPoints(array $model)
    {
        $points = 0;
        foreach ($model as $property => $value) {
            if ($property == "year") {
                $points += (50 - (2024 - $value)) * 10;
            } else if ($property == "transmission") {
                switch ($value) {
                    case "automatic":
                        $points += 20;
                        break;
                    case "manual":
                        $points += 30;
                        break;
                    case "semi-automatic":
                        $points += 40;
                        break;
                }
            } else if ($property == "fuel_type") {
                switch ($value) {
                    case "electric":
                        $points += 20;
                        break;
                    case "diesel":
                        $points += 30;
                        break;
                    case "petrol":
                        $points += 45;
                        break;
                }
            } else if ($property == "drive") {
                switch ($value) {
                    case "front-wheel":
                        $points += 20;
                        break;
                    case "rear-wheel":
                        $points += 40;
                        break;
                    case "all-wheel":
                        $points += 40;
                        break;
                }
            } else if ($property == "displacement") {
                $points += $this->calculateDisplacementPoints($value);
            } else if ($property == "cylinders") {
                $points += $this->calculateCylindersPoints($model);
            }
        }

        return $points;
    }


    public function calculateDisplacementPoints(float $displacement)
    {
        return ($displacement) * 2;
    }


    public function calculateCylindersPoints(array $model)
    {
        return ($model['cylinders']);
    }

    public function getDadJoke()
    {
        $context = stream_context_create([
            'http' => [
                'method' => 'GET',
                'header' => "X-Api-Key: " . API_KEY
            ]
        ]);

        $response = file_get_contents($this->dadJokeUrl, false, $context);
        $data = json_decode($response, true);

        foreach ($data as $joke) {
            $dadjoke = $joke['joke'];
        }

        return $dadjoke;
    }
}
