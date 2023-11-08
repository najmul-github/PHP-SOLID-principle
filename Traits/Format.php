<?php

namespace Traits;

trait Format 
{
    // Structure questions and their answers.
    public function structureQuestions() {
        $questions = [];
    
        try {
            foreach ($this->questions as $row) {
            // Access object properties correctly
            $questionId = $row->id;
        
            if (!isset($questions[$questionId])) {
                $questions[$questionId] = [
                    'id' => $row->id,
                    'question' => $row->question,
                    'created_at' => $row->created_at,
                    'answers' => [],
                ];
            }
        
            if ($row->answer_id) {
                $answerId = count($questions[$questionId]['answers']) + 1;
                $questions[$questionId]['answers'][] = [
                    'id' => $answerId,
                    'answer' => $row->answer,
                ];
            }
        }
        
        // }catch (ResponseFormattingException $e) {
        }catch (\Exception $e) {
            // Handle response formatting exceptions
            $message = $e->getMessage(); // Get the exception message
            $code = $e->getCode(); // Get the exception code
            // $jsonResponse = $e->getErrorResponse(); // Get the error response from the exception
        }

        return $questions;
    }
}

?>