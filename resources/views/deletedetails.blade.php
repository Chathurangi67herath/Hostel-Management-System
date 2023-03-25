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
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;1,400&family=Roboto:wght@100;300;400;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/3.0.0/flickity.css"
        integrity="sha512-TZTUnuHs1njGko8PJqZlHzqZTZd880A+BvhR1jy1v4mWB4VFKVLG/eK9LYdDjxqNLmttSC1ygmqg6rkYjnEgaQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
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
    <title>Attendance - Students' Details</title>
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
        <div class="table-area">
            <div class="button-sec">
                <form method="GET" action="/searchdelete">
                    {{ csrf_field() }}
                    <input type="search" name="search" placeholder="Search by your registration number"
                        class="search">
                    <button type='submit' class="button xy" id="addbtn"> Search </button>
                </form>
            </div>
            <table>
                <thead>
                    <th id="l">Student Photo</th>
                    <th id="m">Register Number</th>
                    <th id="n">Student Name (with initials)</th>
                    <th id="o">Home Address</th>
                    <th id="p">Email Address</th>
                    <th id="q">Phone Number</th>
                    <th id="r">NIC No</th>
                    <th id="s">Delete</th>
                </thead>
                <tbody id="tbody">
                    @foreach ($newdata as $data)
                        <tr>
                            <td><img src="Student_Photo/{{ $data->Student_Photo }}" alt="Student Photo"
                                    style="width:100px;">
                            </td>
                            <td>{{ $data->Register_Number }}</td>
                            <td>{{ $data->Student_Name }}</td>
                            <td>{{ $data->Home_Address }}</td>
                            <td>{{ $data->Email_Address }}</td>
                            <td>{{ $data->Phone_Number }}</td>
                            <td>{{ $data->NIC_No }}</td>
                            <td><a href="/dedetails/{{ $data->id }}">
                                    <div class="button-sec" id="ab">
                                        <input class="button xy" value="Delete"
                                            onclick="return confirm('Do you want to delete {{ $data->Register_Number }} from this database?')" />
                                    </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <script></script>
</body>

</html>
