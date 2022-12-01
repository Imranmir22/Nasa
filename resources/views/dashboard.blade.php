<script src="https://cdn.tailwindcss.com"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
             
                    <a href="google" style="color:red">Google Docs</a><br>
                    <label for="floatingInputValue bg-secondry">Click to store Docs to Database</label>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
