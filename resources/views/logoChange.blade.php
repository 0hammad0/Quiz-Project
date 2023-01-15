@extends('layouts.backend.body')

@section('title')
    Logo Changer
@endsection

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Logo Changer</h6>
                </nav>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">
                                    List of Series
                                </h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="container">
                                <form action="/logoChaning" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Upload logo</label>
                                        <input type="file" class="form-control" id="exampleFormControlInput1"
                                            style="background: grey;color: white;padding-left: 5px;" name="logo_image">

                                        <br />

                                        <input type="input" class="form-control" id="exampleFormControlInput1"
                                            style="background: rgb(146, 146, 146);color: white;padding-left: 5px;"
                                            placeholder="Enter logo name" name="logo_word" required>
                                    </div>
                                    <button type="submit" class="btn btn-success">Upload Logo</button>
                                </form>
                            </div>
                            <br />
                            <div class="container">
                                <form action="/logoSelection" method="POST">
                                    @csrf
                                    <select class="form-select" aria-label="Default select example" style="padding: 10px;"
                                        name="selectedLogo">
                                        <option selected>select logo</option>
                                        <option value="{{ $logo->logo_image }}">Logo Image</option>
                                        <option value="{{ $logo->logo_word }}">{{ $logo->logo_word }}</option>
                                    </select>
                                    <br />
                                    <button type="submit" class="btn btn-success">Select Logo</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
