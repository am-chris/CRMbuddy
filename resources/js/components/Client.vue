<template>
    <div>
        <div v-if="loading || response.error !== null" class="flex items-center justify-center self-center text-gray-600 h-16">
            <font-awesome-icon :icon="['fas', 'sync-alt']" spin v-if="loading" /> 
            <div class="ml-2" v-if="loading">Loading...</div>

            <div class="bg-red-200 text-red-800 py-3 px-4 w-full rounded" v-if="response.error !== null">
                Error! {{ response.error.message }}
            </div>
        </div>
        <div class="h-full" v-if="loading == false">
            <div v-if="method == 'create'">
                create...
            </div>
            <div v-if="method == 'show'">
                show...
            </div>
            <div v-if="method == 'edit'">
                edit...
            </div>
            <div v-if="method == 'destroy'">
                destroy...
            </div>            
        </div>
    </div>
</template>

<script>
import { EventBus } from './EventBus.js';

export default {
    name: 'Client',
    props: {
        method: {
            type: String,
            required: true,
        }
    },
    data() {
        return {
            loading: true,
            url: null,
            response: {
                success: null,
                error: null,
            }
        };
    },
    mounted() {
        const vm = this;
        setTimeout(function () {
            vm.loading = false;
        }, 1200);
    }
}
</script>