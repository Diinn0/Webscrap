<?php

require_once('vendor/autoload.php');

use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\WebDriverBy;
use Symfony\Component\Dotenv\Dotenv;
use Facebook\WebDriver\Chrome\ChromeOptions;

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');

$serverUrl = 'http://localhost:4444';

$chromeOptions = new ChromeOptions();

// Spécifiez les options Chrome pour le profil de téléchargement
$downloadPath = __DIR__.'\download\\'; // Remplacez par le chemin vers le dossier de téléchargements souhaité
$chromeOptions->setExperimentalOption('prefs', [
    'download.default_directory' => $downloadPath,
    'download.prompt_for_download' => false,
    'download.directory_upgrade' => true,
    'safebrowsing.enabled' => true,
]);

var_dump($downloadPath);


$capabilities = DesiredCapabilities::chrome();
$capabilities->setCapability(\Facebook\WebDriver\Chrome\ChromeOptions::CAPABILITY, $chromeOptions);

// Chrome
$driver = RemoteWebDriver::create($serverUrl, $capabilities, 5000);

// Go to URL
$driver->get('https://www.boursorama.com/connexion/?org=/espace-membres/telecharger-cours/paris');

$driver->findElement(WebDriverBy::xpath('//*[@id="didomi-popup"]/div/div/div/span'))
->click();

// Find search element by its id, write 'PHP' inside and submit
$driver->findElement(WebDriverBy::xpath('/html/body/main/div/div[1]/div/div[2]/div/form/div[1]/div/div[1]/div/input')) // find search input element
->sendKeys($_ENV['USER']) // fill the search box
->findElement(WebDriverBy::xpath('/html/body/main/div/div[1]/div/div[2]/div/form/div[1]/div/div[2]/div/div/input')) // find search input element
->sendKeys($_ENV['PASSWORD']) // fill the search box
->submit(); // submit the whole form

$file_name = $driver->findElement(WebDriverBy::xpath('/html/body/main/div/div[1]/div[4]/div[1]/div/div/form/div[6]/div[2]/div/div/input'))
    ->getAttribute('value');

$driver->findElement(WebDriverBy::xpath('/html/body/main/div/div[1]/div[4]/div[1]/div/div/form/div[11]/div/input'))
    ->click();

sleep(5);

// Make sure to always call quit() at the end to terminate the browser session
$driver->quit();

if (preg_match('/(\d{2})\/(\d{2})\/(\d{4})/', $file_name, $matches)) {
    $jour = $matches[1];
    $mois = $matches[2];
    $annee = $matches[3];

    // Formatage de la date dans le format désiré
    $dateFormatee = $annee . '-' . $mois . '-' . $jour;

    $file_name = $downloadPath . 'SRD_' . $dateFormatee . '.txt';

    var_dump(file_get_contents($file_name));

    unlink($file_name);
}

