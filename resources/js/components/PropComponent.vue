<template>
    <div class="container">
        <h1>Props</h1>
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
export default {
    props: ['urldata'],
    mounted() {
        console.log('component mounted')
        this.update();
    },
    methods: {
        update: function () {
            if (typeof this.urldata !== 'undefined') {
                console.log(this.urldata);
            }
        }
    }
}
</script>
<style scoped>
</style>