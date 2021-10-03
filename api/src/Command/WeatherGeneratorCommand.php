<?php

namespace App\Command;

use App\Entity\County;
use App\Entity\Weather;
use App\Entity\WeatherStatus;
use App\Repository\CountyRepository;
use App\Repository\WeatherRepository;
use App\Repository\WeatherStatusRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'weather:generator',
    description: 'Generates dummy weather data.',
)]
class WeatherGeneratorCommand extends Command
{
    private $entityManager;
    private $countyRepository;
    private $weatherStatusRepository;

    public function __construct(EntityManagerInterface $entityManager, CountyRepository $countyRepository, WeatherStatusRepository $weatherStatusRepository)
    {
        $this->entityManager = $entityManager;
        $this->countyRepository = $countyRepository;
        $this->weatherStatusRepository = $weatherStatusRepository;

        parent::__construct();
    }

    protected function configure(): void
    {
        $this->addArgument('arg1', InputArgument::OPTIONAL, 'Number of generated dummy weather data for each county.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {

        $io = new SymfonyStyle($input, $output);
        $arg1 = $input->getArgument('arg1');
        $size = 1;

        if ($arg1) {
            if (is_numeric($arg1) && intval($arg1) >= 2) {
                $size = intval($arg1);
            }
        }

        $io->info('Weather data importing started for ' . $size . ' times.');

        /**
         * @var County
         */
        foreach ($this->countyRepository->findAll() as $county) {
            for ($i = 0; $i < $size; $i++) {
                $temp = rand() / getrandmax() * 60 - 30;
                $weatherStatusTitle = $this->getWeatherStatus($temp);

                $weatherStatus = $this->weatherStatusRepository->findOneBy(['title' => $weatherStatusTitle]);
                if ($weatherStatus == null) {
                    $weatherStatus = new WeatherStatus();
                    $weatherStatus->setTitle($weatherStatusTitle);
                    $this->entityManager->persist($weatherStatus);
                }

                $weather = new Weather();
                $weather->setCounty($county);
                $weather->setStatus($weatherStatus);
                $weather->setTemp($temp);
                $date = new DateTime();
                $date->setTimestamp(time() + rand() / getrandmax() * 2592000 - 2592000);
                $weather->setDate($date);
                $this->entityManager->persist($weather);
                $this->entityManager->flush();
            }
        }

        $io->success('Weather data has been generated.');

        return Command::SUCCESS;
    }

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
}
