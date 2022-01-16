<template>
  <fragment>
    <div class="container">
      <div class="row justify-content-center mb-3">
        <div class="col-8">
          <div class="card card-warning collapsed-card shadow">
            <div class="card-header">
              <p class="card-title fs-4">
                Keranjang Orderan <i class="fas fa-shopping-cart"></i>
                <span
                  class="
                    position-absolute
                    top-0
                    start-100
                    translate-middle
                    badge
                    rounded-pill
                    bg-danger
                  "
                >
                  {{ notifQtyCart }}
                </span>
              </p>
              <div class="card-tools">
                <button
                  type="button"
                  class="btn btn-tool"
                  data-card-widget="collapse"
                >
                  <i class="fas fa-plus fs-4"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="display: none">
              
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr class="text-center">
                      <th scope="col" colspan="2">Menu</th>
                      <th scope="col">Price</th>
                      <th scope="col">Qty</th>
                      <th scope="col">Total</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody v-for="c in cart" :key="c.id">
                    <tr>
                      <td>
                        <img :src="c.image" :alt="c.nama_menu" width="80px" />
                      </td>
                      <td>
                        <div class="row">
                          <div class="col fw-bold">
                            {{ c.nama_menu }}
                          </div>
                        </div>
                        <div class="row">
                          <div class="col text-secondary fst-italic">
                            {{ c.note }}
                          </div>
                        </div>
                      </td>
                      <td class="text-end">{{ formatRupiah(c.harga) }}</td>
                      <td class="text-center">{{ c.qty }}x</td>
                      <td class="text-center">
                        {{ formatRupiah(c.qty * c.harga) }}
                      </td>
                      <td class="text-center">
                        <button
                          :class="checkout ? 'btn btn-dark' : 'btn btn-danger'"
                          @click="checkout ? alertCheckout() : removeCart(c.id)"
                        >
                          <i class="fas fa-trash"></i>
                        </button>
                      </td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="4" class="text-end fw-bold">Total :</td>
                      <td colspan="2" class="fw-bold">
                        {{ formatRupiah(totalCart) }}
                      </td>
                    </tr>
                  </tfoot>
                </table>
              </div>

              <button class="btn btn-primary w-100" v-show="cart.length > 0 && checkout == false" @click="checkout = true">Checkout</button>

              <div class="row" v-show="checkout">
                <div class="fs-4 fw-bold text-center mb-3">Lokasi Pengiriman Alamatmu :</div>
                <div class="col-md-6 col-sm-12 text-center">
                  <input type="radio" class="btn-check" name="antar_kota" v-model="antar_kota" id="satu_kota" value="satu" autocomplete="off" @click="getDataSatuKota('kecamatan'); harga = 100000">                 <label class="btn btn-outline-success" for="satu_kota">Satu Kota</label>
                  <h5>Antar Hari Ini</h5>
                </div>
                <div class="col-md-6 col-sm-12 text-center">
                <input type="radio" class="btn-check" name="antar_kota" id="beda_kota" v-model="antar_kota" value="beda" autocomplete="off" @click="getDataBedaKota('provinsi'); harga = 100000">
                <label class="btn btn-outline-danger" for="beda_kota">Beda Kota</label>
                <h5>Antar Expedisi</h5>
                </div>
              </div>

              <div class="row mt-4" v-show="antar_kota == 'satu'">
                <div class="col">
                   <div class="fs-5">Kabupaten Ciamis</div>
                  <div class="input-group mb-3">
                  <label class="input-group-text" for="kecamatan_select">Kecamatan</label>
                    <select class="form-select" id="kecamatan_select" @change="getDataSatuKota($event)" v-model="kec_select">
                        <option  v-for="kec in kecamatan" :key="kec.id" :value="kec.id">{{kec.nama}}</option>
                      </select>
                  </div>
                  <div class="input-group mb-3">
                  <label class="input-group-text" for="kelurahan_select">Kelurahan</label>
                    <select class="form-select" id="kelurahan_select">
                        <option  v-for="kel in kelurahan" :key="kel.id" :value="kel.id">{{kel.nama}}</option>
                      </select>
                  </div>
                </div>
              </div>

                <div class="row mt-4" v-show="antar_kota == 'beda'">
                <div class="col">
                  <div class="input-group mb-3">
                  <label class="input-group-text" for="provinsi_select">Provinsi</label>
                    <select class="form-select" id="provinsi_select" @change="getDataBedaKota('kota')" v-model="prov_select">
                        <option  v-for="prov in provinsi" :key="prov.province_id" :value="prov.province_id">{{prov.province}}</option>
                      </select>
                  </div>
                  <div class="input-group mb-3">
                  <label class="input-group-text" for="kota_select">Kota</label>
                    <select class="form-select" id="kota_select" @change="getDataBedaKota('cost')" v-model="kota_select">
                        <option  v-for="k in kota" :key="k.city_id" :value="k.city_id">{{k.type+ ' ' + k.city_name}}</option>
                      </select>
                  </div>
                  <div class="input-group mb-3">
                  <label class="input-group-text" for="kulir_select">Jasa Kirim</label>
                    <select class="form-select" id="kulir_select" @change="getDataBedaKota('cost')" v-model="kulir_select">
                        <option  value="jne" selected>JNE</option>
                        <option  value="tiki">TIKI</option>
                        <option  value="pos">POS</option>
                      </select>
                  </div>
                   <div class="input-group mb-3">
                  <label class="input-group-text" for="service_select">Service</label>
                    <select class="form-select" id="service_select" v-model="service_select" @change="harga = service_select">
                        <option  v-for="s in cost" :key="s.service" :value="s.cost[0].value" :data-des="s.description" :data-service="s.service" :data-etd="s.cost[0].etd">{{s.service+ ', (' + s.description + '), ' + formatRupiah(s.cost[0].value) + ', Estimasi :' + s.cost[0].etd}}</option>
                      </select>
                  </div>
                  
                </div>
              </div>

              <div class="row" v-show="antar_kota != ''">
                <div class="col">
                  <div class="input-group mb-3">
                    <span class="input-group-text">Kode Pos</span>
                    <input type="text" class="form-control" placeholder="462xx" v-model="kode_pos">
                  </div>
                  <div class="input-group mb-3">
                    <span class="input-group-text">Harga Ongkir</span>
                    <div  class="form-control">{{ formatRupiah(harga) }}</div>
                  </div>
                  <div class="input-group mb-3">
                    <span class="input-group-text">Alamat Rumah</span>
                    <input type="text" class="form-control" v-model="alamat_rumah" placeholder="Lokasi Rumah, No Rumah, RT/RW">
                  </div>
                  <div class="input-group mb-3">
                    <span class="input-group-text">Nama Pemesan</span>
                    <input type="text" class="form-control" :value="user.nama_user" disabled>
                  </div>
                  <div class="input-group mb-3">
                    <span class="input-group-text" >No HP Pemesan</span>
                    <input type="text" class="form-control" v-model="no_hp" placeholder="08xxxxxxxxxx">
                  </div>
                </div>
              </div>

              <div class='row' v-show="antar_kota">
              <div class="row mt-2" >
                <div class="col">
                  <button class="btn btn-danger" @click="checkout = false; antar_kota=''">Batal Checkout</button>
                </div>
                <div class="col-md-8 text-end">
                  <div class="fs-4 fw-bold">Total + Ongkir : {{ formatRupiah(totalAkhir)}} </div>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col">
                  <button class="btn btn-primary w-100" @click="orderNow()">Order Sekarang</button>
                </div>
              </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="overlay dark" v-show="loading">
                <i class="fas fa-2x fa-sync-alt fa-spin"></i>
              </div>
          </div>
        </div>
      </div>
      <div class="mt-5 text-center wow fadeInUp" data-wow-delay="0.1s">
        <h5
          class="section-title ff-secondary text-center text-primary fw-normal"
        >
          Order Foods
        </h5>
        <div class="row justify-content-center mb-3">
          <div class="col-md-6">
            <div class="input-group mb-3">
              <input
                type="text"
                class="form-control"
                placeholder="Search.."
                name="search"
                v-model="search"
              />
              <button class="btn btn-dark" @click="filterSearch">Search</button>
            </div>
          </div>
        </div>
      </div>

      <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
        <ul
          class="
            nav nav-pills
            d-inline-flex
            justify-content-center
            border-bottom
            mb-5
          "
        >
          <li class="nav-item">
            <a
              class="d-flex align-items-center text-start mx-3 ms-0 pb-3"
              :class="category == 'seller' ? 'active' : ''"
              href="#"
              @click.prevent="filterCategory('seller')"
            >
              <i class="fa fa-utensils fa-2x text-primary"></i>
              <div class="ps-3">
                <small class="text-body">Best Seller</small>
                <h6 class="mt-n1 mb-0">ZenkFood</h6>
              </div>
            </a>
          </li>
          <li class="nav-item">
            <a
              class="d-flex align-items-center text-start mx-3 pb-3"
              :class="category == 'foods' ? 'active' : ''"
              href="#"
              @click.prevent="filterCategory('foods')"
            >
              <i class="fa fa-hamburger fa-2x text-primary"></i>
              <div class="ps-3">
                <input type="hidden" name="bestfood" value="makanan" />
                <small class="text-body">Best of</small>
                <h6 class="mt-n1 mb-0">Foods</h6>
              </div>
            </a>
          </li>
          <li class="nav-item">
            <a
              class="d-flex align-items-center text-start mx-3 me-0 pb-3"
              :class="category == 'drinks' ? 'active' : ''"
              href="#"
              @click.prevent="filterCategory('drinks')"
            >
              <i class="fa fa-coffee fa-2x text-primary"></i>
              <div class="ps-3">
                <input type="hidden" name="bestdrink" value="minuman" />
                <small class="text-body">Best of</small>
                <h6 class="mt-n1 mb-0">Drinks</h6>
              </div>
            </a>
          </li>
        </ul>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="fs-2 fw-bold" v-show="pencarian">
            Hasil Pencarian : {{ search }}
          </div>
          <div class="fs-2 fw-bold" v-show="category != 'seller'">
            Cari berdasarkan : {{ category }}
          </div>
          <div class="mt-5 fw-bold fs-1" v-if="menu.total == 0">
            Ops Hasil Tidak Ditemukan..
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="card-group" v-for="m in menu.data" :key="m.id">
              <div class="card rounded shadow p-3">
                <img
                  src="/img/menu/bebek_goreng.png"
                  class="card-img-top rounded"
                  alt="..."
                />
                <div class="card-body">
                  <h5 class="card-title">
                    {{ m.nama_menu }}
                    <i class="fas fa-fire text-danger"></i>
                  </h5>
                  <p class="card-text">{{ m.keterangan }}</p>
                  <div class="row">
                    <div class="col text-start">
                      <h6 class="mt-n1 mb-0 fs-5 fw-bold">
                        {{ formatRupiah(m.harga) }}
                      </h6>
                      <small class="text-body">{{ m.kategori_menu }}</small>
                    </div>
                    <div class="col">
                      <input
                        type="number"
                        name=""
                        :id="'qty' + m.id"
                        class="form-control"
                        value="1"
                        min="1"
                      />
                    </div>
                  </div>
                  <hr />
                  <div class="row mt-1">
                    <div class="col">
                      <input
                        type="text"
                        class="form-control"
                        placeholder="catatan..."
                        :id="'note' + m.id"
                      />
                    </div>
                  </div>
                </div>
                <div class="card-footer bg-white">
                  <button
                    class="
                      btn btn-warning btn-font-size-lg btn-border-radius-lg
                      w-100
                      fw-bold
                    "
                    v-if="m.stok == 'ready'"
                    @click="checkout ? alertCheckout() : addToCart(m)"
                  >
                    Add to cart <i class="fas fa-shopping-cart"></i>
                  </button>
                  <button
                    class="
                      btn btn-dark
                      disable
                      btn-font-size-lg btn-border-radius-lg
                      w-100
                      fw-bold
                    "
                    disabled
                    v-else
                  >
                    Out Of Stock <i class="fas fa-shopping-cart"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-12">
          <pagination
            :data="menu"
            @pagination-change-page="getResults"
            :show-disabled="true"
            align="center"
          ></pagination>
        </div>
      </div>
    </div>
  </fragment>
</template>

<script>
var CryptoJS = require("crypto-js");
export default {
  data() {
    return {
      search: "",
      pencarian: false,
      menu: {},
      kode_pos:'',
      alamat_rumah:'',
      category: "seller",
      cart: [],
      total: 0,
      checkout:false,
      antar_kota:'',
      kecamatan : [],
      kec_select : '',
      prov_select:'',
      provinsi:[],
      loading:false,
      kota:[],
      kota_select:'',
      kelurahan: [],
      no_hp: '08',
      km_satu_kota : [{
        'id' : 3207101,
        'km' : 49
      },{
        'id' : 3207100,
        'km' : 50
      },
      {
        'id' : 3207211,
        'km' : 8
      },
      {
        'id' : 3207210,
        'km' : 2
      },{
        'id' : 3207130,
        'km' : 27
      },{
        'id' : 3207230,
        'km' : 25
      },{
        'id' : 3207150,
        'km' : 8
      },{
        'id' : 3207220,
        'km' : 13
      },{
        'id' : 3207140,
        'km' : 21
      },{
        'id' : 3207250,
        'km' : 17
      },{
        'id' : 3207160,
        'km' : 29
      },
      {
        'id' : 3207260,
        'km' : 29
      },
      {
        'id' : 3207280,
        'km' : 23
      },
      {
        'id' : 3207110,
        'km' : 48
      },{
        'id' : 3207281,
        'km' : 31
      },{
        'id' : 3207120,
        'km' : 38
      },{
        'id' : 3207270,
        'km' : 39
      },{
        'id' : 3207290,
        'km' : 39
      },{
        'id' : 3207300,
        'km' : 35
      },{
        'id' : 3207111,
        'km' : 47
      },{
        'id' : 3207190,
        'km' : 34
      },{
        'id' : 3207180,
        'km' : 30
      },{
        'id' : 3207240,
        'km' : 11
      },{
        'id' : 3207221,
        'km' : 13
      },{
        'id' : 3207200,
        'km' : 29
      },{
        'id' : 3207291,
        'km' : 48
      },{
        'id' : 3207170,
        'km' : 42
      },
      ],
      harga : 0,
      satu_kota : new Form({
        kecamatan: '',
        kelurahan : '',
        kode_pos : '',
        harga_ongkir: '',
        alamat_rumah : '',
        nama_pemesan:'',
        no_hp:'',
        cart:'',
        total:''
      }),
      beda_kota : new Form({
        provinsi:'',
        kota:'',
        jasa_kirim:'',
        service:'',
        kode_pos:'',
        harga_ongkir:'',
        alamat_rumah:'',
        nama_pemesan:'',
        no_hp:'',
        cart:''
      }),
      kulir_select: 'jne',
      service_select:'',
      service:'',
      cost:[]

    };
  },
  props: ["user"],
  computed: {
    totalCart() {
      let total = 0;
      this.cart.forEach((item, i) => {
        total += item.harga * item.qty;
      });
      return total;
    },
    notifQtyCart() {
      let total = 0;
      this.cart.forEach((item, i) => {
        total += item.qty;
      });
      return total;
    },
    totalAkhir(){
      return this.totalCart + this.harga
    }
  },
  mounted() {
    this.getResults();
    if (localStorage.cart) {
      let dataCart = CryptoJS.AES.decrypt(
        localStorage.getItem("cart"),
        "rahasiaCart"
      ).toString(CryptoJS.enc.Utf8);
      this.cart = JSON.parse(dataCart);
    }
    this.no_hp = this.user.no_hp
  },

  methods: {
    getDataSatuKota(jenis)
    {
      this.$Progress.start();
      this.loading = true
      if (jenis=='kecamatan') {
        axios.get('api/data_indonesia/satu_kota?jenis=kecamatan').then((kecamatan)=>{
        this.kecamatan = kecamatan.data.kecamatan.sort((a, b)=>{
          if ( a.nama < b.nama ){
            return -1;
          }
          if ( a.nama > b.nama ){
            return 1;
          }
          return 0;
        });
        this.loading = false
        
        this.$Progress.finish();
      })  

      }else{
        this.loading = true
        let kilometer = this.km_satu_kota.filter(data => data.id == this.kec_select)
        kilometer= kilometer[0].km
        
        if(kilometer < 3){
          this.harga = 5000
        }else if(kilometer > 15){
          this.harga = 1200 * kilometer
        }else{
          this.harga = 1700 * kilometer
        }
        axios.get('api/data_indonesia/satu_kota?jenis=kelurahan&id_kecamatan='+jenis.target.value).then((kelurahan)=>{
        this.kelurahan = kelurahan.data.kelurahan.sort((a, b)=>{
          if ( a.nama < b.nama ){
            return -1;
          }
          if ( a.nama > b.nama ){
            return 1;
          }
          return 0;
        });
        
        this.loading = false
        this.$Progress.finish();
      })
    }
    },
    getDataBedaKota(jenis)
    {
      this.$Progress.start();
      this.loading = true
      

      if (jenis=='provinsi') {
        console.log('masuk awal data provinsi')
        axios.get('api/data_indonesia/beda_kota?jenis=provinsi').then((provinsi)=>{
          this.provinsi = provinsi.data.rajaongkir.results
          this.loading = false
          this.$Progress.finish();
        })  
      }else if(jenis == 'kota'){
        console.log('masuk provinsi change')
        let id = this.prov_select
        this.loading = true
        axios.get('api/data_indonesia/beda_kota?jenis=kota&id_provinsi='+id).then((kota)=>{
          this.kota = kota.data.rajaongkir.results
          this.loading = false
          this.$Progress.finish();
        })
      }else if(jenis == 'cost'){
        console.log('masuk kota change')
        let id = this.kota_select
        this.loading = true
        let berat = this.notifQtyCart * 500 
        axios.get('api/data_indonesia/beda_kota?jenis=cost&id_kota='+id + '&weight=' + berat + '&courier='+this.kulir_select).then((cost)=>{
            this.cost = cost.data.rajaongkir.results[0].costs
            this.loading = false
            this.$Progress.finish();
        })
      }
      
    
    },
    formatRupiah(uang) {
      return (
        "Rp. " + uang.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1.")
      );
    },

    orderNow()
    {
     
      if(this.antar_kota == 'satu')
      {
        this.satu_kota.kecamatan = $('#kecamatan_select option:selected').text()
        this.satu_kota.kelurahan = $('#kelurahan_select option:selected').text()
        this.satu_kota.kode_pos = this.kode_pos
        this.satu_kota.harga_ongkir = this.harga
        this.satu_kota.alamat_rumah = this.alamat_rumah
        this.satu_kota.nama_pemesan = this.user.nama_user
        this.satu_kota.no_hp = this.no_hp
        this.satu_kota.cart = this.cart
        this.satu_kota.total = this.total
        this.satu_kota.post('order/satu-kota').then((data)=>{
          console.log(data)
        })

      }
    },
    getResults(page = 1) {
      if (this.category == "seller") {
        this.$Progress.start();
        axios.get("api/data-menu?page=" + page).then((response) => {
          this.menu = response.data;
          this.$Progress.finish();
        });
      } else {
        this.filterSearch(page);
      }
    },

    filterCategory(filter) {
      this.category = filter;
      this.filterSearch();
    },
    filterSearch(page = 1) {
      this.$Progress.start();
      if (this.search) {
        axios
          .get(
            "api/data-menu?sort=" +
              this.category +
              "&search=" +
              this.search +
              "&page=" +
              page
          )
          .then((response) => {
            this.menu = response.data;
            this.$Progress.finish();
          });
        this.pencarian = true;
      } else {
        axios
          .get("api/data-menu?sort=" + this.category + "&page=" + page)
          .then((response) => {
            this.menu = response.data;
            this.$Progress.finish();
            this.pencarian = false;
          });
      }
    },
    encryptCart() {
      let dataCart = CryptoJS.AES.encrypt(
        JSON.stringify(this.cart),
        "rahasiaCart"
      ).toString();
      localStorage.setItem("cart", dataCart);
    },
    removeCart(id) {
      let index = this.cart
        .map(function (c) {
          return c.id;
        })
        .indexOf(id);
      this.cart.splice(index, 1);
      this.encryptCart();
      Swal.fire(
        "Hapus Dari Keranjang",
        "Berhasil menghapus menu pesanan",
        "info"
      );
    },
    addToCart(menu) {
      let qty = parseInt($("#qty" + menu.id).val());
      if (qty < 1 || qty > 25 || isNaN(qty)) {
        Swal.fire("Out Of Stock", "Jumlah Qty Tidak Bisa Diproses!", "warning");
      } else {
        let ada = this.cart
          .map(function (c) {
            return c.id;
          })
          .indexOf(menu.id);

        if (ada != -1) {
          let cart = {
            id: menu.id,
            nama_menu: menu.nama_menu,
            image: menu.image,
            harga: menu.harga,
            qty: qty + parseInt(this.cart[ada].qty),
            note: $("#note" + menu.id).val(),
          };
          this.cart[ada] = cart;
          this.cart.push({});
          this.cart.pop();
          this.encryptCart();
          Swal.fire(
            "Update Keranjang",
            "Berhasil Memperbarui Jumlah Pesanan " +
              menu.nama_menu +
              " menjadi " +
              (parseInt(this.cart[ada].qty)),
            "success"
          );
        } else {
          this.cart.push({
            id: menu.id,
            nama_menu: menu.nama_menu,
            image: menu.image,
            harga: menu.harga,
            qty: qty,
            note: $("#note" + menu.id).val(),
          });
          this.encryptCart();
          Swal.fire(
            "Tambah Ke Keranjang",
            "Berhasil Menambahkan " + menu.nama_menu + " ke Keranjang",
            "success"
          );
        }
      }
    },
    alertCheckout(){
       Swal.fire("Not Process!", "Selesaikan dulu pesanan checkout sebelumnya!", "error");
    }
  },
};
</script>

<style>
</style>