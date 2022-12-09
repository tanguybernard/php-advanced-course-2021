<?php
namespace Course\Exposition\SlimApi\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Psr7\Response;
use Twig\Environment;

class HomePageHandler implements RequestHandlerInterface
{
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {

        $response = new Response();
        $response->getBody()->write(
            $this->twig->render('home/index.html.twig', [
                'words' => ['voiture', 'camion', 'chocolat']
            ])
        );
        return $response;
    }
}