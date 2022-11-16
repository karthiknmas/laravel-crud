<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        form {
            padding: 10px;
            text-align: center;
            margin: 50px;
        }

        .form-align {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            background-color: #fbfcfc;
            width: 40%;
            padding: 20px;
            margin-left: auto;
            margin-right: auto;
        }

        .form-align:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        label {
            position: relative;
            right: 50px;
        }

        input,
        textarea {
            padding: 5px;
            border-radius: 5px;
            position: relative;
            left: 90px;
        }

        .btn {
            padding: 7px 15px;
            border-radius: 5px;
            background-color: #fff000;
            box-sizing: border-box;
            font-weight: bold;
            color: #000;
            font-size: 13px;
            position: relative;
            left: 20px;
            touch-action: manipulation;
            border: 0;
            user-select: none;
            -webkit-user-select: none;
        }

        .btn:not(:disabled):hover,
        .btn:not(:disabled):focus {
            outline: 0;
            background: #f4e603;
            box-shadow: 0 0 0 2px rgba(0, 0, 0, .2), 0 3px 8px 0 rgba(0, 0, 0, .15);
        }

        .error {
            position: relative;
            left: 110px;
            color: red;
            font-weight: 400;
            font-size: 14px;
        }


        #success_msg {
            color: green;
        }

        .form-group {
            padding: 0.4em 0.4em 0.4em;
        }

        input,
        textarea {
            padding: 6px 15px;
            box-sizing: border-box;
            border: 3px solid #ccc;
            -webkit-transition: 0.5s;
            transition: 0.5s;
            outline: none;
        }

        textarea,
        input:focus {
            border: 3px solid #555;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '#btn-save', function(e) {
                e.preventDefault();
                e.stopPropagation();
                const data = {
                    'name': $('#name').val(),
                    'email': $('#email').val(),
                    'phone': $('#phone').val(),
                    'subject': $('#subject').val(),
                    'message': $('#message').val(),
                }
                console.log(data, 'data');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: '/contact',
                    data: data,
                    success: function(response) {
                        console.log(response, 'response');
                        if (response.status == 400) {
                            $('.name').append(response.errors.name);
                            $('.email').append(response.errors.email);
                            $('.subject').append(response.errors.subject);
                            $('.message').append(response.errors.message);
                            $('.phone').append(response.errors.phone);
                        } else {
                            $('#success_msg').append(response.message);
                            window.location.href = '/student';
                        }
                    }
                });
            })
        })

        $(document).on('click', '#phone', function() {

        })

        function myPassword() {
            const a = document.getElementById('phone');
            if (a.type === 'password') {
                a.type = 'text';
            } else {
                a.type = 'password';
            }
        }
        // $(document).ready(function() {
        //     $(document).on('click', '#div_1', function() {

        //         console.log('div 1');
        //     })

        //     $(document).on('click', '#div_2', function(e) {
        //         e.stopPropagation();
        //         console.log('div 2');
        //     })

        //     $(document).on('click', '#div_3', function() {
        //         console.log('div 3');
        //     })

        //     $(document).on('click', '#pag_1', function() {
        //         console.log('paragaraph');
        //     })
        // })
    </script>
</head>

<body>
    @section('content')
        <form action="{{ url('contact') }}" method="post">
            @csrf
            <div class="form-align">
                <div class="form-group">
                    <h2>Contact Form</h2>
                    <ul id="success_msg"></ul>
                    <label>Name :</label>
                    <input type="text" name="name" id="name" placeholder="Name">
                    <div class="error">
                        <span class="name"></span>
                    </div>
                </div><br />
                <div class="form-group">
                    <label>Email :</label>
                    <input type="email" name="email" id="email" placeholder="Email">
                    <div class="error">
                        <span class="email"></span>
                    </div>
                </div><br />
                <div class="form-group">
                    <label>Phone :</label>
                    <input type="password" name="phone" id="phone" placeholder="Phone">
                    <div class="error">
                        <span class="phone"></span>
                    </div>
                    show number<input type="checkbox" onClick="myPassword()" />
                </div><br />
                <div class="form-group">
                    <label>Subject :</label>
                    <input type="text" name="subject" id="subject" placeholder="Subject" title="Subject">
                    <div class="error">
                        <span class="subject"></span>
                    </div>
                </div><br />
                <div class="form-group">
                    <label>Message :</label>
                    <textarea name="message" id="message" rows="4" placeholder="Message"></textarea>
                    <div class="error">
                        <span class="message"></span>
                    </div>
                </div><br /><br />
                <input type="submit" name="send" id="btn-save" value="Submit" class="btn btn-dark btn-block">
            </div>
        </form>
        {{--
        <div id="div_1">Div 1
            <div id="div_2">Div 2
                <div id="div_3">Div 3
                    <p id="pag_1">Paragraph Tag </p>
                </div>
            </div>
        </div> --}}
    </body>

    </html>
