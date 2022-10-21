<!DOCTYPE html>
<html>
    <head>
        <title>History In</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <style type="text/css">
            table tr td,
            table tr th{
                font-size: 9pt;
            }
        </style>
        <center>
            <h5>History In</h4>
        </center>   
        <table class="table" id="table1">
            <thead>
                <th>No</th>   
                <th>Category</th>                                    
            </thead>
            <tbody>
                @php $i=1 @endphp
                @foreach($category as $key=> $c)                    
                    <tr>
                        <td>{{ $i++}}</td>     
                        <td>{{ $c->name }}</td>                                                                                                                                     
                    </tr>                    
                @endforeach     
            </tbody>
        </table>
        
    
    </body>
</html>