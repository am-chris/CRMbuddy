<template>
    <transition name="fade">
        <div class="fixed top-0 bottom-0 right-0 left-0 z-40 overflow-auto flex" style="background-color: rgba(9, 18, 43, 0.6)" v-if="modal.visible">
            <div class="relative bg-white w-full mt-16 max-w-xl m-auto flex-col flex rounded z-50 shadow-xl modal">
                <div class="p-4 rounded-tr rounded-tl" :class="modal.method == 'destroy' ? 'bg-red-200 text-red-800' : 'border-b bg-gray-200 text-gray-700'">
                    <h1 class="font-bold uppercase">
                        {{ modal.title }}
                    </h1>
                    <span class="absolute pt-3 pr-2 top-0 right-0" @click="modal.visible = false">
                        <svg class="h-6 w-6 fill-current text-grey hover:text-grey-darkest" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                </div>
                <div class="modal-body p-4 py-6">
                    <client 
                        :method="modal.method"
                        :is="modal.component" 
                        v-if="modal.component !== null"
                    ></client>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
import { EventBus } from './EventBus.js';
const Client = () => import('./Client.vue');

export default {
    components: {
        Client,
    },

    data() {
        return {
            modal: {
                visible: false,
                title: null,
                method: null,
                url: null,
                component: null,
            },
        };
    },

    created() {
        EventBus.$on('modal', eventPayload => {
            const vm = this;
            this.modal.visible = false;

            this.modal.title = eventPayload.modalTitle;
            this.modal.method = eventPayload.method;
            this.modal.url = eventPayload.url;
            this.modal.component = eventPayload.component;

            EventBus.$emit('modal-view', eventPayload);

            setTimeout(function () {
                vm.modal.visible = true;
            }, 100);
        });
    }
}
</script>