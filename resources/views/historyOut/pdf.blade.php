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
            <h5>History Out</h4>
        </center>
        <table class="table" id="table1">
            <thead>
                <th>No</th>
                <th>Date</th>
                <th>Category</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>            
            </thead>
            <tbody>
                @php $i=1 @endphp
                @foreach($category as $key => $c)
                    @foreach($c->products as $p)
                        @foreach($p->outs as $o)
                            @foreach($o->historyouts as $ho)
                                                                
                                <tr>
                                    <td>{{ $i++}}</td>       
                                    <td>{{ date('d-m-Y H:i', strtotime($ho->created_at))}}</td>                  
                                    <td>{{ $c->name }}</td>
                                    <td>{{ $p->name }}</td>
                                    <td>{{ $ho->qty_k }}</td>  
                                    <td>Rp. @money((float)$ho->price_k)</td>                                                                                                              
                                </tr> 

                            @endforeach
                        @endforeach
                    @endforeach  
                @endforeach   
            </tbody>
        </table>

    </body>
</html>