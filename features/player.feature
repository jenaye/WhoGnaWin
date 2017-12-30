Feature: Testing player entity

  Scenario: i list all of player
    When I go to "/player"
    Then I should see "Rafael Nadal"
    Then I should see "Roger Federer"
    Then I should see "Novak Djokovic"

  Scenario: Create a player
    When I send a "POST" request to "/player/new" with body:
    """
    {
      "name": "toto"
    }
    """
    Then the response status code should be 201