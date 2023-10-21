<div>
    <div class=" h-fit overflow-hidden">
        <div class="flex flex-col mt-5 overflow-y-auto scrollbar w-full max-h-96">
            @foreach($transactions as $transaction)
                <div class="flex justify-end mb-4">
                    <div class="mr-2 py-3 px-4 bg-blue-400 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white">
                        @if(!is_array($transaction))
                            {{json_decode($transaction)->request}}
                        @else
                            {{$transaction['request']}}
                        @endif
                    </div>
                    <div
                        class="h-12 w-12 p-2 bg-yellow-500 rounded-full text-white font-semibold flex items-center justify-center">
                        MF
                    </div>
                </div>
                <div class="flex justify-start mb-4">
                    <img
                        src="https://static.vecteezy.com/system/resources/previews/022/227/365/non_2x/openai-chatgpt-logo-icon-free-png.png"
                        class="object-cover h-8 w-8 rounded-full"
                        alt=""/>
                    <div class="ml-2 py-3 px-4 bg-gray-400 rounded-br-3xl rounded-tr-3xl rounded-tl-xl text-white">
                        @if(!is_array($transaction))
                            {{json_decode($transaction)->response}}
                        @else
                            {{$transaction['response']}}
                        @endif
                    </div>
                </div>
            @endforeach
            <div id="scrollHere"></div>
        </div>
    </div>
    <div class="py-5">
        <div wire:loading>
            <span class="relative flex h-3 w-3">
              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
              <span class="relative inline-flex rounded-full h-3 w-3 bg-sky-500"></span>
            </span>
        </div>
        <input wire:model.defer="message" wire:keydown.enter="send" wire:loading.attr="disabled" id="chat"
               class="w-full bg-gray-300 py-5 px-3 rounded-xl" type="text"
               placeholder="type your message here..."/>

    </div>
</div>
