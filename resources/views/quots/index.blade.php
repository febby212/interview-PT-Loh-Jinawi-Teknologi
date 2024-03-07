@extends('app.app')

@section('konten')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-center">
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
    </div>
@endsection
