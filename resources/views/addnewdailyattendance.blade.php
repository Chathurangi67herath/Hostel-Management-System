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
        <label class="logo"><a id="logo" href="{{ asset('/') }}">HGCK</a></label>
        <ul>
            <li><a href="{{ asset('/managedetails') }}">Manage Details</a></li>
            <li><a href="{{ asset('/studentdetails') }}">Students' Details</a></li>
            <li><a href="{{ asset('/dailyattendance') }}">Daily Attendance</a></li>
        </ul>
        <label id="icon">
            <i class="fas fa-bars"></i>
        </label>
    </nav>

    <section class="web-content">
        <div class="form-area">
            <form action="/savedailyattendance" method="post">
                {{ csrf_field() }}
                <div class="form-title">
                    <div>Add a New Record</div>
                </div>

                <div class="input-feild">
                    <label for="">Date</label>
                    <input class="inpt" type="date" id="date" placeholder="" name="date" /><br />

                    <label for="">Register Number</label>
                    <input class="inpt" type="text" id="regno" placeholder="" name="registerno"
                        required /><br />

                    <label for="">Student Name</label>
                    <input class="inpt" type="text" id="stuname" placeholder="" name="studentname"
                        required /><br />

                    <label for="">Room No</label>
                    <input class="inpt" type="number" id="room" placeholder="" name="room" required /><br />

                    <label for="">Time Out</label>
                    <input class="inpt" type="time" id="Tout" placeholder="" name="Tout" required /><br />

                    <div class="button-sec" id="ab">
                        <input class="button" type="submit" id="sub_btn" value="Add New Record" />
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>

</html>
