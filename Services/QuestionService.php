<?php

namespace Services;
use Repositories\QuestionRepository;
use Repositories\ResponseRepository;

class QuestionService
{
    public function getQuestionsWithAnswers() {
        $response = new ResponseRepository();
        
        try {
            $question    = new QuestionRepository();
            $questions  =   $question->getQuestionsWithAnswers();
            return $questions;
            // return $response->success($questions);
        } catch (\Exception $e) {
            // Handle response formatting exceptions
            return $response->error($e->getCode(),$e->getMessage());
        }
    }
}

?>