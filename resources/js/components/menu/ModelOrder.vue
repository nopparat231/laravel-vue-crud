<template>
    <div>
        <form v-show="isHidden" @submit.prevent="OrderMenu" class="row g-3">
            <div class="col-auto">
                <input
                    style="width: 10rem"
                    type="text"
                    class="form-control"
                    id="exampleInputtext1"
                    aria-describedby="textHelp"
                />
            </div>
            <button type="submit" class="btn btn-primary add-btn">
                สั่งอาหาร
            </button>

            <a @click="isHidden = !isHidden" class="btn btn-danger">
                ยกเลิก
            </a>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            isHidden: true
        };
    }
};
</script>

<style scoped>
input {
    width: 10rem;
}
.add-btn {
    margin-left: 1px;
}
</style>
