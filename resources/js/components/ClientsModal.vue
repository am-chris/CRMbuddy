<template>
    <div>
        <button type="button" class="border border-blue-600 hover:bg-blue-600 text-blue-400 hover:text-blue-100 text-xs p-1 mb-0 rounded" @click="modalOpen = !modalOpen">
            <font-awesome-icon :icon="['fas', 'plus']" fixed-width />
        </button>
    </div>
</template>

<script>
export default {
    props: {
        inlineOrBlock: {
            type: String,
            required: false,
            default: 'block',
        },
        action: {
            type: String,
            required: true,
        },
        id: {
            type: Number,
            required: false,
            default: null,
        }
    },

    data() {
        return {
            modalOpen: false,
        };
    },

    mounted() {
        
    }
}
</script>