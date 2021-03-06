Feature: Category CRUD
  In order to create downloads in backend
  As a user
  I want to see, create, edit and delete downloads

  Background:
    Given admin user

  Scenario: See Index
    Given I am logged in as admin
    Given I am on "/admin/enhavo/download/download/index"
    Then I should be on "/admin/enhavo/download/download/index"
    And the response status code should be 200