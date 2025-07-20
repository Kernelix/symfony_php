<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class LearningController extends AbstractController
{
    #[Route('/api/learn/hello', name: 'learn_hello', methods: ['GET'])]//это урл вызова и метод GET -строка в браузере, если POST то должно быть тело запроса
    public function hello(): JsonResponse//здесь указываем тип возвращаемых данных, могут быть разные
    {
        return $this->json([//return - значит возврат методом данных
            'message' => 'Привет! Это твой первый API endpoint!',
            'success' => true,
            'timestamp' => time()
        ]);
    }

    #[Route('/api/learn/echo', name: 'learn_echo', methods: ['POST'])]
    public function echo(Request $request): JsonResponse
    {
        $data = $request->toArray();

        return $this->json([
            'received_data' => $data,
            'message' => 'Ты отправил мне эти данные:',
            'success' => true
        ]);
    }

    #[Route('/api/learn/calculate/{a}/{b}', name: 'learn_calculate', methods: ['GET'])]
    public function calculate(int $a, int $b): JsonResponse
    {
        return $this->json([
            'sum' => $a + $b,
            'difference' => $a - $b,
            'product' => $a * $b,
            'quotient' => $b != 0 ? $a / $b : 'infinity',
            'message' => 'Результаты вычислений',
            'success' => true
        ]);
    }
}
