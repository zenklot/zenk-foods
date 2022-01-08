<template>
    <div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 mb-2">
                <div class="form-floating date">
                    <input
                        type="date"
                        class="form-control"
                        id="date"
                        placeholder="Date"
                        v-model="tanggal"
                        :min="awal"
                        :max="akhir"
                    />
                    <label for="date" class="text-dark">Select Date</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-2">
                <div class="form-floating date">
                    <input
                        type="time"
                        class="form-control"
                        placeholder="Time"
                        id="time"
                        v-model="waktu"
                    />
                    <label for="time" class="text-dark">Select Time</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-2">
                <div class="form-floating">
                    <input
                        type="number"
                        class="form-control"
                        placeholder="No of People"
                        value="2"
                        min="2"
                        id="people"
                        v-model="people"
                    />
                    <label for="people" class="text-dark">No of People</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h4 class="text-white mt-3">Select Your Table</h4>
                <h6 class="text-white mb-3">Setiap Meja menampung maksimal 6 orang dewasa</h6>
            </div>
        </div>
        <div class="row" >
            <div class="col-md-3 col-sm-4 col-xs-6 mb-3" v-for="meja in mejas" :key="meja" >
            <!-- <div class="col-md-3 col-sm-2 col-xs-1 mb-3"> -->
                <div class="card-group" >
                    <div class="card bg-dark text-white shadow rounded" >
                        <img :src="meja > 7 ? 'img/lesehan.jpg' : 'img/meja.jpg' " class="card-img" alt="..." />
                        <div class="card-img-overlay align-items-center p-0">
                            <!-- <p class="card-title text-center flex-fill p-4 fs-3 text-white" style="background-color: rgba(0, 0, 0, 0.6)">Meja {{meja}}</p> -->
                            <p class="card-text text-center d-flex h-100">
                                <label class="custom-control flex-fill fill-checkbox mb-0">
                                    <input
                                        type="checkbox"
                                        class="fill-control-input" v-model="selectedMeja" :value="meja" :disabled="totalMeja>people && selectedMeja.indexOf(meja) == -1" @change="selectMeja(selectedMeja.indexOf(meja) == -1)"/>
                                    <span class="fill-control-indicator text-wrap fs-4 fw-bold">
                                        <span  v-if="totalMeja>people && selectedMeja.indexOf(meja) == -1">
                                            <i class="fas fa-times-circle fa-3x text-danger"></i></span>
                                        <span class="badge bg-dark" v-else>Meja {{ meja }}</span>
                                        </span
                                ></label>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h3 class="text-white text-end mt-5">Rp. {{ harga }}</h3>
        <h4 class="text-white text-end">Meja Dipilih : {{ selectedMeja.join(',')}}</h4>
        <p class="text-white text-end mt-2">Harga booking Rp. 5.000 untuk satu meja<br>dan harga total yang tertera merupakan jaminan untuk kedatangan anda sisanya bisa di tukarkan ke menu ketika sampai di Rumah Makan</p>
        <div class="row">
            <div class="col">
                <button class="btn btn-primary w-100" @click="showAlert">Booking Meja</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            pilih: [],
            mejas: [1,2,3,4,5,6,7,8,9,10,11,12],
            people: 2,
            totalMeja : 0,
            harga: 0,
            selectedMeja: [],
            tanggal: '',
            waktu: '',
            akhir: '',
            awal : ''
        };
    },
    methods:{
        selectMeja(con){
           if(con){
             this.totalMeja -= 6    
            }else{
                this.totalMeja += 6
            }
            this.harga = 25000 * this.selectedMeja.length
        },
         showAlert(){
            Swal.fire(
                "Failed To Book a table",
                "Harus Login untuk membooking meja",
                "warning"
            );
       }
    },
    mounted(){
        let tgl = new Date()
        let bulan = (tgl.getMonth() + 1) < 9 ? '0' + (tgl.getMonth() + 1) : tgl.getMonth() + 1
        let hari = tgl.getDate() < 9 ? '0' + tgl.getDate() : tgl.getDate()
        let jam = tgl.getHours() < 10 ? '0' + tgl.getHours() : tgl.getHours()
        let menit = tgl.getMinutes() < 10 ? '0' + tgl.getMinutes() : tgl.getMinutes()
        this.tanggal = tgl.getFullYear().toString() + "-"+ bulan +"-"+ hari
        this.awal = tgl.getFullYear().toString() + "-"+ bulan +"-"+ hari
        this.waktu = jam + ':' + menit 
        tgl.setDate(tgl.getDate() +30)
        bulan = (tgl.getMonth() + 1) < 9 ? '0' + (tgl.getMonth() + 1) : tgl.getMonth() + 1
        hari = tgl.getDate() < 9 ? '0' + tgl.getDate() : tgl.getDate()
        this.akhir = tgl.getFullYear().toString() + "-" + bulan + "-" + hari
    }
};
</script>

<style></style>
