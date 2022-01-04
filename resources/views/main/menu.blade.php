@extends('layouts.main')

@section('hero')
<div class="container-xxl py-5 bg-dark mb-3">
</div>
@endsection

@section('content')


<div class="container-xxl py-5">
    <div class="container">
   
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">{{ $pageSelect == 'menu' ? 'Foods Menu' : 'Order Foods' }}</h5>
            <div class="row justify-content-center mb-3">
                <div class="col-md-6">
                    <form action="/menu">
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
                      <button class="btn btn-dark" type="submit" >Search</button>
                    </div>
                    </form>
                </div>
              </div>
        </div>
        

        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
            <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 {{ $searchActive == 'seller' ? 'active' : '' }}" href="/menu?sort=seller">
                        <i class="fa fa-utensils fa-2x text-primary"></i>
                        <div class="ps-3">
                            <small class="text-body">Best Seller</small>
                            <h6 class="mt-n1 mb-0">ZenkFood</h6>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 pb-3 {{ $searchActive == 'foods' ? 'active' : '' }}" href="/menu?sort=foods">
                        <i class="fa fa-hamburger fa-2x text-primary"></i>
                        <div class="ps-3">
                            <input type="hidden" name="bestfood"  value="makanan">
                            <small class="text-body">Best of</small>
                            <h6 class="mt-n1 mb-0">Foods</h6>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 me-0 pb-3 {{ $searchActive == 'drinks' ? 'active' : '' }}" href="/menu?sort=drinks">
                        <i class="fa fa-coffee fa-2x text-primary"></i>
                        <div class="ps-3">
                            <input type="hidden" name="bestdrink"  value="minuman">
                            <small class="text-body">Best of</small>
                            <h6 class="mt-n1 mb-0">Drinks</h6>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    
            
            <div class="container">

                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach ($menus as $menu)
                        <menu-card-product :menu="{{ $menu }}"></menu-card-product>
                    @endforeach
                </div>
                  <div class="row mt-5">
                      <div class="col">
                        <div class="d-flex justify-content-center">
                            {{ $menus->links() }}
                          </div>
                      </div>
                  </div>



                
            </div>

    </div>
</div>
<!-- Menu End -->
@endsection