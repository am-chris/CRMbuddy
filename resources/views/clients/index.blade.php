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
        <th class="py-3 px-3 w-12"></th>
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
                <td class="w-12 px-3">
                    <dropdown-menu
                        :items="[
                            { text: 'View', eventName: 'modal', eventPayload: { modalTitle: 'Viewing Client', id: {{ $client->id }}, component: 'Client', method: 'show', url: {{ json_encode(route('clients.show', $client->id)) }} } }, 
                            { text: 'Edit', eventName: 'modal', eventPayload: { modalTitle: 'Editing Client', id: {{ $client->id }}, component: 'Client', method: 'edit', url: {{ json_encode(route('clients.update', $client->id)) }} } }, 
                            { text: 'Delete', eventName: 'modal', eventPayload: { modalTitle: 'Delete Client', id: {{ $client->id }}, component: 'Client', method: 'destroy', url: {{ json_encode(route('clients.destroy', $client->id)) }} } }
                        ]"
                    ></dropdown-menu>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection