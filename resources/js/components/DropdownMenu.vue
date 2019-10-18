<template>
    <div class="relative">
        <button type="button" class="btn bg-gray-200" :class="dropdown.visible ? 'bg-gray-300' : ''" @click="dropdown.visible = !dropdown.visible">
            <font-awesome-icon :icon="['fas', 'chevron-up']" fixed-width v-if="dropdown.visible"></font-awesome-icon>
            <font-awesome-icon :icon="['fas', 'chevron-down']" fixed-width v-else></font-awesome-icon>
        </button>

        <ul class="list-none absolute block w-40 py-1 mt-1 -ml-32 bg-white shadow-lg border z-10" v-if="dropdown.visible">
            <li class="" v-for="(item, i) in items" :key="i">
                <a class="block text-gray-700 hover:text-gray-900 hover:bg-gray-100 px-3 py-2" @click="triggerEvent(item.eventName, item.eventPayload)">
                    {{ item.text }}
                </a>
            </li>
        </ul>
    </div>
</template>

<script>
import { EventBus } from './EventBus.js';

export default {
    props: {
        items: {
            type: Array,
            required: true,
        },
    },
    
    data() {
        return {
            dropdown: {
                visible: false,
            }
        };
    },

    methods: {
        triggerEvent(eventName, eventPayload) {
            EventBus.$emit(eventName, eventPayload);
        }
    }
}
</script>