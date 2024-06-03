<?php

namespace App\Calculator;

class DistanceCalculator {
    // Властивості, що визначають вартість кілометра
    private int $costOfFirstBorderKilometers;
    private int $costOfSecondBorderKilometers;
    private int $costOfThirdBorderKilometers;
    // Властивості, що визначають пороги для вартості кілометра
    private int $firstBorder;
    private int $secondBorder;
    private int $thirdBorder;

    // Конструктор класу, приймає значення за замовчуванням під тестове завданння, для вартості та порогів.
    // Калькулятор можна налаштувати під себе, як ціни в діапазоні, так і самі діапазони.
    // При введенні кілометра більшого за останній поріг, калькулятор поверне максимальне значення для останнього порога.
    public function __construct(
        int $costOfFirstBorderKilometers = 10, 
        int $costOfSecondBorderKilometers = 8,
        int $costOfThirdBorderKilometers = 7,
        int $firstBorder = 100, // від 0 до 100
        int $secondBorder = 300, // від 100 до 300
        int $thirdBorder = 500 // відо 300 до 500
    ) {
        // Ініціалізація властивостей з переданими значеннями.
        $this->costOfFirstBorderKilometers = $costOfFirstBorderKilometers;
        $this->costOfSecondBorderKilometers = $costOfSecondBorderKilometers;
        $this->costOfThirdBorderKilometers = $costOfThirdBorderKilometers;
        $this->firstBorder = $firstBorder;
        $this->secondBorder = $secondBorder;
        $this->thirdBorder = $thirdBorder;
    }

    // Метод для обчислення вартості подорожі залежно від кількості кілометрів.
    public function calculate(int $kilometers): int {
        // Змінна для зберігання загальної вартості подорожі.
        $cost = 0;
        // Змінна, що вказує на кількість залишкових кілометрів, які ще не були обчислені.
        $remainingKilometers = $kilometers;

        // Обчислення вартості для перших 100(firstBorder) кілометрів.
        if ($kilometers >= $this->firstBorder) {
            $cost += $this->firstBorder * $this->costOfFirstBorderKilometers;
            $remainingKilometers -= $this->firstBorder;
        } else {
            // Якщо кількість кілометрів менше за перший поріг, обчислює всі кілометри за формулою (кілометри * ціна першого порога).
            return $kilometers * $this->costOfFirstBorderKilometers;
        }

        // Обчислення вартості для наступних 200(secondBorder) кілометрів.
        if ($kilometers >= $this->secondBorder) {
            // Визначення кількості кілометрів, які будуть оплачені за вартість $this->costOfSecondBorderKilometers.
            $chargeableKilometers = min($remainingKilometers, $this->secondBorder - $this->firstBorder);
            $cost += $chargeableKilometers * $this->costOfSecondBorderKilometers;
            $remainingKilometers -= $chargeableKilometers;
        } else {
            // Якщо кількість кілометрів менше за другий поріг, використовується вартість за одиницю для кожного кілометра, за формулою ( необчислені кілометри * ціна другого порога ).
            $cost += $remainingKilometers * $this->costOfSecondBorderKilometers;
            $remainingKilometers = 0;
        }

        // Визначення різниці між порогами $this->secondBorder та $this->thirdBorder.
        $underBorder = $this->thirdBorder - $this->secondBorder;
        
        // Обчислення вартості для залишкових кілометрів понад 300(thirdBorder).
        $cost += $remainingKilometers >= $underBorder ? $underBorder * $this->costOfThirdBorderKilometers : $remainingKilometers * $this->costOfThirdBorderKilometers;

        // Повернення загальної вартості подорожі.
        return $cost;
    }
}
