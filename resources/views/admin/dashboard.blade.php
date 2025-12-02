<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Halaman Administrator PSB
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-2">
                        Assalamu'alaikum, {{ auth()->user()->name }} (Administrator) 👋
                    </h3>
                    <p class="text-sm text-gray-700">
                        Di sini nanti kita isi menu untuk pengelolaan PSB.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
