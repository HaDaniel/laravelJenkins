Feature: Test
  Scenario: Home Page
    Given I am on the homepage
    Then print current URL
    Then I should see "login"

  Scenario: Dashboard is locked to guest
    When I go to "home"
    Then the url should match "login"
    Then print current URL
    When I fill in "email" with "ha_daniel@hotmail.fr"
    When I fill in "password" with "000000"
    When I press "Login"
    Then print current URL
