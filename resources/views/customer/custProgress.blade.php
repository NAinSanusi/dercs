<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>{{config('app.name')}}</title>
    @include('layouts.bootstrap')
    <style>
        .homepage {
                position: fixed;
                right: 25px;
                bottom: 15px;
                border-radius: 50%;
        }
        th {
            text-align: center;
        }
        td {
            text-align: center;
        }
        input {
                text-align: center;
        }
        .noborder {
            border: 0px none;
        }
    </style>
</head>
<body>
    @include('layouts.navbar')
    <div class="container" style="margin-top: 30px">
        <u style="font-size:large;"><h2>Tracking Status</h2></u> 
        <br> 
        <table border="1px solid black" style="margin-left:auto;margin-right:auto;">
                <tr>
                    <th>Device</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                </tr>
                @foreach ($info as $row1)
                @php 
                    $temp = explode(' ',$row1->updated_at); 
                @endphp
                <tr>
                    <td><input type="text" value="{{$row1->device}}" class="noborder" readonly></td>
                    <td><input type="text" value="{{$temp[0]}}" class="noborder" readonly></td>
                    <td><input type="text" value="{{$temp[1]}}" class="noborder" readonly></td>
                    <td>
                        <input type="text" value="{{$row1->trackProgress}}" class="noborder" readonly>
                        @if($row1->trackProgress == 'Returning')
                        <form action="returned" method="post">
                        @csrf
                            <input type="hidden" value="{{$row1->id}}" name="trackID">
                            <button type="submit" class="btn btn-warning">Returned</button>
                        </form>
                        @endif
                    </td>
                <tr>
                
                @endforeach
        </table> 
        <br><br>
        <center><a href="cTrackList"><button class="btn btn-warning">Back</button></a></center>
    </div>
</body>
</html>