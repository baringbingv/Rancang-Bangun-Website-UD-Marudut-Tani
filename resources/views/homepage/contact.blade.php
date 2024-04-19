@extends('layouts.layout')
@section('title', 'Contact Us')
@section('navhead')
@section('content')
    <div class="container-fluid contact py-5">
        <div class="container py-5">
            <div class="p-5 bg-light rounded">
                <div class="row g-4">
                    <div class="col-12">
                    </div>
                    <div class="col-lg-12">
                        <div class="h-100 rounded">
                            <iframe class="rounded w-100"
                            style="height: 600px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3856.587225481647!2d99.20328827934568!3d2.388762500000009!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302dfe335caf1889%3A0x940958dfe5f93b73!2sMarudut%20Florist%2FTani!5e1!3m2!1sid!2sid!4v1709446379237!5m2!1sid!2sid"
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <form action="send-email.php" method="post" class="">
                            <input type="text" class="w-100 form-control border-0 py-3 mb-4" placeholder="Your Name">
                            <input type="email" class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Your Email">
                            <textarea class="w-100 form-control border-0 mb-4" rows="5" cols="10" placeholder="Your Message"></textarea>
                            <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary " type="submit">Submit</button>
                        </form>
                    </div>
                    <div class="col-lg-5">
                        <div class="d-flex p-4 rounded mb-4 bg-white">
                            <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                            <div>
                                <h4>Address</h4>
                                <p class="mb-2">Jl. D.I. Panjaitan, Marsangap, Kec. Sigumpar, Toba, Sumatera Utara</p>
                            </div>
                        </div>
                        <div class="d-flex p-4 rounded mb-4 bg-white">
                            <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                            <div>
                                <h4>Mail Us</h4>
                                <p class="mb-2">info@example.com</p>
                            </div>
                        </div>
                        <div class="d-flex p-4 rounded bg-white">
                            <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                            <div>
                                <h4>Telephone</h4>
                                <p class="mb-2">0821 - 6738 - 5706</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('footer')
@endsection
