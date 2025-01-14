<x-layout>
    <x-slot:heading>
        Jobs Page
    </x-slot:heading>


    {{-- Learn Blade Directives --}}

    @foreach($jobs as $job)
        <li>
            <a href="/jobs/{{ $job['id'] }}" class="text-blue-500 hover:underline">
                <strong>
                    {{ $job['title'] }}
                </strong>
                : Pays {{ $job['salary'] }} per Year
            </a>

        </li>

    @endforeach

</x-layout>

