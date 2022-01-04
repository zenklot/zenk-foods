<template>
<fragment>
    <div class="col" v-if="menu.stok == 'ready'">
        <div class="card-group">
            <div class="card rounded shadow p-3">
                <img
                    src="img/menu/bebek_goreng.png"
                    class="card-img-top rounded"
                    alt="..."
                />
                <div class="card-body">
                    <h5 class="card-title">
                        {{ menu.nama_menu }}
                        <i class="fas fa-fire text-danger"></i>
                    </h5>
                    <p class="card-text">{{ menu.keterangan }}</p>
                    <div class="row">
                        <div class="col-8 text-start">
                            <h6 class="mt-n1 mb-0 fs-5 fw-bold">
                                RP. {{ menu.harga }}
                            </h6>
                            <small
                                class="text-body"
                                >{{ menu.kategori_menu }}</small
                            >
                        </div>
                        <div class="col-4">
                            <input
                                type="number"
                                name=""
                                id=""
                                class="form-control"
                                value="1"
                                min="1"
                                v-model="qtyItem"
                                @change="fixQty"
                            />
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <button
                        class="btn btn-warning btn-font-size-lg btn-border-radius-lg w-100 fw-bold" @click="showALert"
                    >
                        Add to cart <i class="fas fa-shopping-cart"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col" v-else>
        <div class="card-group">
            <div class="card rounded shadow p-3">
                <img
                    src="img/menu/bebek_goreng.png"
                    class="card-img-top rounded"
                    alt="..."
                />
                <div class="card-body">
                    <h5 class="card-title">
                        {{ menu.nama_menu }}
                        <i class="fas fa-fire text-danger"></i>
                    </h5>
                    <p class="card-text">{{ menu.keterangan }}</p>
                    <div class="row">
                        <div class="col-8 text-start">
                            <h6 class="mt-n1 mb-0 fs-5 fw-bold">
                                RP. {{ menu.harga }}
                            </h6>
                            <small
                                class="text-body"
                                >{{ menu.kategori_menu }}</small
                            >
                        </div>
                        <div class="col-4">
                            <input
                                type="number"
                                name=""
                                id=""
                                class="form-control"
                                value="1"
                                min="1"
                                v-model="qtyItem"
                                @change="fixQty"
                            />
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <button
                        class="btn btn-dark disable btn-font-size-lg btn-border-radius-lg w-100 fw-bold" @click="outOfStok" disabled
                    >
                        Out Of Stock <i class="fas fa-shopping-cart"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    </fragment>
</template>

<script>
export default {
    data(){
        return {
            qtyItem: 1
        }
    },
   props:['menu'],
   methods:{
       showALert(){
            Swal.fire(
                "Failed Add To Cart",
                "Harus Login untuk menambahkan data ke cart",
                "warning"
            );
       },
       outOfStock(){
            Swal.fire(
                "Failed Add To Cart",
                "Mohon Maaf Menu Sedang Habis",
                "warning"
            );
       },
       fixQty(){
           if (this.qtyItem < 1) {
               this.qtyItem = 1
           }
       }
   }
};
</script>

<style></style>
