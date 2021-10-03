<?php

namespace App\DataFixtures;

use App\Entity\County;
use App\Entity\Weather;
use App\Entity\WeatherStatus;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class WeatherFixtures extends Fixture
{
    private $weatherStatus = [

        [
            'light intensity drizzle',
            'drizzle',
            'heavy intensity drizzle',
            'light intensity drizzle rain',
            'drizzle rain',
            'heavy intensity drizzle rain',
            'shower rain and drizzle',
            'heavy shower rain and drizzle',
            'shower drizzle', 'clear sky',
        ],
        [
            'light rain',
            'moderate rain',
            'heavy intensity rain',
            'very heavy rain',
            'extreme rain',
            'freezing rain',
            'light intensity shower rain',
            'shower rain',
            'heavy intensity shower rain',
            'ragged shower rain', 'clear sky'
        ],
        [
            'thunderstorm with light rain',
            'thunderstorm with rain',
            'thunderstorm with heavy rain',
            'light thunderstorm',
            'thunderstorm',
            'heavy thunderstorm',
            'ragged thunderstorm',
            'thunderstorm with light drizzle',
            'thunderstorm with drizzle',
            'thunderstorm with heavy drizzle',
        ],
        [
            'light snow',
            'Snow',
            'Heavy snow',
            'Sleet',
            'Light shower sleet',
            'Shower sleet',
            'Light rain and snow',
            'Rain and snow',
            'Light shower snow',
            'Shower snow',
            'Heavy shower snow',
        ],
    ];

    private function getWeatherStatus($temp)
    {
        if ($temp < 0) {
            return $this->weatherStatus[3][array_rand($this->weatherStatus[3], 1)];
        } elseif ($temp < 10) {
            return $this->weatherStatus[2][array_rand($this->weatherStatus[2], 1)];
        } elseif ($temp < 20) {
            return $this->weatherStatus[1][array_rand($this->weatherStatus[1], 1)];
        } else {
            return $this->weatherStatus[0][array_rand($this->weatherStatus[0], 1)];
        }
    }

    public function load(ObjectManager $manager): void
    {
        /**
         * @var County
         */
        foreach ($manager->getRepository(County::class)->findAll() as $county) {
            for ($i = 0; $i < 10; $i++) {
                $temp = rand() / getrandmax() * 60 - 30;
                $weatherStatusTitle = $this->getWeatherStatus($temp);

                $weatherStatus = $manager->getRepository(WeatherStatus::class)->findOneBy(['title' => $weatherStatusTitle]);
                if ($weatherStatus == null) {
                    $weatherStatus = new WeatherStatus();
                    $weatherStatus->setTitle($weatherStatusTitle);
                    $manager->persist($weatherStatus);
                }

                $weather = new Weather();
                $weather->setCounty($county);
                $weather->setStatus($weatherStatus);
                $weather->setTemp($temp);
                $date = new DateTime();
                $date->setTimestamp(time() + rand() / getrandmax() * 2592000 - 2592000);
                $weather->setDate($date);
                $manager->persist($weather);
                $manager->flush();
            }
        }
    }
}
