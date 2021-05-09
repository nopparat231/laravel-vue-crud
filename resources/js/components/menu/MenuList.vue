<template>
    <div>
        <h2 class="text-center">Menu List</h2>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div v-for="menu in menus" :key="menu.id">
                        <div class="card mb-3" style="max-width: 540rem;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img
                                        :src="menu.menu_img"
                                        style="width: 100%;height: 100%;"
                                    />
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            {{ menu.menu_name }}
                                        </h5>
                                        <p class="card-text">
                                            <small class="text-muted"
                                                >จำนวนคิวรอ {{ 1 }} คิว</small
                                            >
                                        </p>

                                        <button
                                            class="btn btn-primary"
                                            @click="OrderMenu(menu.id)"
                                        >
                                            สั่งอาหาร
                                        </button>

                                        <router-link
                                            :to="{
                                                name: 'menu-edit',
                                                params: { id: menu.id }
                                            }"
                                            class="btn btn-info"
                                            >แก้ไข</router-link
                                        >
                                        <button
                                            class="btn btn-danger"
                                            @click="deleteMenu(menu.id)"
                                        >
                                            ลบ
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            menus: []
        };
    },
    created() {
        this.axios.get("http://localhost:8000/api/menus/").then(response => {
            this.menus = response.data;
        });
    },
    methods: {
        deleteMenu(id) {
            this.axios
                .delete(`http://localhost:8000/api/menus/${id}`)
                .then(response => {
                    let i = this.menus.map(data => data.id).indexOf(id);
                    this.menus.splice(i, 1);
                });
        },
        OrderMenu(id) {
            this.axios
                .post(`http://localhost:8000/api/menus/${id}`)
                .then(response => {
                    let i = this.menus.map(data => data.id).indexOf(id);
                    this.menus.splice(i, 1);
                });
        }
    }
};
</script>
