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
    <title>Attendance - Daily Attendance</title>
</head>

<body>
    <nav>
        <label class="logo"><a id="logo" href="{{ asset('/') }}"><img src="{{ asset('img/logo.jpg') }}"
                    alt=""
                    style="border-radius:50px; width:50px; vertical-align: middle; margin-right:20px"></a></label>
        <ul>
            <li><a href="{{ asset('/managedetails') }}">Home</a></li>
            <li><a href="{{ asset('/studentdetails') }}">Students' Details</a></li>
            <li><a href="" class="active">Daily Attendance</a></li>
            <li><a href="{{ asset('/logout') }}">Log Out</a></li>
        </ul>
        <label id="icon">
            <i class="fas fa-bars"></i>
        </label>
    </nav>

    <section class="web-content align-top">
        <div class="table-area">

            <!-- <div class="button-sec"> -->
            <form method="GET" action="/searchattendance">
                {{ csrf_field() }}
                <div
                    style="margin-bottom: 20px; margin-top:20px; display: flex; justify-content: space-between; width: 100%; align-items: center;">
                    <div>
                        <input type="search" name="search" placeholder="Search by your registration number"
                            class="search inpt">
                        <button type='submit' class="button xy" id="addbtn"> Search </button>
                    </div>
                    <div class="button-sec">
                        <a href="{{ asset('/addnewdailyattendance') }}" class="button" id="addbtn">Add New Record</a>
                    </div>

                </div>
            </form>
            <!-- </div> -->
            <table>
                <thead>
                    <th id="a">Date</th>
                    <th id="b">Register Number</th>
                    <th id="c">Name</th>
                    <th id="d">Room No</th>
                    <th id="e">Time Out</th>
                    <th id="f">Time In</th>
                    <th id="g">IsIn or Not</th>
                    <th id="h">Update</th>
                </thead>
                <tbody id="tbody">
                    @foreach ($dailyatt as $att)
                        <tr>
                            <td>{{ $att->Date }}</td>
                            <td>{{ $att->Register_Number }}</td>
                            <td>{{ $att->Name }}</td>
                            <td>{{ $att->Room_No }}</td>
                            <td>{{ $att->Time_Out }}</td>
                            <td>{{ $att->Time_In }}</td>
                            <td>
                                {{-- {{ $att->IsInOrOut }} --}}
                                @if (!$att->IsInOrOut)
                                    <a href="/isin/{{ $att->id }}">
                                        <div class="button-sec" id="ab">
                                            <input class="button xy red" value="Out" />
                                        </div>
                                    @else
                                        <a href="/isnotin/{{ $att->id }}">
                                            <div class="button-sec" id="ab">
                                                <input class="button xy yellow" value="In" />
                                            </div>
                                @endif
                            </td>


                            <td><a href="/upatt/{{ $att->id }}">
                                    <div class="button-sec" id="ab">
                                        <input class="button xy" value="Update" />
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
