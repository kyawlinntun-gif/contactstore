<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h1>Add Contact</h1>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="edit ? editContact(editId) : newContact()">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="contact.name" class="form-control" v-model="contact.name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="contact.email" class="form-control" v-model="contact.email">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" id="phone" name="contact.phone" class="form-control" v-model="contact.phone">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="New Contact" v-show="!edit">
                                <input type="submit" class="btn btn-primary" value="Edit Contact" v-show="edit">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card mt-5" v-if="lists">
                    <div class="card-header">
                        <h1>Contact</h1>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-items" v-for="list in lists.contacts">
                                <strong>{{ list.name }}</strong> {{ list.email }} {{ list.phone }}
                                <button @click="showData(list.id)">Edit</button>
                                <button @click="deleteContact(list.id)">Delete</button>
                            </li>
                        </ul>
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
                lists: [],
                contact: {
                    name: '',
                    email: '',
                    phone: '',
                },
                editId: '',
            }
        },
        mounted() {
            console.log('Component mounted.');
            this.getData();
        },
        methods: {
            getData() {
                axios.get('contact/all')
                .then((response) => {
                    console.log('Getting the components');
                    this.lists = response.data;
                    this.contact.name ='',
                    this.contact.email ='',
                    this.contact.phone =''

                })
                .catch(errors => {
                    console.log(errors.response);
                });
            },
            newContact() {
                axios.post('contact', this.contact)
                .then(response => {
                    console.log('Inserting the new data');
                    this.getData();
                })
                .catch(errors => {
                    console.log(errors.response);
                })
            },
            showData(id){
                axios.get('contact/'+id)
                .then(response => {
                    console.log('Get the edit data');
                    this.editId = response.data.contact.id;
                    this.contact.name = response.data.contact.name;
                    this.contact.email = response.data.contact.email;
                    this.contact.phone = response.data.contact.phone;
                    this.edit = true;
                    // console.log(response.data);
                })
                .catch(errors => {
                    console.log(errors.response);
                });
            },
            editContact(editId)
            {
                axios.patch('contact/'+editId, this.contact)
                .then(response => {
                    console.log('Edit the data');
                    this.contact.name = '';
                    this.contact.email = '';
                    this.contact.phone = '';
                    this.edit = false;
                    this.getData();
                });
            },
            deleteContact(deleteId)
            {
                axios.delete('contact/'+deleteId)
                .then(response => {
                    console.log("Delete the data");
                    this.getData();
                })
                .catch(errors => {
                    console.log(errors.response);
                });
            }
        }
    }
</script>
