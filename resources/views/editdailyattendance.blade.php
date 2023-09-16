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

            <li><a href="{{ asset('/dailyattendance') }}">Daily Attendance</a></li>

        </ul>
        <label id="icon">
            <i class="fas fa-bars"></i>
        </label>
    </nav>

    <section class="web-content">
        <div class="form-area">
            <form action="/editatt" method="post">
                {{ csrf_field() }}
                <div class="form-title">
                    <div>Update Attendance</div>
                </div>

                <div class="input-feild">
                    <input class="inpt" type="hidden" id="id" placeholder="" name="id"
                        value="{{ $dailyatt->id }}" /><br />
                    <label for="">Date</label>
                    <input class="inpt" type="date" id="date" placeholder="" name="date"
                        value="{{ $dailyatt->Date }}" required /><br />

                    <label for="">Register Number</label>
                    <input class="inpt" type="text" id="regno" placeholder="" name="registerno"
                        value="{{ $dailyatt->Register_Number }}" required /><br />

                    <label for="">Student Name</label>
                    <input class="inpt" type="text" id="stuname" placeholder="" name="studentname"
                        value="{{ $dailyatt->Name }}" required /><br />

                    <label for="">Room No</label>
                    <input class="inpt" type="number" id="room" placeholder="" name="room"
                        value="{{ $dailyatt->Room_No }}" required /><br />

                    <label for="">Time Out</label>
                    <input class="inpt" type="time" id="Tout" placeholder=""
                        name="Tout"value="{{ $dailyatt->Time_Out }}" /><br />

                    <label for="">Time In</label>
                    <input class="inpt" type="time" id="Tin" placeholder="" name="Tin" required /><br />

                    <div class="button-sec" id="ab">
                        <input class="button" type="submit" id="sub_btn" value="Update Attendance" />
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>

</html>
