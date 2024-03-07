@extends('app.app')

@section('konten')
    <div class="row">
        <div class="col-lg-8 d-flex align-items-center">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                        <div class="mb-3 mb-sm-0">
                            <h5 class="card-title fw-semibold">Quots of the day</h5>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="text-center">
                            <figure>
                                <blockquote class="blockquote">
                                    <p>{{$data[0]['quote']}}</p>
                                </blockquote>
                                <figcaption class="blockquote-footer">
                                    {{$data[0]['author']}} <cite title="Source Title">({{$data[0]['category']}})</cite>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Yearly Breakup -->
                    <div class="card overflow-hidden">
                        <a href="">
                            <div class="card-body p-4">
                                <h5 class="card-title mb-9 fw-semibold">Quots of the day</h5>
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h4 class="fw-semibold mb-3">Coba lihat!!</h4>
                                        <div class="d-flex align-items-center mb-3">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="d-flex justify-content-center">
                                            <div id="breakup"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <!-- Monthly Earnings -->
                    <div class="card">
                        <a href="">
                            <div class="card-body">
                                <div class="row alig n-items-start">
                                    <div class="col-8">
                                        <h5 class="card-title mb-9 fw-semibold">Cari quot kamu</h5>
                                        <h4 class="fw-semibold mb-3">Coba cari!!</h4>
                                        <div class="d-flex align-items-center pb-1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
