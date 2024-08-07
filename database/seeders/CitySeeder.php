<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [

            ['country_id' => 128, 'name' => ['en' => 'Aerodrom', 'mk' => 'Аеродром']],
            ['country_id' => 128, 'name' => ['en' => 'Aracinovo', 'mk' => 'Арачиново']],
            ['country_id' => 128, 'name' => ['en' => 'Berovo', 'mk' => 'Берово']],
            ['country_id' => 128, 'name' => ['en' => 'Bitola', 'mk' => 'Битола']],
            ['country_id' => 128, 'name' => ['en' => 'Bogdanci', 'mk' => 'Богданци']],
            ['country_id' => 128, 'name' => ['en' => 'Bogovinje', 'mk' => 'Боговиње']],
            ['country_id' => 128, 'name' => ['en' => 'Bosilovo', 'mk' => 'Босилово']],
            ['country_id' => 128, 'name' => ['en' => 'Brvenica', 'mk' => 'Брвеница']],
            ['country_id' => 128, 'name' => ['en' => 'Butel', 'mk' => 'Бутел']],
            ['country_id' => 128, 'name' => ['en' => 'Valandovo', 'mk' => 'Валандово']],
            ['country_id' => 128, 'name' => ['en' => 'Vasilево', 'mk' => 'Василево']],
            ['country_id' => 128, 'name' => ['en' => 'Veles', 'mk' => 'Велес']],
            ['country_id' => 128, 'name' => ['en' => 'Vinica', 'mk' => 'Виница']],
            ['country_id' => 128, 'name' => ['en' => 'Vranestica', 'mk' => 'Вранештица']],
            ['country_id' => 128, 'name' => ['en' => 'Vrapciste', 'mk' => 'Врапчиште']],
            ['country_id' => 128, 'name' => ['en' => 'Gazi Baba', 'mk' => 'Гази Баба']],
            ['country_id' => 128, 'name' => ['en' => 'Gevgelija', 'mk' => 'Гевгелија']],
            ['country_id' => 128, 'name' => ['en' => 'Gjorche Petrov', 'mk' => 'Ѓорче Петров']],
            ['country_id' => 128, 'name' => ['en' => 'Gostivar', 'mk' => 'Гостивар']],
            ['country_id' => 128, 'name' => ['en' => 'Gradskо', 'mk' => 'Градско']],
            ['country_id' => 128, 'name' => ['en' => 'Debar', 'mk' => 'Дебар']],
            ['country_id' => 128, 'name' => ['en' => 'Debarca', 'mk' => 'Дебарца']],
            ['country_id' => 128, 'name' => ['en' => 'Delcevo', 'mk' => 'Делчево']],
            ['country_id' => 128, 'name' => ['en' => 'Demir Kapija', 'mk' => 'Демир Капија']],
            ['country_id' => 128, 'name' => ['en' => 'Demir Hisar', 'mk' => 'Демир Хисар']],
            ['country_id' => 128, 'name' => ['en' => 'Dojran', 'mk' => 'Дојран']],
            ['country_id' => 128, 'name' => ['en' => 'Dolneni', 'mk' => 'Долнени']],
            ['country_id' => 128, 'name' => ['en' => 'Drugovo', 'mk' => 'Другово']],
            ['country_id' => 128, 'name' => ['en' => 'Zhelino', 'mk' => 'Желино']],
            ['country_id' => 128, 'name' => ['en' => 'Zajas', 'mk' => 'Зајас']],
            ['country_id' => 128, 'name' => ['en' => 'Zelenikovo', 'mk' => 'Зелениково']],
            ['country_id' => 128, 'name' => ['en' => 'Zrnovci', 'mk' => 'Зрновци']],
            ['country_id' => 128, 'name' => ['en' => 'Ilinden', 'mk' => 'Илинден']],
            ['country_id' => 128, 'name' => ['en' => 'Jegunovci', 'mk' => 'Јегуновци']],
            ['country_id' => 128, 'name' => ['en' => 'Kavadarci', 'mk' => 'Кавадарци']],
            ['country_id' => 128, 'name' => ['en' => 'Karbinci', 'mk' => 'Карбинци']],
            ['country_id' => 128, 'name' => ['en' => 'Karpos', 'mk' => 'Карпош']],
            ['country_id' => 128, 'name' => ['en' => 'Kisela Voda', 'mk' => 'Кисела Вода']],
            ['country_id' => 128, 'name' => ['en' => 'Kicevo', 'mk' => 'Кичево']],
            ['country_id' => 128, 'name' => ['en' => 'Konche', 'mk' => 'Конче']],
            ['country_id' => 128, 'name' => ['en' => 'Kriva Palanka', 'mk' => 'Крива Паланка']],
            ['country_id' => 128, 'name' => ['en' => 'Krivogastani', 'mk' => 'Кривогаштани']],
            ['country_id' => 128, 'name' => ['en' => 'Krusevo', 'mk' => 'Крушево']],
            ['country_id' => 128, 'name' => ['en' => 'Kumanovo', 'mk' => 'Куманово']],
            ['country_id' => 128, 'name' => ['en' => 'Lipkovo', 'mk' => 'Липково']],
            ['country_id' => 128, 'name' => ['en' => 'Lozovo', 'mk' => 'Лозово']],
            ['country_id' => 128, 'name' => ['en' => 'Mavrovo i Rostusha', 'mk' => 'Маврово и Ростуша']],
            ['country_id' => 128, 'name' => ['en' => 'Makedonska Kamenica', 'mk' => 'Македонска Каменица']],
            ['country_id' => 128, 'name' => ['en' => 'Makedonski Brod', 'mk' => 'Македонски Брод']],
            ['country_id' => 128, 'name' => ['en' => 'Mogila', 'mk' => 'Могила']],
            ['country_id' => 128, 'name' => ['en' => 'Negotino', 'mk' => 'Неготино']],
            ['country_id' => 128, 'name' => ['en' => 'Novaci', 'mk' => 'Новаци']],
            ['country_id' => 128, 'name' => ['en' => 'Novo Selo', 'mk' => 'Ново Село']],
            ['country_id' => 128, 'name' => ['en' => 'Opstina Centar', 'mk' => 'Општина Центар']],
            ['country_id' => 128, 'name' => ['en' => 'Oslomej', 'mk' => 'Осломеј']],
            ['country_id' => 128, 'name' => ['en' => 'Kocani', 'mk' => 'Кочани']],
            ['country_id' => 128, 'name' => ['en' => 'Kratovo', 'mk' => 'Кратово']],
            ['country_id' => 128, 'name' => ['en' => 'Ohrid', 'mk' => 'Охрид']],
            ['country_id' => 128, 'name' => ['en' => 'Petrovec', 'mk' => 'Петровец']],
            ['country_id' => 128, 'name' => ['en' => 'Pehcevo', 'mk' => 'Пехчево']],
            ['country_id' => 128, 'name' => ['en' => 'Plasnica', 'mk' => 'Пласница']],
            ['country_id' => 128, 'name' => ['en' => 'Prilep', 'mk' => 'Прилеп']],
            ['country_id' => 128, 'name' => ['en' => 'Probistip', 'mk' => 'Пробиштип']],
            ['country_id' => 128, 'name' => ['en' => 'Radovis', 'mk' => 'Радовиш']],
            ['country_id' => 128, 'name' => ['en' => 'Rankovce', 'mk' => 'Ранковце']],
            ['country_id' => 128, 'name' => ['en' => 'Resen', 'mk' => 'Ресен']],
            ['country_id' => 128, 'name' => ['en' => 'Rosoman', 'mk' => 'Росоман']],
            ['country_id' => 128, 'name' => ['en' => 'Saraj', 'mk' => 'Сарај']],
            ['country_id' => 128, 'name' => ['en' => 'Sveti Nikole', 'mk' => 'Свети Николе']],
            ['country_id' => 128, 'name' => ['en' => 'Sopiste', 'mk' => 'Сопиште']],
            ['country_id' => 128, 'name' => ['en' => 'Staro Nagoricane', 'mk' => 'Старо Нагоричане']],
            ['country_id' => 128, 'name' => ['en' => 'Struga', 'mk' => 'Струга']],
            ['country_id' => 128, 'name' => ['en' => 'Strumica', 'mk' => 'Струмица']],
            ['country_id' => 128, 'name' => ['en' => 'Studenicani', 'mk' => 'Студеничани']],
            ['country_id' => 128, 'name' => ['en' => 'Tearce', 'mk' => 'Теарце']],
            ['country_id' => 128, 'name' => ['en' => 'Tetovo', 'mk' => 'Тетово']],
            ['country_id' => 128, 'name' => ['en' => 'Centar Zupa', 'mk' => 'Центар Жупа']],
            ['country_id' => 128, 'name' => ['en' => 'Cair', 'mk' => 'Чаир']],
            ['country_id' => 128, 'name' => ['en' => 'Caska', 'mk' => 'Чашка']],
            ['country_id' => 128, 'name' => ['en' => 'Cesinovo-Oblesevo', 'mk' => 'Чешиново-Облешево']],
            ['country_id' => 128, 'name' => ['en' => 'Cucer-Sandevo', 'mk' => 'Чучер-Сандево']],
            ['country_id' => 128, 'name' => ['en' => 'Stip', 'mk' => 'Штип']],
            ['country_id' => 128, 'name' => ['en' => 'Suto Orizari', 'mk' => 'Шуто Оризари']],

        ];

        foreach ($cities as $city) {
            City::create($city);
        }
    }
}
