Feature: Visiting the homepage and portfolio page
  In order to crawl my website
  As a visitor
  I need to be able to follow links

Scenario: Go to homepage and click the link to the portfolio section of the site
  Given I am on the "homepage"
  Then I should see "Welcome to ArchFizz"
  When I follow "Portfolio"
  Then I should see "Here you will find all my work created for study, for clients and for myself"
