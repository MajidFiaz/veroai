@extends('layouts.app')
@section('content')

    <div class="container mx-auto">
        <!-- headaer -->
        <div class="px-5 py-5 flex justify-between items-center bg-white border-b-2">
            <div class="font-semibold text-2xl">VeroAI</div>
            <div class="w-1/2">

            </div>
            <div class="h-12 w-12 p-2 bg-yellow-500 rounded-full text-white font-semibold flex items-center justify-center">
                MF
            </div>
        </div>
        <!-- end header -->
        <!-- Chatting -->
        <div class="flex flex-row justify-between bg-white">
            <!-- chat list -->

            <!-- end chat list -->
            <!-- message -->
            <div class="w-full px-5 flex flex-col justify-between">
                <livewire:openai.conversation />

            </div>
            <!-- end message -->
        </div>
    </div>
@endsection
