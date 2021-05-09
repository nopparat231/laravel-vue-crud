<template>
    <div>
        <h3 class="text-center">Edit Menu</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateMenu">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="menu.menu_name">
                    </div>
                    <div class="form-group">
                        <label>Detail</label>
                        <input type="text" class="form-control" v-model="menu.menu_img">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
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
        created() {
            this.axios
                .get(`http://localhost:8000/api/menus/${this.$route.params.id}`)
                .then((res) => {
                    this.menu = res.data;
                });
        },
        methods: {
            updateMenu() {
                this.axios
                    .patch(`http://localhost:8000/api/menus/${this.$route.params.id}`, this.menu)
                    .then((res) => {
                        this.$router.push({ name: 'menu-list' });
                    });
            }
        }
    }
</script>