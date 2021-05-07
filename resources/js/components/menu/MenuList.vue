<template>
    <div>
        <h2 class="text-center">Products List</h2>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div v-for="menu in menus" :key="menu.id">
                        <div class="card mb-3" style="max-width: 540rem;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img
                                        :src="menus.menu_img"
                                        style="width: 100%;height: 100%;"
                                        alt="กระเพราหมูสับ"
                                    />
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            {{ menus.menu_name }}
                                        </h5>
                                        <p class="card-text">
                                            <small class="text-muted"
                                                >จำนวนคิวรอ {{ 1 }} คิว</small
                                            >
                                        </p>
                                        <a href="#" class="btn btn-primary"
                                            >สั่งอาหาร</a
                                        >
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
        deleteProduct(id) {
            this.axios
                .delete(`http://localhost:8000/api/menus/${id}`)
                .then(response => {
                    let i = this.menus.map(data => data.id).indexOf(id);
                    this.menus.splice(i, 1);
                });
        }
    }
};
</script>
