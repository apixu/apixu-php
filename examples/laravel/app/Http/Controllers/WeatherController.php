<?php

namespace App\Http\Controllers;

use Apixu\ApixuInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class WeatherController extends Controller
{
    /**
     * @var ApixuInterface
     */
    private $apixu;

    /**
     * @param ApixuInterface $apixu
     */
    public function __construct(ApixuInterface $apixu)
    {
        $this->apixu = $apixu;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function search(Request $request) {
        $city = trim($request->get('city'));
        if ($city === '') {
            throw new BadRequestHttpException('Missing city');
        }

        try {
            $current = $this->apixu->current($request->get('city'));
        } catch (\Exception $e) {
            return new JsonResponse(['error' => 'Could not retrieve data']);
        }

        $response = [
            'location' => $current->getLocation()->getName(),
            'temperature_celsius' => $current->getCurrent()->getTempCelsius(),
        ];

        return new JsonResponse($response);
    }
}
