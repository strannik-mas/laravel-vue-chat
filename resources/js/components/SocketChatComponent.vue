<template>
    <div class="container">
        <h1>Chat</h1>
        <div class="row">
            <div class="col-sm-12">
                <div class="from-group">
                    <textarea rows="6" readonly class="form-control">{{dataMessages.join('')}}</textarea>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="enter msg" v-model="message">
                </div>
                <div class="input-group-append">
                    <button
                        class="btn btn-default text mb-1"
                        @click="sendMessage"
                    >
                        send
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data: function (){
        return {
            dataMessages: [],
            message: ""
        }
    },
    mounted() {
        console.log('component mounted');
        var socket = io('http://laravel-vue-chat:3000');

        socket.on("laravel_database_new-message:App\\Events\\NewMessage", function (data){
            console.log(data);
            this.dataMessages.push(data.message);
        }.bind(this));
    },
    methods: {
        sendMessage: function () {
            //console.log(this.message);

            axios.post('start/send-message', {message: this.message}).then((response) => {
                //console.log(response);
                this.message = "";
            })
        }
    }
}
</script>
<style scoped>
</style>