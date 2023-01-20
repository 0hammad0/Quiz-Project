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
                        <li><i class="fa-solid fas fa-phone"> </i> +12 3456789</li> <br />
                        <li><i class="fa-solid fas fa-envelope"> </i> Demo@gmail.com</li> <br />
                        <li><i class="fas fa-map"></i> Mars street # 12, House # 33</li> <br />
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
                <form action="POST">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1"
                            placeholder="your email address" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label"></label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
                    </div>
                    <button class="btn btn-primary btn-cus" type="submit">Send</button>
                </form>
            </div>
        </div>
    </div>
@endsection
