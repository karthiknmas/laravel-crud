<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel</title>
    <style>
        .page-header {
            color: red;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        thead {
            border: 2px solid black;
            padding: 10px;
            background-color: #3ad8d0bb;
        }

        th,
        td {
            padding: 15px;
            text-align: center;
            border: 1px solid black;
        }

        .route {
            float: right;
            background-color: rgb(230, 28, 203);
            margin: 5px;
            padding: 13px;
            border-radius: 10px;
            text-decoration: none;
            color: black;
        }

        form {
            display: inline-block;
        }

        .view {
            padding: 7px;
            border-radius: 5px;
            background-color: rgba(14, 14, 168, 0.925);
            font-size: 12px;
            color: #FFFFFF;
            border: none;
            cursor: pointer;
        }

        .edit {
            padding: 7px;
            border-radius: 5px;
            background-color: rgba(13, 151, 13, 0.767);
            font-size: 12px;
            color: #FFFFFF;
            border: none;
            cursor: pointer;
        }

        .delete {
            padding: 7px;
            border-radius: 5px;
            background-color: #ff0000b6;
            font-size: 12px;
            color: #FFFFFF;
            border: none;
            cursor: pointer;
        }

        .pagination {
            float: right;
        }

        .w-5 {
            display: none;
        }
    </style>
</head>

<body>
    <h1 class="page-header">Students Table</h1>
    <a class="route" href="{{ url('student/create') }}">Add</a>
    <a class="route" href="{{ url('contact/create') }}">Create New Contact</a>
    @section('content')
        <table>
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->mobile }}</td>
                        <td>
                            <form method="get" action="{{ url('/student/' . $student->id) }}"><button
                                    class="view">View</button>
                            </form>&nbsp;
                            <form method="get" action="{{ url('/student/' . $student->id . '/edit') }}">
                                <button class="edit">Edit</button>
                            </form>&nbsp;
                            <form method="post" action="{{ url('student', $student->id) }}"><button type="submit"
                                    class="delete">Delete</button>
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <span class="pagination">{!! $students->links() !!}</span>
    </body>

    </html>
    {{--
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        form {
            /* border: 1px solid black; */
            padding: 20px;
            text-align: center;
            margin: 150px;
        }

        .form-align {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
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
            padding: 7px;
            border-radius: 5px;
            background-color: rgba(13, 151, 13, 0.767);
            font-size: 12px;
            color: #FFFFFF;
            position: relative;
            left: 20px;
        }

        .error {
            position: relative;
            left: 60px;
            color: red;
            font-weight: 400;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <form method="post" action="{{ url('student') }}">
        @csrf
        @section('content')
            <div class="form-align">
                <div class="form-group">
                    <h2>Student Form</h2><br />
                    <label>Name</label>
                    <input type="text" value="{{ old('name') }}" name="name" id="name" placeholder="Name">
                    @if ($errors->has('name'))
                        <div class="error">
                            @error('name')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    @endif
                </div><br />
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" value="{{ old('email') }}" name="email" id="email" placeholder="Email">
                    @if ($errors->has('email'))
                        <div class="error">
                            @error('email')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    @endif
                </div><br />
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" value="{{ old('phone') }}" name="phone" id="phone" placeholder="Phone">
                    @if ($errors->has('phone'))
                        <div class="error">
                            @error('phone')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    @endif
                </div><br />
                <div class="form-group">
                    <label>Subject</label>
                    <input type="text" value="{{ old('subject') }}" name="subject" id="subject" placeholder="Subject">
                    @if ($errors->has('subject'))
                        <div class="error">
                            @error('subject')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    @endif
                </div><br />
                <div class="form-group">
                    <label>Message</label>
                    <textarea name="message" value="{{ old('message') }}" id="message" rows="4"></textarea>
                    @if ($errors->has('message'))
                        <div class="error">
                            @error('message')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    @endif
                </div><br />
                <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
            </div>
        </form>
    </body>

    </html> --}}
