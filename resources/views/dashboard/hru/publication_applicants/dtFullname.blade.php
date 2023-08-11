<b>{{$data->lastname}}, {{$data->firstname}}</b>

<div class="table-subdetail" style="margin-top: 3px">
    <table style="width: 100%;">
        <tr>
            <td>Birthday</td>
            <td>{{$data->date_of_birth}}</td>
        </tr>
        <tr>
            <td>Age</td>
            <td>{{\Illuminate\Support\Carbon::parse($data->date_of_birth)->age}}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{$data->email}}</td>
        </tr>
        <tr>
            <td>Phone</td>
            <td>{{$data->contact_no}}</td>
        </tr>
    </table>
</div>