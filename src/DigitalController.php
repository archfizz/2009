<?php

namespace ArchFizz\Prototype;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * "You freak, you creep, you DigitalController.
 *  You're like, that's right, a DigitalController."
 */
class DigitalController
{
    const VERSION = '0.9.0-DEV';

    /**
     * @var \Twig_Environment
     */
    protected $twig;

    /**
     * @param \Twig_Environment $twig
     */
    public function __construct(\Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @param string $template
     * @param array  $params
     *
     * @return Response
     */
    private function renderResponse($template, array $params = [], $statusCode = Response::HTTP_OK)
    {
        return new Response($this->twig->render($template, $params), $statusCode);
    }


    public function indexAction(Request $request)
    {
        return $this->renderResponse('index.html.twig');
    }

    public function aboutAction(Request $request)
    {
        return $this->renderResponse('about.html.twig');
    }

    public function portfolioAction(Request $request)
    {
        return $this->renderResponse('Portfolio/index.html.twig');
    }

    public function portfolioUniversityAction(Request $request, $universityYear)
    {
        return $this->renderResponse(sprintf('Portfolio/y%d.html.twig', (int) $universityYear));
    }

    public function portfolioByYearAction(Request $request, $year)
    {
        return $this->renderResponse('Portfolio/byYear.html.twig', [ 'year' => (int) $year ]);
    }

    public function portfolioByApplicationAction(Request $request, $appName)
    {
        return $this->renderResponse(sprintf('Portfolio/%s.html.twig', $appName));
    }
}
