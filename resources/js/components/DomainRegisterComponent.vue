<template>
    <div>
        <form method="POST" enctype="multipart/form-data" @submit.prevent="submitDomain">
            <div class="form-group">
                <label for="category">Select a category</label>
                <select id="category" class="form-control" v-model="form.category_id">
                    <option v-for="category in this.categories" :value="category.id">{{category.category_name}}</option>
                </select>
            </div>
            <div class="form-group">
                <label for="sub_category">Select a subcategory if you wish</label>
                <select id="sub_category" class="form-control" v-model="form.subcategory_id">
                    <option v-for="subcategory in filteredSubcategories" :value="subcategory.id">
                        {{subcategory.sub_category_name}}
                    </option>
                </select>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" id="email" :class="{'is-invalid':form.errors.has('email')}" class="form-control"
                           placeholder="Please enter your email address"
                           v-model="form.email" @keydown="form.errors.clear('email')">
                    <div class="invalid-feedback" v-show="form.errors.has('email')"
                         v-text="form.errors.get('email')"></div>
                </div>
                <div class="form-group col-md-6">
                    <label for="url">Enter your domain url</label>
                    <input type="text" id="url" :class="{'is-invalid':form.errors.has('url')}" class="form-control"
                           placeholder="https://your-domain.com"
                           v-model="form.url" @keydown="form.errors.clear('url')">
                    <div class="invalid-feedback" v-show="form.errors.has('url')" v-text="form.errors.get('url')"></div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="file" name="img" id="img" class="form-control-file">
            </div>
            <div class="form-group">
                <label for="title">Title of your domain</label>
                <input type="text" :class="{'is-invalid':form.errors.has('title')}" class="form-control" id="title"
                       name="title" v-model="form.title" @keydown="form.errors.clear('title')">
                <div class="invalid-feedback" v-show="form.errors.has('title')" v-text="form.errors.get('title')"></div>
            </div>
            <div class="form-group">
                <label for="short_desc">Short description</label>
                <input type="text" name="short_desc" id="short_desc"
                       :class="{'is-invalid':form.errors.has('short_desc')}" class="form-control"
                       v-model="form.short_desc" @keydown="form.errors.clear('short_desc')">
                <div class="invalid-feedback" v-show="form.errors.has('short_desc')" v-text="form.errors.get('short_desc')"></div>
            </div>
            <div class="form-group">
                <vue-editor v-model="form.desc"></vue-editor>
            </div>
            <button type="submit" class="btn btn-success">Submit your domain</button>
        </form>
    </div>
</template>

<script>
    export default {
        name: "DomainRegisterComponent",
        props: ['categories', 'subcategories'],
        data() {
            return {
                form: new Form({
                    email: '',
                    title: '',
                    url: '',
                    short_desc: '',
                    desc: '',
                    category_id: '',
                    subcategory_id: '',
                })
            }
        },
        methods: {
            submitDomain() {
                let data = new FormData();
                data.append('title', this.form.title);
                data.append('email', this.form.email);
                data.append('url', this.form.url);
                data.append('short_desc', this.form.short_desc);
                data.append('desc', this.form.desc);
                data.append('category_id', this.form.category_id);
                data.append('subcategory_id', this.form.subcategory_id);
                if (document.getElementById('img').files[0]) {
                    data.append('img', document.getElementById('img').files[0])
                }

                axios.post('/domain', data)
                    .then((response) => {
                        this.form.reset()
                    })
                    .catch(error => this.form.errors.record(error.response.data));

            }
        },
        computed: {
            filteredSubcategories: function () {
                return this.subcategories.filter((item) => item.category_id === this.form.category_id);
            }
        }
    }
</script>

<style scoped>

</style>
