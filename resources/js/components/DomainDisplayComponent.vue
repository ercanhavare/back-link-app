<template>
    <div class="w-100 mt-5">
        <div class="row">
            <div class="col-12 p-2">
                <div class="category-box w-100 align-items-center py-1" @click="selectedAll()">
                    <h5 class="text-center">Show all links</h5>
                </div>
            </div>
            <div class="p-2 col-4" v-for="category in this.categories">
                <div class="category-box w-100 align-items-center py-1" @click="selectedCat(category.id)">
                    <h5 class="text-center">{{category.category_name}}</h5>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="p-2 col-4" v-for="subcategory in this.filteredSubcategories">
                <div class="category-boxs w-100 align-items-center py-1" @click="selectedSubCat(subcategory.id)">
                    <h6 class="text-center">{{subcategory.sub_category_name}}</h6>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-6 p-2" v-for="domain in filteredDomains">
                <div class="card">
                    <div class="card-body">
                        <p><strong>Website name: </strong> {{domain.title</p>
                        <p><strong>Website url: </strong> <a :href="domain.url">{{domain.url}}</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "DomainDisplayComponent",
        props: ['domains', 'categories', 'subcategories'],
        data() {
            return {
                selectedCategory: '',
                selectedSubcategory: '',
            }
        },
        methods: {
            selectedAll: function () {
                this.selectedCategory = '';
                this.selectedSubcategory = '';
            },
            selectedCat: function (id) {
                this.selectedCategory = id;
                this.selectedSubcategory = '';
            },
            selectedSubCat: function (id) {
                this.selectedSubcategory = id;
            }
        },
        computed: {
            filteredSubcategories: function () {
                return this.subcategories.filter((item) => item.category_id === this.selectedCategory);
            },
            filteredDomains: function () {
                if (this.selectedCategory === '' && this.selectedSubcategory === '') {
                    return this.domains;
                } else if (this.selectedCategory === '' && this.selectedSubcategory !== '') {
                    return this.domains.filter((item) => item.sub_category_id === this.selectedSubcategory);
                } else if (this.selectedCategory !== '' && this.selectedSubcategory === '') {
                    return this.domains.filter((item) => item.category_id === this.selectedCategory);
                } else if (this.selectedCategory !== '' && this.selectedSubcategory !== '') {
                    return this.domains.filter((item) => item.sub_category_id === this.selectedSubcategory);
                }
            }
        }
    }
</script>

<style scoped>

</style>
