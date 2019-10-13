@extends('layouts.app')

@section('content')
<div class="page-header">
    <h1 class="page-title">Client Index</h1>
    <div class="breadcrumbs">
        <a href="{{ route('clients.index') }}" class="active">Client Index</a> 
    </div>
</div>

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