Feature: Test
  Scenario: Home Page
    Given I am on the homepage
    Then print current URL
    Then I should see "login"

  Scenario: Dashboard is locked to guest
    When I go to "home"
    And the url should match "login"
    And print current URL
    And I fill in "email" with "ha_daniel@hotmail.fr"
    And I fill in "password" with "000000"
    And I press "loginBtn"
    When I go to "/home"
    And print current URL
    Then I should see "Dashboard"
