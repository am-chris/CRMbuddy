<template>
    <span :class="{ 'rounded': rounded }" @click="triggerEvent(event.eventName, event.eventPayload)">
        <slot></slot>
    </span>
</template>

<script>
import { EventBus } from './EventBus.js';

export default {
    props: {
        inlineBlock: {
            type: Boolean,
        },
        bg: {
            type: String,
        },
        rounded: {
            type: Boolean,
        },
        event: {
            type: Object,
            required: false,
            default: null,
        }
    },
    methods: {
        triggerEvent(eventName, eventPayload) {
            EventBus.$emit(eventName, eventPayload);
        }
    }
}
</script>