<?php

namespace App\Livewire\OpenAI;

use App\Services\chatGPTService;
use Livewire\Component;
use App\Models\Conversation as ConversationModel;

class Conversation extends Component
{
    public $message;
    public $transactions ;
    protected $chatGPTService;

    public function boot(chatGPTService $chatGPTService)
    {
        $this->transactions = ConversationModel::orderBy('id','asc')->take(10)->pluck('chat')->toArray(); //getting last 10 record from database
        $this->chatGPTService = $chatGPTService;
    }
    public function render()
    {
        return view('livewire.open-a-i.conversation');
    }

    public function send()
    {
        if (! empty($this->message)) {
            $response = $this->chatGPTService->communication($this->message);
            $chat = ['request' => $this->message, 'response' => $response]; // request is user query and response is Bot response
            ConversationModel::insert(["chat"=>json_encode($chat)]); // saving chat history
            $this->transactions[] = $chat; // for showing to user latest request and response
            $this->message = '';
        }
    }
}
