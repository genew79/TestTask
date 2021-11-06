<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Activity') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <table class='border border-green-800 m-auto'>
            <thead>
                <tr>
                    <th class="border border-green-600 p-2">URL</th>
                    <th class="border border-green-600 p-2">Count</th>
                    <th class="border border-green-600 p-2">Date</th>
                </tr>
                @foreach ($data['data'] as $item)
                    <tr>
                        <td class="border border-green-600 p-2">{{ $item['url'] }}</td>
                        <td class="border border-green-600 p-2 text-center">{{ $item['cnt'] }}</td>
                        <td class="border border-green-600 p-2">{{ $item['dt'] }}</td>
                    </tr>
                @endforeach
            </thead>
        </table>
    </div>
    <div class='text-center'>
        @for ($i = 1; $i <= $data['last_page']; $i++)
            <a
                href='?page={{ $i }}&perPage={{ $data['per_page'] }}'
                class='{{ $i == $data['current_page'] ? "font-bold" : "" }}'
            >{{ $i }}</a>
        @endfor
    </div>
</x-app-layout>

@php
    // var_dump($data);
@endphp
