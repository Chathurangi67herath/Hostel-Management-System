<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;1,400&family=Roboto:wght@100;400;700&display=swap"
        rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;1,400&family=Roboto:wght@100;300;400;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/3.0.0/flickity.css"
        integrity="sha512-TZTUnuHs1njGko8PJqZlHzqZTZd880A+BvhR1jy1v4mWB4VFKVLG/eK9LYdDjxqNLmttSC1ygmqg6rkYjnEgaQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
    <script src="https://kit.fontawesome.com/3b10d45e53.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $("#icon").click(function() {
                $("ul").toggleClass("show");
            });
        });
    </script>
    <title>Manage Details</title>
</head>

<body>
    <nav>
        <label class="logo"><a id="logo" href="{{ asset('/') }}"><img src="{{ asset('img/logo.jpg') }}"
                    alt=""
                    style="border-radius:50px; width:50px; vertical-align: middle; margin-right:20px"></a></label>
        <ul>
            <li><a href="{{ asset('/managedetails') }}">Home</a></li>
            <li><a href="{{ asset('/studentdetails') }}">Students' Details</a></li>
            <li><a href="{{ asset('/dailyattendance') }}">Daily Attendance</a></li>
            <li><a href="{{ asset('/logout') }}">Log Out</a></li>
        </ul>
        <label id="icon">
            <i class="fas fa-bars"></i>
        </label>
    </nav>

    <section class="web-content">

        <div class="form-area">

            <form action="{{ route('saveDetails') }}" method="post" enctype="multipart/form-data">

                {{ csrf_field() }}
                <div class="form-title">
                    <div>Add a New Student</div>
                </div>

                <div class="input-feild">

                    <label class="inpt" style="cursor: pointer; ">
                        <span>Choose Photo</span>
                        <input class="" type="file" id="stuphoto" name="studentphoto"
                            value="{{ old('studentphoto') }}" required />
                    </label>
                    <span class="text-danger" style="color: red;">
                        @error('studentphoto')
                            {{ $message }}
                        @enderror
                    </span>

                    <br>
                    <input class="inpt" type="text" id="regno" placeholder="Register Number" name="registerno"
                        value="{{ old('registerno') }}" />
                    <span class="text-danger" style="color: red;">
                        @error('registerno')
                            {{ $message }}
                        @enderror
                    </span>
                    <br>
                    <input class="inpt" type="text" id="stuname" placeholder="Student Name (with initials)"
                        name="studentname" value="{{ old('studentname') }}" />
                    <span class="text-danger" style="color: red;">
                        @error('studentname')
                            {{ $message }}
                        @enderror
                    </span>
                    <br>
                    <input class="inpt" type="text" id="addrs" placeholder="Home Address" name="address"
                        value="{{ old('address') }}" />
                    <span class="text-danger" style="color: red;">
                        @error('address')
                            {{ $message }}
                        @enderror
                    </span>
                    <br>
                    <input class="inpt" type="email" id="EmlAddrs" placeholder="Email Address" name="email"
                        value="{{ old('email') }}" />
                    <span class="text-danger" style="color: red;">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                    <br>
                    <input class="inpt" type="text" id="telno" placeholder="Phone Number" name="phoneno"
                        value="{{ old('phoneno') }}" />
                    <span class="text-danger" style="color: red;">
                        @error('phoneno')
                            {{ $message }}
                        @enderror
                    </span>
                    <br>
                    <input class="inpt" type="text" id="nic" placeholder="NIC No" name="nic"
                        value="{{ old('nic') }}" />
                    <span class="text-danger" style="color: red;">
                        @error('nic')
                            {{ $message }}
                        @enderror
                    </span>
                    <br>

                    <div class="button-sec" id="ab">
                        <input class="button" type="submit" id="sub_btn" value="Add Student" />
                    </div>
                </div>
            </form>
        </div>
    </section>

</body>

</html>
