<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<style>
    form {
        /* border: 1px solid black; */
        padding: 20px;
        text-align: center;
        margin: 150px;
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
        right: 50px;
    }

    input {
        padding: 5px;
        border-radius: 5px;
        position: relative;
        left: 90px;
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

    .update {
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

    .error {
        /* margin-left: 4em;*/
        position: relative;
        left: 65px;

        color: red;
        font-weight: 400;
        font-size: 14px;
        /* margin-left: 40px; */
    }
</style>

<body>
    @section('content')
        <form action="{{ url('student', $student->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <div>
                    <h2>Update Student</h2><br />
                    <input type="hidden" name="id" id="id" value="{{ $student->id }}" />
                    <label>Name :</label>
                    <input type="text" name="name" id="name"
                        class="form-control {{ $errors->has('name') ? 'error' : '' }}" placeholder="Name"
                        value="{{ $student->name }}" />
                    @if ($errors->has('name'))
                        <div class="error">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div><br /><br />
                <div>
                    <label>Email :</label>
                    <input type="text" name="email" id="email"
                        class="form-control {{ $errors->has('email') ? 'error' : '' }}" placeholder="Email"
                        value="{{ $student->email }}" />
                    @if ($errors->has('email'))
                        <div class="error">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div><br /><br />
                <div>
                    <label>Mobile :</label>
                    <input type="text" name="mobile" id="mobile"
                        class="form-control {{ $errors->has('mobile') ? 'error' : '' }}" placeholder="Mobile"
                        value="{{ $student->mobile }}" />
                    @if ($errors->has('mobile'))
                        <div class="error">
                            {{ $errors->first('mobile') }}
                        </div>
                    @endif
                </div><br /><br />
                <button class="update" type="submit" value="Update Student">Update</button>
            </div>
        </form>
    </body>

    </html>
