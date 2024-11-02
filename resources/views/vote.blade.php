<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vote') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session('success'))
                        <div class="mb-4 text-green-600">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="mb-4 text-red-600">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if (!$userHasVoted)
                        <form method="POST" action="{{ route('vote.store') }}">
                            @csrf
                            <div class="mb-4">
                                <label for="option" class="block text-gray-700 text-sm font-bold mb-2">Choose an option:</label>
                                <select name="option" id="option" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    <option value="Option A">Option A</option>
                                    <option value="Option B">Option B</option>
                                    <option value="Option C">Option C</option>
                                </select>
                            </div>
                            <div class="flex items-center justify-between">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                    Vote
                                </button>
                            </div>
                        </form>
                    @else
                        <p class="text-gray-700">You have already voted. Thank you for your participation!</p>
                    @endif

                    <div class="mt-8">
                        <h3 class="text-lg font-semibold mb-4">Current Results:</h3>
                        @foreach ($votes as $option => $count)
                            <div class="mb-2">
                                <span class="font-medium">{{ $option }}:</span> {{ $count }} votes
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>