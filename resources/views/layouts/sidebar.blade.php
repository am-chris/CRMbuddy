<div class="bg-gray-900 h-full w-56 fixed mt-12">
    <ul class="list-none mt-2">
        <li class="mb-0">
            <a href="{{ route('home') }}" class="text-gray-500 text-sm px-4 py-3 hover:text-gray-200 hover:bg-gray-800 block">Home</a>
        </li>
        <li class="flex justify-between items-center mb-0 block hover:text-gray-200 hover:bg-gray-800 px-4 py-3">
            <a href="{{ route('clients.index') }}" class="text-gray-500 hover:text-gray-300 text-sm">Clients</a>
            {{-- <a href="{{ route('clients.create') }}" class="border border-blue-600 hover:bg-blue-600 text-blue-400 hover:text-blue-100 text-xs p-1 mb-0 rounded">
                <font-awesome-icon :icon="['fas', 'plus']" fixed-width />
            </a> --}}
            <cbutton
                inline-block
                rounded
                :event="{ eventName: 'modal', eventPayload: { modalTitle: 'Create Client', component: 'Client', method: 'create', url: {{ json_encode(route('clients.store')) }} } }"
                class="border border-blue-600 hover:bg-blue-600 text-blue-400 hover:text-blue-100 hover:pointer text-xs p-1 mb-0"
            >
                <font-awesome-icon :icon="['fas', 'plus']" fixed-width />
            </cbutton>
            {{-- <clients-modal
                action="create"
                inline-or-block="inline"
            ></clients-modal> --}}
        </li>
    </ul>
</div>