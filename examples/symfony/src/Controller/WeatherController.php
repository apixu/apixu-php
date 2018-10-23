<?php

namespace App\Controller;

use Apixu\ApixuInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
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
    public function indexAction(Request $request)
    {
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
