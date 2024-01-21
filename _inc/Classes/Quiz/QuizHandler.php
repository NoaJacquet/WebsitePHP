<?php
declare(strict_types=1);

namespace Classes\Quiz;

final class QuizHandler{

    public static function verification($post, $questions){
        $score = 0;
        $score_total = 0;
        $userAnswers = $post;
        foreach ($questions as $question) {
            $score +=1;
            $uuid = $question['uuid'];
            $correctAnswer = $question['correct'];
            $userAnswer = $userAnswers[$uuid];
            if ($userAnswer === $correctAnswer) {
                echo "Bonne réponse pour la question $uuid.<br>";
                $score_total +=1;
            } else {
                echo "Mauvaise réponse pour la question $uuid. La réponse correcte est $correctAnswer.<br>".PHP_EOL;
            }
        }
        echo "Votre score est de $score_total / $score";
    
    }
}