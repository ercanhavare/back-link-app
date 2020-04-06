<template>
    <div>
       <h2>Hello from Vue.js</h2>
        <div v-for="category in categories">
            <h4>{{category.category_name}}</h4>
            <ul>
                <li v-for="sub_cat in category.sub_categories">{{sub_cat.sub_category_name}}</li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['categories'],
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
