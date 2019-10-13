@extends('layouts.app')

@section('content')
<h1 class="mb-4">Clients &sdot; Index</h1>
<table class="table-auto w-full bg-white shadow">
    <thead>
        <th class="py-3 px-3 text-gray-600 uppercase text-sm text-left">Name</th>
        <th class="py-3 px-3 text-gray-600 uppercase text-sm text-left">Email</th>
        <th class="py-3 px-3 text-gray-600 uppercase text-sm text-left">Phone</th>
    </thead>
    <tbody>
        @foreach ($clients as $client)
            <tr class="border-t">
                <td class="py-3 text-sm px-3">
                    {{ $client->name }}
                </td>
                <td class="py-3 text-sm px-3">
                    {{ $client->email }}
                </td>
                <td class="py-3 text-sm px-3">
                    {{ $client->phone }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection