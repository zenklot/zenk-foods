@extends('layouts.main')
@section('hero')
<div class="container-xxl py-5 bg-dark mb-3">
</div>
@endsection

@section('content')


    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Transaction</h5>
                    <h1 class="mb-5">My Transaction</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title text-white">Transaksi Booking</h3>
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                          </div>
                          <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" style="display: block;">
                            <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Booking Date</th>
                                        <th scope="col">No Meja</th>
                                        <th scope="col">Pembayaran</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($bookings as $booking)
                                    <tr>
                                        <th scope="row">{{ $booking['booking_id'] }}</th>
                                        <td>{{ $booking['booking_date'] }}</td>
                                        <td>{{ $booking['no_meja'] }}</td>
                                        <td>{{ $booking['payment_status'] }}</td>
                                        <td>
                                           {{ $booking['booking_status'] }}
                                            </td>
                                        <td>{{ $booking['total_booking']}}</td>
                                        <td>
                                            @if ( $booking['booking_status'] == 'pending' &&  ($booking['payment_status'] == 'challenge' || $booking['payment_status'] == 'pending'))
                                            <form action="{{ route('transaction.show', $booking['booking_id']) }}" method="GET">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">Bayar</button>
                                            </form>
                                                
                                            @endif

                                            

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        </div>
                        <!-- /.card-body -->
                      </div>
                </div>
                <div class="col-12">
                    <div class="card card-success">
                        <div class="card-header">
                          <h3 class="card-title text-white">Transaksi Order Food</h3>
          
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                          </div>
                          <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" style="display: block;">
                          The body of the card
                        </div>
                        <!-- /.card-body -->
                      </div>
                </div>
            </div>
        </div>
    </div>

@endsection
