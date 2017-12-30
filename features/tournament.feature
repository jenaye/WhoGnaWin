Feature: Testing tournament entity

  Scenario: i list all of tournament
    When I go to "/tournament"
    Then I should see "Open d'Australie"
    Then I should see "Roland-Garros"
    Then I should see "Wimbledon"