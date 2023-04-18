@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="banner">
            <img src="{{ asset('welcome-calligraphic-inscription-with-smooth-lines-vector.jpg') }}" alt=""
                class="w-100">
        </div>
        
        {{-- <div class=" pt-5 features">
        <div class="container py-4">
            <div class="row g-4">
                <div class="col-md-3   ">
                        <div class=" rounded shadow   py-4  text-center mb-5">
                                <h4 class=''>Free Shipping</h4>
                                <p>Free shipping on all UK orders</p>

                        </div>
                </div>
                <div class="col-md-3   ">
                        <div class=" rounded shadow text-start  py-4 text-center mb-5">
                                <h4 class=''>Payment On Delivery</h4>
                                <p>Cash On Delivery Option</p>
                        </div>
                </div>
                <div class="col-md-3   ">
                        <div class=" rounded shadow text-start  py-4 text-center mb-5">
                                <h4 class=''>Free Guarantee</h4>
                                <p>30 Days Money Back</p>
                        </div>
                </div>
                <div class="col-md-3   ">
                        <div class=" rounded shadow text-start py-4  text-center mb-5">
                                <h4 class=''>24/7 Online Suport</h4>
                                <p>We Have Support 24/7</p>
                        </div>
                </div>
            </div>
        </div>
    </div> --}}
        <div class="encripted">
            <h2 class="text-center mb-5">Encryption & Decryption
            </h2>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <h3 class="mb-5">Encryption & Decryption Text </h3>
                    <img src="{{ asset('id101-password-encryption.png') }}" alt="" class="w-50">
                    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;"
                        class="btn btn-dark mt-5 w-25">Text </button>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <h3 class="mb-5">Encryption & Decryption Image </h3>
                    <img src="{{ asset('Encryption-vs-Decryption.jpg') }}" alt="" class="w-50">
                    <button onclick="document.getElementById('id02').style.display='block'" class="btn btn-dark mt-5 w-25"
                        style="width:auto;">Image </button>
                </div>
            </div>
        </div>
        <div id="id01" class="modal">
            <div class="modal-content animate w-75 px-5">
                <div class="row">
                    <div class="col-md-6 p-3">
                        <h1>Encrption</h1>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">
                                Text to Encrypt</label>
                            <textarea class="form-control" name="enc_text" id="enc_textarea" rows="5"></textarea>
                        </div>
                        <select class="form-select mt-3"  aria-label="Default select example" id="enc_way">
                            <option value="AES-128-CBC">AES-128-CBC</option>
                            <option value="AES-256-CBC">AES-256-CBC</option>
                            <option value="'BF-CBC">BF-CBC</option>
                            <option value="DES">DES</option>
                        </select>
                        <button type="button" id="encrpt-text" class="btn btn-info w-auto my-3 text-white">Encrypt</button>
                        <div class="form-group ">
                            <label for="exampleFormControlTextarea1">
                                Encrypted Text</label>
                            <textarea class="form-control" name="enc_text_result" id="enc_text_result" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6 p-3">
                        <div class="d-flex justify-content-between">
                            <h1>Decrption</h1>
                            <button class="btn-close">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">
                                Encrypted Text</label>
                            <textarea class="form-control" name="dec_textarea" id="dec_textarea" rows="5"></textarea>
                        </div>
                        <select class="form-select mt-3" aria-label="Default select example" id="dec_way">
                            <option value="AES-128-CBC">AES-128-CBC</option>
                            <option value="AES-256-CBC">AES-256-CBC</option>
                            <option value="'BF-CBC">BF-CBC</option>
                            <option value="DES">DES</option>
                        </select>
                        <button type="button" id="decrpt-text" class="btn btn-info w-auto my-3 text-white">Decrypt</button>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">
                                Decrypted Text</label>
                            <textarea class="form-control" name="dec_text_result" id="dec_text_result" rows="5"></textarea>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div id="id02" class="modal">
            <div class="modal-content animate w-75 px-5">
                <div class="row">
                    <div class="col-md-6 p-3">
                        <h1>Encrption</h1>
                        <form id="encrpt-image" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">

                                <label for="formFile" class="form-label ">Image to Encrypt</label>
                                <input class="form-control" id="file" type="file" name="file" required>
                            </div>
                            <button type="submit" class="btn btn-info w-auto my-3 text-white footer">Encrypt</button>
                        </form>
                        <div class="imageDiv"></div>
                        {{-- <div class="form-group">
                            <label for="exampleFormControlTextarea1"> Encrypted Image</label>
                            <div>
                                <img src="" alt="">
                            </div>
                            <button type="button" class="btn btn-info w-auto my-3 text-white ">Save Image</button>
                        </div> --}}
                    </div>
                    <div class="col-md-6 p-3">
                        <div class="d-flex justify-content-between">
                            <h1>Decrption</h1>
                            <button class="btn-close">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <form method="post" id="dec-image" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="formFile" class="form-label ">Encrypted Image</label>
                                <input class="form-control" type="file" name="file" required>
                            </div>
                            <button type="submit" class="btn btn-info w-auto my-3 text-white">Decrypt</button>
                            <div class="form-group">
                        </form>

                        <label for="exampleFormControlTextarea1">
                            Decrypted Image</label>
                        {{--  <textarea class="form-control" name="enc_text_result" id="enc_text_result" rows="5"></textarea>
                             --}}
                        <div class="decImgeDiv">
                            {{-- <img src="../../storage/app/encrypted/image.jpg" alt="" height="200px" width="200px"> --}}

                        </div>
                        <button type="button" class="btn btn-info w-auto my-3 text-white dFooter">Save Image</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.btn-close').click(function() {
            //$('.popup-img').removeClass('active')
            $('.modal').fadeOut(500)
        })
    </script>

    <script>
        $(document).ready(function() {
            $("#encrpt-text").click(function() {
                var textAreaValue = $('#enc_textarea').val();
                var way = $('#enc_way').val();
                $.ajax({
                    url: 'text/encrypt',
                    type: 'POST',
                    data: {
                        textAreaValue: textAreaValue,
                        way: way
                    },
                    beforeSend: function(xhr) {
                        xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr(
                            'content'));
                    },
                    success: function(response) {
                        $("#enc_text_result").val(response);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log('Error: ' + errorThrown);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#decrpt-text").click(function() {
                var DectextareaValue = $('#dec_textarea').val();
                var way = $('#dec_way').val();
                $.ajax({
                    url: 'text/decrypt',
                    type: 'POST',
                    data: {
                        DectextareaValue: DectextareaValue,
                        way: way
                    },
                    beforeSend: function(xhr) {
                        xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr(
                            'content'));
                    },
                    success: function(response) {
                        $("#dec_text_result").val(response);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log('Error: ' + errorThrown);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Handle form submission
            $('#encrpt-image').on('submit', function(event) {
                event.preventDefault();

                // Get form data
                var formData = new FormData(this);

                // Send AJAX request
                $.ajax({
                    url: '/image/encrypt',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response)
                        // Display encrypted image in modal
                        // $('.imageDiv').html('<img src="' + response.image + '" width = 200px height = 200px>');
                        $('.footer').html('<a class="text-white" href="' + response.download_link + '" Download>Download Encrypted Image</a>');
                    },
                    error: function() {
                        alert('Error encrypting image. Please try again.');
                    }
                });
            });
        });
    </script>
    <script>
        $("#dec-image").submit(function(event) {
            event.preventDefault(); // Prevent form from submitting normally

            // Create FormData object to send the file
            var formData = new FormData(this);

            $.ajax({
                url: "/decrypt-image", // Replace with your Laravel route
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response)
                    // Display encrypted image in modal
                    // $('.imageDiv').html('<img src="' + response.image + '" width = 200px height = 200px>');
                    $('.dFooter').html('<a class="text-white" href="' + response.image + '" Download>Download Encrypted Image</a>');
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    </script>
@endsection
