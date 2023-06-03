<template>
    <h1>Register Here</h1>
    <input type="text" placeholder="fname" ref="fname">
    <input type="text" placeholder="lname" ref="lname">
    <input type="text" placeholder="email" ref="email">
    <input type="password" placeholder="password" ref="password">
    <button @click="submit" class="btn btn-success">Submit</button>
</template>

<script>
    import axios from 'axios';

    export default {
        methods: {
            submit() {
                const data = {
                    fname: this.$refs.fname.value,
                    lname: this.$refs.lname.value,
                    email: this.$refs.email.value,
                    password: this.$refs.password.value
                };

                axios.post('/api/createStudent', data)
                    .then(response => {
                        // Handle success response
                        console.log('Insert Success!');
                    })
                    .catch(error => {
                        // Handle error response
                        console.error(error);
                    });
            },
        }
    }
</script>