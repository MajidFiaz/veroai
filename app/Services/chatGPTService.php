<?php

namespace App\Services;

use OpenAI\Laravel\Facades\OpenAI;

class chatGPTService
{
    public function communication($question)
    {
        $response = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo', // there are different model for chatGPT like gpt-3.5-turbo
            'messages' => [['role' => 'user', 'content' => $question]],
            'max_tokens' => 600,
            'temperature' => 0.6,
        ]);
        // for text-davinci-003 and limited to 80 character
        /*$response = OpenAI::completions()->create([
            'model' => 'text-davinci-003',
            'prompt' => $question,
        ]);
        return $response->choices[0]->text;*/
        return $response->choices[0]->message->content; //getting content from chatGBT response
    }
}
