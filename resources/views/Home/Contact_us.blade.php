@extends('layouts.frontend.home_body')

@section('title')
    PermisGO Contact Us
@endsection

@section('content')
    <div class="container mt-5">
        <div class="container-fluid text-center">
            <h1 class="heading">Contact Us</h1>
        </div>
        <div class="form-floating mb-3">
            <div class="row">
                <div class="col-smd-6 mt-auto">
                    <ul class="contact-ul">
                        <li>PermisGo<br /> <br />
                        <li><i class="fa-solid fa-phone"> </i> +12 3456789</li> <br />
                        <li><i class="fa-solid fa-envelope"> </i> Demo@gmail.com</li> <br />
                        <li><i class="fa-solid fa-location-dot"></i> Mars street # 12, House # 33</li> <br />
                    </ul>
                </div>
                <div class="col-md-6 text-center">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5100.535469063047!2d51.50800676372265!3d25.316860151988585!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e45db359d61097f%3A0xb0b3e2e559f5566f!2sfootball%20stadium!5e0!3m2!1sen!2s!4v1672539467082!5m2!1sen!2s"
                        class="contact_map" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="container-fluid mt-5">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem repellat cum, similique blanditiis
                    ratione eius praesentium sunt eaque. Cumque reprehenderit ipsa nulla aliquam ab dignissimos!
                    Repudiandae, esse consequatur? Ipsam, quam.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus quibusdam animi, a necessitatibus
                    nobis atque deleniti quasi sequi, error iure deserunt dolorem nostrum! Voluptas reprehenderit a
                    laudantium saepe, veniam ullam?</p>
            </div>
        </div>
    </div>
@endsection
