<?php

define('ARCHFIZZ_BASEPATH', __DIR__.'/..');

require ARCHFIZZ_BASEPATH . '/vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = ( ! (
    isset($_SERVER['HTTP_CLIENT_IP'])
    || isset($_SERVER['HTTP_X_FORWARDED_FOR'])
    || !in_array(@$_SERVER['REMOTE_ADDR'], [
        '127.0.0.1', 'fe80::1', '::1'
    ])
));

// Register service providers

$app->register(new Silex\Provider\TwigServiceProvider(), [
    'twig.path' => ARCHFIZZ_BASEPATH.'/app/views',
]);

$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

$app->register(new Silex\Provider\ServiceControllerServiceProvider());

// Define parameters and services

$app['twig'] = $app->share($app->extend('twig', function($twig, $app) {
    $twig->addFunction(new \Twig_SimpleFunction('asset', function ($asset) use ($app) {
        return sprintf('%s/%s',
            $app['request']->getBasePath(),
            ltrim($asset, '/')
        );
    }));

    return $twig;
}));

$app['version'] = $app->share(function() {
    return ArchFizz\Prototype\DigitalController::VERSION;
});

$app['ga'] = $app->share(function() {
    return [
        'tracking_code' => "UA-29516604-2",
        'property' => "archfizz.org"
    ];
});

$app['archfizz.controller'] = $app->share(function() use ($app) {
    return new ArchFizz\Prototype\DigitalController($app['twig']);
});

// Route Controller Actions

$app->get('/', 'archfizz.controller:indexAction')
    ->bind('homepage');

$app->get('/about', 'archfizz.controller:aboutAction')
    ->bind('about');

$app->get('/portfolio/', 'archfizz.controller:portfolioAction')
    ->bind('portfolio');

$app->get('/portfolio/university/y{universityYear}', 'archfizz.controller:portfolioUniversityAction')
    ->bind('portfolio_university')
    ->assert('universityYear', '[1|2|3|4]');

$app->get('/portfolio/{year}', 'archfizz.controller:portfolioByYearAction')
    ->bind('portfolio_by_year')
    ->assert('year', '20(09|10|11)');

$app->get('/portfolio/app/{appName}', 'archfizz.controller:portfolioByApplicationAction')
    ->bind('portfolio_by_app')
    ->assert('appName', '(autocad[2|3]d|creativesuite|3dsmax)');

// GO, GO, GO !!!

$app->run();
