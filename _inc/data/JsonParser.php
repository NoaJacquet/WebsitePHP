<?php
declare(strict_types=1);

namespace data;

final class JsonParser{
    function getQuestions()
    {
        $source = 'Data/questions.json';
        $content = file_get_contents($source);
        $questions = json_decode($content, true);
        if (empty($questions)) {
            throw new Exception('No questions :(', 1);
        }
        return $questions;
    }
}