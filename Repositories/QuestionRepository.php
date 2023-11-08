<?php

namespace Repositories;

use Illuminate\Database\Capsule\Manager as DB;
use Interfaces\QuestionInterface;

// use Interfaces\QuestionInterface;

class QuestionRepository implements QuestionInterface{

    // public function __construct() {}

    /**
     * Retrieve questions with associated answers from the database.
     *
     * This method constructs a structured array of questions and their answers.
     *
     * @return array An array containing questions with their associated answers.
     */
    public function getQuestionsWithAnswers() {

        $query = DB::table('questions')
                    ->select('questions.id', 'questions.question', 'questions.created_at', 'answers.id AS answer_id', 'answers.answer')
                    ->leftJoin('answers', 'questions.id', '=', 'answers.question_id')
                    ->orderBy('answers.id', 'asc')
                    ->get();
                    
        return $query;

        // return array_values($questions);
    }
}

?>