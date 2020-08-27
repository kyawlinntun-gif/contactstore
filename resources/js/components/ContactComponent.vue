<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h1>Contact</h1>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="edit ? editContact : newContact">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="contact.name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="contact.email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" id="phone" name="contact.phone" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="New Contact" v-show="!edit">
                                <input type="submit" class="btn btn-primary" value="Edit Contact" v-show="edit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return{
                edit: false,
                lists: {},
                contact: {
                    name: '',
                    email: '',
                    phone: ''
                }
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
