@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<div class="max-w-3xl mx-auto p-6 bg-white shadow-2xl rounded-2xl mt-10 animate__animated animate__fadeInDown">
    <h2 class="text-4xl font-bold mb-8 text-center text-blue-600 animate__animated animate__fadeInUp">{{ $quiz->title }}</h2>

    <form action="{{ route('quiz.submit', $quiz->id) }}" method="POST" class="space-y-6 animate__animated animate__fadeInUp animate__delay-1s">
        @csrf

        @foreach ($quiz->questions as $index => $question)
            <div class="bg-gray-100 p-5 rounded-xl shadow hover:shadow-lg transition duration-300">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">{{ $index + 1 }}. {{ $question->question }}</h3>

                @foreach ($question->answers as $answer)
                    <div class="flex items-center mb-2">
                        <input class="hidden peer" type="radio" name="question[{{ $question->id }}]" value="{{ $answer->id }}" id="a{{ $answer->id }}" required>
                        <label for="a{{ $answer->id }}" class="flex-1 cursor-pointer px-4 py-2 bg-white border border-gray-300 rounded-lg peer-checked:bg-blue-500 peer-checked:text-white transition duration-300">
                            {{ $answer->answer }}
                        </label>
                    </div>
                @endforeach
            </div>
        @endforeach

        <div class="text-center">
            <button type="submit" class="mt-6 px-8 py-3 text-lg font-semibold bg-gradient-to-r from-green-400 to-blue-500 text-black rounded-xl shadow-md hover:shadow-xl hover:scale-105 transform transition duration-300 animate__animated animate__pulse animate__infinite">
                Submit Quiz
            </button>

        </div>
    </form>
</div>
@endsection
