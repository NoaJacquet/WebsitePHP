<?php
declare(strict_types=1);

namespace Classes\Quiz;

use data\Json\JsonParser;
use data\Sqlite\QueryBD;
use Classes\Form\Factory;
use Classes\Quiz\QuizHandler;

final class TemplateQuiz{

    public static function show($namefile, $namepage){
        $json = new JsonParser();
        $questions = $json->getQuestions($namefile);

        echo "<a href='index.php'>Revenir à l'Accueil</a>".PHP_EOL;
        echo '<h1>'.$namepage.' : </h1>';
        echo '<form method="post" action="' . $_SERVER["PHP_SELF"] . '">';
        foreach ($questions as $question){
            $q = Factory::create($question['type'], $question['label'], $question['uuid'], $question['choices']);
            echo $q->render().PHP_EOL;
        }
        echo '<input type="submit" value="Valider" />';
        echo '</form>';

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $quizHandler = new QuizHandler();
            $quizHandler->verification($_POST, $questions);
        }
    }
}