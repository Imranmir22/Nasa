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

                    <a href="save-employee" style="color:red">Register Employee</a><br>
                    <a href="save-company" style="color:red">Register Company </a>
                    <label>Register The Company With different types of validation in Form Request Class(with additional methods) And Usage of Rule class</label><br>
                    <a href="employee" style="color:red">Total Employees</a><br>
                    <a href="company" style="color:red">Total Companies</a><br>
                    <a href="middlewares" style="color:red">Middlewares</a>
                    <label>Middlewares (custom middleware ,auth middleware and passing data to middleware)</label><br>
                    <a href="user_manual_login" style="color:red">User Manual Login</a>
                    <label>User Manual login and different Auth functions</label><br>
                    <a href="storage-functions" style="color:red">Storage</a>
                    <label>Storage and its functions</label><br>
                    <a href="company/gate_policies/1" style="color:red">Gate Policies</a>
                    <label>Learn Gate And Policies (Advanced Authorization)</label><br>

                    <a href="all-companies" style="color:red">List Companies</a>
                    <label>List All Companies</label><br>


            </div>
        </div>
    </div>
</x-app-layout>
