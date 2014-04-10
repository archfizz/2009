<?php

use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\MinkExtension\Context\MinkContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Behat\Tester\Exception\PendingException;

/**
 * Behat context class.
 */
class FeatureContext extends MinkContext implements SnippetAcceptingContext
{
    private $routes = [];

    /**
     * Initializes context.
     *
     * Every scenario gets it's own context object.
     * You can also pass arbitrary arguments to the context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->routes = [
            'homepage' => '/'
        ];
    }

    /**
     * @Given I am on the :page
     */
    public function iAmOnThe($page)
    {
        $this->visit($this->routes[$page]);
    }
}
