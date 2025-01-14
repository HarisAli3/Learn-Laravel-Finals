<x-layout>
    <x-slot:heading>
        Home Page
    </x-slot:heading>

{{--
    <p>Hello Welcome, {{ $name }} </p>
--}}

    {{-- Learn Blade Directives --}}

    @foreach($jobs as $job)
        <li>
            <strong>
                {{ $job['title'] }}
            </strong>
            : Pays {{ $job['salary'] }} per Year
        </li>

    @endforeach


</x-layout>
