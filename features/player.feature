Feature: Testing player entity

  Scenario: Create a player
    When I send a "POST" request to "/player/new/Male" with body:
    """
    {"name": "exemple", "gender": "Male", "age": "32"}
    """
    Then the response status code should be 201
    And the response should be in JSON
    And the header "Content-Type" should be equal to "application/ld+json"
