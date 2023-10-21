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
        $this->transactions = ConversationModel::orderBy('id','asc')->take(10)->pluck('chat')->toArray();
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
            $chat = ['request' => $this->message, 'response' => $response];
            ConversationModel::insert(["chat"=>json_encode($chat)]);
            $this->transactions[] = $chat;
            $this->message = '';
        }
    }
}
