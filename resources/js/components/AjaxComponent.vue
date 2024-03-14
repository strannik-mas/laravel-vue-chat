<template>
    <div class="container">
        <h1>Props</h1>
        <button
            class="btn btn-default text mb-1"
            v-if="!is_refresh"
            @click="update"
        >
            Обновить - {{id}}...
        </button>
        <span class="badge badge-primary mb-1" v-if="is_refresh"></span>
        <table class="table">
            <thead>
            <tr>
                <th>
                    Naimenov
                </th>
                <th>
                    url
                </th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="url in urldata">
                    <td>{{url.title}}</td>
                    <td>{{url.url}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data: function (){
        return {
            urldata: [],
            is_refresh: false,
            id: 0
        }
    },
    mounted() {
        console.log('component mounted')
        this.update();
    },
    methods: {
        update: function () {
            console.log(this.urldata);

            this.is_refresh = true;
            axios.get('start/get-json').then((response) => {
                console.log(response);
                this.urldata = response.data;
                this.is_refresh = false;
                this.id++;
            })
        }
    }
}
</script>
<style scoped>
</style>