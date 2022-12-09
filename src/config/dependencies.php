<?php
// config/dependencies.php

namespace Course\Config;
use DI\ContainerBuilder;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;


$definitions = [
        Environment::class => function () : Environment{
            $loader = new FilesystemLoader(__DIR__ . '/../exposition/twig_templates');
            $twig = new Environment($loader, [
                __DIR__ . '/../var/cache'
            ]);

            return $twig;
        }

    ];

return (new ContainerBuilder())->addDefinitions($definitions)->build();
