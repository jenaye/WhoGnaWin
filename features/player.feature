Feature: Testing player entity

  Scenario: i list all of player
    When I go to "/player"
    Then I should see "Rafael Nadal"
    Then I should see "Roger Federer"
    Then I should see "Novak Djokovic"