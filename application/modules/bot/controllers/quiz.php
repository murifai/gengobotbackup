<?php
require_once __DIR__ . '/../models/Dbs.php'; // Database interaction class
require_once 'flex.php'; // Flex message creation class

class QuizModule {
    private $db;
    private $userId;
    private $flex;

    public function __construct($userId) {
        $this->CI =& get_instance();  // Get the CI instance
        $this->userId = $userId;
        $this->CI->load->model('Dbs');  // Load the Dbs model
        $this->flex = new Flex();
        $this->db = $this->CI->Dbs;  // Reference to the Dbs model
    }

    public function startNewSession($level) {
        // Update the database to start a new session
        $this->Dbs->updateQuizSession($userId, [
            'current_question' => null,
            'session_state' => 'active',
            'jlptlevel' => $level,
            'quiz_score' => 0
        ]);
    }

    public function endSession() {
        // Mark the session as ended in the database
        $this->db->endSession($this->userId);
        // Get and return the final score from the database
        return "Your final score is: " . $this->db->getUserScore($this->userId);
    }

    public function getTableForLevel($level) {
        switch($level) {
            case 'N1': return 'soaln1';
            case 'N2': return 'soaln2';
            case 'N3': return 'soaln3';
            case 'N4': return 'soaln4';
            case 'N5': return 'soaln5';
            default: return null;
        }
    }

    public function loadRandomQuestion($level) {
        $tableName = $this->getTableForLevel($level);
        if (!$tableName) {
            log_message('error', "No table found for level: {$level}");
            return null;
        }

        $questionData = $this->db->getRandomQuestionByTableName($tableName);  // Correct method call
        if ($questionData) {
            // Update the current question in the database
            $this->db->setCurrentQuestion($this->userId, $questionData->nosoal);
            return $questionData;
        } else {
            log_message('error', "No questions found or error in retrieving data from: {$tableName}");
            return null;
        }
    }

    public function checkAnswer($userAnswer, $level) {
        $currentQuestion = $this->db->getCurrentQuestion($this->userId, $level);
        if ($currentQuestion) {
            $correct = strtolower($userAnswer) === strtolower($currentQuestion->kunjaw);
            if ($correct) {
                // Update the user score in the database
                $this->db->updateUserScore($this->userId, 10); // Assume each correct answer gives 10 points
                $feedback = "Correct! Explanation: " . $currentQuestion->penjelasan;
            } else {
                $feedback = "Incorrect! The correct answer was: {$currentQuestion->kunjaw}. Explanation: {$currentQuestion->penjelasan}";
            }
            return $feedback;
        }
        return "Sorry, there was an error or no active question.";
    }

    public function generateFlexMessage($questionData) {
        if (!$questionData) {
            log_message('error', 'No question data provided for Flex message generation.');
            return null;
        }
        
        return $this->flex->latihan(
            $questionData->nosoal, $questionData->soal, $questionData->pil_1, $questionData->pil_2,
            $questionData->pil_3, $questionData->pil_4, $questionData->pil_1, $questionData->pil_2,
            $questionData->pil_3, $questionData->pil_4
        );
    }

}
?>