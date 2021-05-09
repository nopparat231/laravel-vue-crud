<template>
    <div>
        <h3 class="text-center">Create Menu</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addMenu">
                    <div class="form-group">
                        <label>menu_name</label>
                        <input type="text" class="form-control" v-model="menu.menu_name">
                    </div>
                    <div class="form-group">
                        <label>menu_img</label>
                        <input type="text" class="form-control" v-model="menu.menu_img">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                menu: {}
            }
        },
        methods: {
            addMenu() {
                this.axios
                    .post('http://localhost:8000/api/menus', this.menu)
                    .then(response => console.log(response))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>