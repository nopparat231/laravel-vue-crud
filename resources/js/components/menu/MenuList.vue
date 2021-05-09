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
                                            <b class="text-muted"
                                                >ราคา {{ 50 }} บาท</b
                                            >
                                        </p>
                                        <p class="card-text">
                                            <small class="text-muted"
                                                >จำนวนคิวรอ {{ 1 }} คิว</small
                                            >
                                        </p>

                                        <button
                                            v-show="!isHidden"
                                            @click="isHidden = !isHidden"
                                            class="btn btn-primary"
                                        >
                                            สั่งอาหาร
                                        </button>
                                        
                                        <!-- ฟอร์มเก็บเมนู -->
                                        <form
                                            v-show="isHidden"
                                            @submit.prevent="OrderMenu"
                                            class="row g-3"
                                        >
                                            <input
                                                type="hidden"
                                                name="id"
                                                v-model="menu.id"
                                            />
                                            <div class="col-auto">
                                                <input
                                                    name="orders_detail"
                                                    value="1"
                                                    style="width: 4rem"
                                                    min="1"
                                                    type="number"
                                                    class="form-control"
                                                    id="exampleInputtext1"
                                                    aria-describedby="textHelp"
                                                />
                                            </div>
                                            <button
                                                type="submit"
                                                class="btn btn-primary add-btn"
                                            >
                                                สั่งอาหาร
                                            </button>

                                            <a
                                                @click="isHidden = !isHidden"
                                                class="btn btn-danger"
                                            >
                                                ยกเลิก
                                            </a>
                                        </form>

                                        <!-- 
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
                                        </button> -->
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
            menus: [],
            isHidden: false
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
        OrderMenu() {
            this.axios
                .post("http://localhost:8000/api/orders", this.order)
                .then(response => console.log(response))
                .catch(err => console.log(err))
                .finally(() => (this.loading = false));
        }
    }
};
</script>
