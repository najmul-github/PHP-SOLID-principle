<?php
// Load the dependencies
require_once 'vendor/autoload.php';
use Services\DatabaseService;
use Services\QuestionService;
use Formatters\QuestionFormatter;
use Repositories\ResponseRepository;

DatabaseService::createConnection();
function get() {
    // Create a new instance of the QuestionService, which implements the QuestionServiceContract
    $question   =   new QuestionService();

    // Attempt to retrieve questions with answers using the service
    $questions  =   $question->getQuestionsWithAnswers();
    
    // Structure questions and their answers.
    $formate   =   new QuestionFormatter($questions);
    $result = $formate->structureQuestions($formate);

    $response = new ResponseRepository();
    $jsonResponse = $response->success($result);

    return json_encode($jsonResponse);
}

echo get();