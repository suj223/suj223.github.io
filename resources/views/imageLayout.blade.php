<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
    <table>
    @foreach($data as $hour => $images)
    <tr style="border: 1px solid black;overflow:hidden;height: 60px;">
        <td style="border-top: 1px solid black;border-left: 1px solid black;border-bottom: 1px solid black;overflow:hidden; padding:10px;">{{Carbon\Carbon::createFromFormat('H', $hour)->format('hA')}}</td>
        <td style="border-top: 1px solid black;border-right: 1px solid black;border-bottom: 1px solid black;overflow:hidden;">
            @foreach($images as $image)
                <ul style="display:inline-block; list-style-type: none;margin: 0; padding: 0;text-align:center; {{count($images) > 1 ? 'padding-top:30px;' :'padding:10px;'}}">
                  <li><img src="{{public_path() . '/' .$image['image']}}" style="height: 50px;"></li>
                  <li><span>{{$image['name']}}</span></li>
                  <li><span>{{$image['eyeType']}}</span></li>
                </ul>
            @endforeach
        </td>
    </tr>

    <br>
    @endforeach
    </table>
</body>
</html>

