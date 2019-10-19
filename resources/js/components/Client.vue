<template>
    <div>
        <div v-if="loading || response.error !== null" class="flex items-center justify-center self-center text-gray-400 h-32">
            <font-awesome-icon :icon="['fas', 'sync-alt']" class="fa-2x" spin v-if="loading" /> 
            <!-- <div class="ml-2" v-if="loading">Loading...</div> -->

            <div class="bg-red-200 text-red-800 py-3 px-4 w-full rounded" v-if="response.error !== null">
                Error! {{ response.error.message }}
            </div>
        </div>
        <div class="h-full" v-if="loading == false">
            <div v-if="!loading && latestResponse !== null">
                <div class="flex justify-between p-3 rounded mb-4" :class="{ 'bg-green-200 text-green-700': latestResponse.request.status == 200, 'bg-orange-200 text-orange-700': latestResponse.request.status != 200 }">
                    <span v-if="latestResponse.request.status == 200">
                        {{ latestResponse.data.message }}
                    </span>
                    <span v-if="latestResponse.request.statusText && latestResponse.request.status !== 200">
                        {{ latestResponse.request.statusText }}
                    </span>

                    <span v-if="latestResponse.request.status" class="text-sm text-baseline">
                        (code {{ latestResponse.request.status }})
                    </span>
                </div>
                <button type="button" @click="latestResponse = null" class="btn btn-primary">
                    <span v-if="latestResponse.request.status == 200">
                        Create Another Client
                    </span>
                    <span v-else>
                        Try Again
                    </span>
                </button>
            </div>
            <div v-if="method == 'create' && latestResponse == null">
                <form @submit.prevent="store()" method="POST">
                    <div class="form-group">
                        <label for="">Name <span class="required">*</span></label>
                        <input type="text" v-model="createForm.name" class="form-control" required>
                    </div>

                    <div class="sm:block md:flex md:justify-between">
                        <div class="form-group md:flex-1 md:mr-5">
                            <label for="">Email</label>
                            <input type="text" v-model="createForm.email" class="form-control">
                        </div>

                        <div class="form-group md:flex-1">
                            <label for="">Phone</label>
                            <input type="text" v-model="createForm.phone" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" v-model="createForm.address" class="form-control">
                    </div>

                    <div class="sm:block md:flex">
                        <div class="form-group md:mr-5 md:flex-1">
                            <label for="">City</label>
                            <input type="text" v-model="createForm.city" class="form-control">
                        </div>

                        <div class="form-group md:mr-5 md:flex-1">
                            <label for="">State</label>
                            <input type="text" v-model="createForm.state" class="form-control">
                        </div>

                        <div class="form-group md:flex-1">
                            <label for="">Postal</label>
                            <input type="text" v-model="createForm.postal" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Country</label>
                        <input type="text" v-model="createForm.country" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </form>
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
            latestResponse: null,
            response: {
                success: null,
                error: null,
            },
            createForm: {
                name: null,
                email: null,
                phone: null,
                address: null,
                city: null,
                state: null,
                postal: null,
                country: null,
            }
        };
    },
    mounted() {
        const vm = this;
        setTimeout(function () {
            vm.loading = false;
        }, 800);
    },
    methods: {
        store() {
            const vm = this;
            vm.loading = true;
            vm.latestResponse = null;

            axios.post(this.route('clients.store'), this.createForm)
                .then(response => {
                    console.log(response)
                    vm.latestResponse = response;

                    for (var key in vm.createForm) {
                        vm.createForm[key] = null;
                    }
                })
                .catch(error => {
                    vm.latestResponse = error;
                })
                .finally(function () {
                    setTimeout(function () {
                        vm.loading = false;
                    }, 1000);
                });
        }
    }
}
</script>