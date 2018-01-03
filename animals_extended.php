<?php

    // Исходный массив:
    $animals = [
        'Africa' => [
            'Мамонт Колумба',
            'Большеухая лисица',
            'Бонго',
            'Гиеновидная собака',
            'Носорог',
            'Жираф',
            'Зебра',
            'Саванный заяц',
            'Узкорылый крокодил',
            'Черная мамба',
            'Шпороносная черепаха',
            'Хамелеон',
            'Малярийный комар',
            'Муха Цеце',
            'Шимпанзе'
        ],
        'Australia' => [
            'Кенгуру',
            'Сумчатая мышь',
            'Плащеносная ящерица',
            'Коала',
            'Динго',
            'Намбат',
            'Шлемоносный казуар',
            'Какаду',
            'Черный лебедь',
            'Бычья акула',
            'Огненный муравей',
            'Эму',
            'Обыкновенная лисица',
            'Австралийская ехидна',
            'Рыба-капля'
        ],
        'Antarctica' => [
            'Морской слон',
            'Тюлень-крабоед',
            'Морской леопард',
            'Кашалот',
            'Синий кит',
            'Косатка',
            'Синеглазый баклан',
            'Белая ржанка',
            'Капский голубок',
            'Странствующий альбатрос',
            'Тюлень Уэддела',
            'Антарктический криль',
            'Королевский пингвин',
            'Южноплярный поморник',
            'Императорский пингвин'
        ],
        'Eurasia' => [
            'Бурый медведь',
            'Волк',
            'Выдра',
            'Камышовый кот',
            'Енот-полоскун',
            'Полосатая гиена',
            'Соболь',
            'Лошадь Пржевальского',
            'Норка европейская',
            'Снежный барс',
            'Росомаха',
            'Песец',
            'Лисица обыкновенная',
            'Дымчатый леопард',
            'Белый медведь'
        ],
        'North America' => [
            'Калифорнийский кондор',
            'Рыжая рысь',
            'Ошейниковый пекари',
            'Чернохвостый заяц',
            'Бизон',
            'Снежный баран',
            'Койот',
            'Овцебык',
            'Виргинский филин',
            'Пума',
            'Медведь гризли',
            'Полосатый скунс',
            'Зеленый гремучник',
            'Жабовидная ящерица',
            'Зеброхвостая игуана'
        ],
        'South America' => [
            'Гигантский броненосец',
            'Двупалый ленивец',
            'Очковый медведь',
            'Ягуар',
            'Амазонский дельфин',
            'Капуцин',
            'Альпака',
            'Пампасный олень',
            'Туко-туко',
            'Оринокский крокодил',
            'Кайман',
            'Птица нанду',
            'Амазон попугай',
            'Колибри',
            'Южноамериканская гарпия'
        ]
    ];

    // Создаем два массива - первый содержит первое слово названия, второй - соответственно второе:
    $firstWordArray = [];
    $secondWordArray = [];
    foreach($animals as $continentKey => $value) {
        foreach($value as $numberKey => $animalValue) {
            // Ваш комментарий:
            // 'По идее здесь бы не второе слово присвоить в переменную, а всё что получилось.
            // И посчитать, сколько же слов получилось. Тогда и explode не нужно будет 2 раза делать.'
            // [Вопрос] Не совсем понял Ваш комментарий, можно подробнее?
            $secondWordAnimal = explode(' ', $value[$numberKey])[1];
            // Заполняем эти массивы только когда второе слово в названии животного существует:
            if ($secondWordAnimal != '') {
                $firstWordAnimal = explode(' ', $value[$numberKey])[0];
                $firstWordArray[$continentKey][] = $firstWordAnimal;
                $secondWordArray[] = $secondWordAnimal;
            }
        }
    }

    // Смешиваем элементы массива вторых слов:
    foreach($firstWordArray as $numberKey => $animalValue) {
        shuffle($secondWordArray);
    }

    // Склеиваем элементы массивов
    $randomWordArray = [];
    $i = 0;
    foreach($firstWordArray as $continentKey => $value) {
        foreach($value as $numberKey => $animalValue) {
            $i++;
            $randomWordArray[$continentKey][] = $animalValue . ' ' . $secondWordArray[$i];
        }
    }

?>

<!DOCTYPE html>
<html>
    <title>Трансформация массивов - PHP</title>
    <meta charset='utf-8'>
    <style>
        body {
            font-family: sans-serif;
        }
        .continents {
            display: flex;
            flex-direction: row;
        }
        .continent {
            min-width: 200px;
            max-width: 400px;
            margin-right: 20px;
        }
    </style>
    <body>
        <h1>Исходный массив</h1>
        <div class="continents">
        <? foreach ($animals as $continentKey => $value) { ?>
            <div class="continent">
                <h2><?= $continentKey ?></h2>
                <p>
                    <? foreach($animals[$continentKey] as $numberKey => $animalValue) {
                        if ($numberKey < (count($animals[$continentKey]) - 1)) {
                            print_r($animalValue . ', ');
                        } else {
                            print_r($animalValue . '.');
                        }
                    } ?>
                </p>
            </div>
        <? } ?>
        </div>
        <h1>Измененный массив</h1>
        <div class="continents">
        <? foreach ($randomWordArray as $continentKey => $value) { ?>
            <div class="continent">
                <h2><?= $continentKey ?></h2>
                <p>
                    <? foreach($randomWordArray[$continentKey] as $numberKey => $animalValue) {
                        if ($numberKey < (count($randomWordArray[$continentKey]) - 1)) {
                            print_r($animalValue . ', ');
                        } else {
                            print_r($animalValue . '.');
                        }
                    } ?>
                </p>
            </div>
        <? } ?>
        </div>
    </body>
</html>