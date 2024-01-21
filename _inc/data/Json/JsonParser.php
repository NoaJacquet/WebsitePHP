<?php
declare(strict_types=1);

namespace data\Json;

final class JsonParser{
    function getQuestions($namefile)
    {
        $source = 'Data/'.$namefile;
        $content = file_get_contents($source);
        $questions = json_decode($content, true);
        if (empty($questions)) {
            throw new Exception('No questions :(', 1);
        }
        return $questions;
    }
}