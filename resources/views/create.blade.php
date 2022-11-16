<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<style>
    form {
        display: flex;
        padding: 20px;
        text-align: center;
        margin: 200px;
    }

    .form-group {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
        width: 40%;
        padding: 20px;
        margin-left: auto;
        margin-right: auto;
    }

    .form-group:hover {
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    }

    label {
        position: relative;
        right: 40px;
    }

    input {
        padding: 5px;
        border-radius: 7px;
        position: relative;
        left: 70px;
    }

    input {
        padding: 8px 15px;
        box-sizing: border-box;
        border: 3px solid #ccc;
        -webkit-transition: 0.5s;
        transition: 0.5s;
        outline: none;
    }

    input:focus {
        border: 3px solid #555;
    }

    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
    }

    .create {
        padding: 7px;
        border-radius: 5px;
        background-color: rgba(13, 151, 13, 0.767);
        font-size: 12px;
        color: #FFFFFF;
        border: none;
        cursor: pointer;
    }

    .form-control:focus {
        border-color: #000;
        box-shadow: none;
    }

    .errors {
        position: relative;
        left: 80px;
        color: red;
        font-weight: 400;
        font-size: 14px;
    }

    .back {
        padding: 9px;
        border-radius: 5px;
        background-color: rgba(14, 14, 168, 0.925);
        font-size: 12px;
        color: #FFFFFF;
        text-decoration: none;
        float: right;
    }
</style>

<body>
    @section('content')
        <form action="{{ url('student') }}" method="post">
            @csrf
            <div class="form-group">
                <div>
                    <a class="back" href="{{ url('student') }}">Back</a>
                    <h2>Create Student</h2><br />
                    <label>Name :</label>
                    <input type="text" name="name" id="name"
                        class="form-control {{ $errors->has('name') ? 'error' : '' }}" placeholder="Name" />
                    @if ($errors->has('name'))
                        <div class="errors">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div><br /><br />
                <div>
                    <label>Email :</label>
                    <input type="text" name="email" id="email"
                        class="form-control {{ $errors->has('email') ? 'error' : '' }}" placeholder="Email" />
                    @if ($errors->has('email'))
                        <div class="errors">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div><br /><br />
                <div>
                    <label>Mobile :</label>
                    <input type="number" name="mobile" id="mobile"
                        class="form-control {{ $errors->has('mobile') ? 'error' : '' }}" placeholder="Mobile" />
                    @if ($errors->has('mobile'))
                        <div class="errors">
                            {{ $errors->first('mobile') }}
                        </div>
                    @endif
                </div><br /><br />
                <button type="submit" class="create">Submit</button>
            </div>
        </form>


    </body>

    </html>
