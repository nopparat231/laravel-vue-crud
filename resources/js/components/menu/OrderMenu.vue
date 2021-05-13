<template>
    <div>
        <h3 class="text-center">รายละเอียดเมนู</h3>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form @submit.prevent="addOrder">
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
                                            <b class="text-muted"
                                                >ราคา {{ 50 }} บาท</b
                                            >
                                        </p>
                                        <p class="card-text">
                                            <small class="text-muted"
                                                >จำนวนคิวรอ {{ 1 }} คิว</small
                                            >
                                        </p>
                                          <button type="submit" class="btn btn-primary">สั้งซื้อ</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
</template>

<script>

export default {

    data() {
        return {
            menu: {}
        };
    },
    created() {
        this.axios
            .get(`http://localhost:8000/api/menus/${this.$route.params.id}`)
            .then(res => {
                this.menu = res.data;
            });
    },
    methods: {
        addOrder() {
            this.axios
                .post("http://localhost:8000/api/menus", this.menu)
                .then(response => this.$router.push({ name: "menu-list" }))
                .catch(err => console.log(err))
                .finally(() => (this.loading = false));
        }
    }
    
};
</script>
