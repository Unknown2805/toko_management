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
                <th>Date</th>
                <th>Category</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Modal</th>
            
            
            </thead>
            <tbody>
                @php $i=1 @endphp
                @foreach($category as $key=> $c)
                    @foreach($c->products as $p)
                        @foreach($p->historyins as $hi)
                            <tr>
                                <td>{{ $i++}}</td>     
                                <td>{{ date('d-m-Y H:i', strtotime($hi->created_at))}}</td>
                                <td>{{ $c->name }}</td>                               
                                <td>{{ $p->name }}</td>   
                                <td>{{ $hi->qty}}</td>
                                <td>Rp. @money((float)$hi->price)</td>                                                                              
                            
                            </tr>
                        @endforeach
                    @endforeach
                @endforeach     
            </tbody>
        </table>
        
    
    </body>
</html>










