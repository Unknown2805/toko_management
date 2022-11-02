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
            <h5>Products Sale</h4>
        </center>
        <table class="table" id="table1">
            <thead>
                <th>Date time</th>
                <th>Category</th>
                <th>Name</th>
                <th>Quantity</th> 
                <th>Price</th>
                <th>Total</th>           
                <th class="text-success"> 
                    <span>Profit</span>
                    <i class="bi bi-arrow-up"></i>
                </th>
                <th class="text-danger">
                    <span>Loss</span>
                    <i class="bi bi-arrow-down"></i>
                </th>
                <th class="text-success">                            
                    <span>Netto</span>
                    <i class="bi bi-arrow-up"></i>
                </th>
                
            
            </thead>
            <tbody>
                @php $i=1 @endphp
                @foreach($category as $key => $c)
                    @foreach($c->products as $p)
                        @foreach($p->outs as $o)
                            @foreach($o->historyouts as $ho)
                                @foreach($ho->transactions as $t)
                                                                
                                <tr>
                                    <td>{{ date('d-m-Y H:i', strtotime($ho->created_at))}}</td>
                                    <td>{{ $c->name }}</td>
                                    <td>{{ $p->name }}</td>
                                    <td>{{ $ho->qty_k }}</td>  
                                    <td>Rp. @money((float)$ho->price_k)</td>   
                                    <td>Rp. @money((float)$t->total)</td>
                                    <td class="text-success">Rp. @money((float)$t->profit)</td>
                                    <td class="text-danger">Rp. @money((float)$t->loss)</td>
                                    <td class="text-success">Rp. @money((float)$t->netto)</td>                                                                              
                                                                
                                
                                </tr> 


                                @endforeach
                            @endforeach
                        @endforeach
                    @endforeach  
                @endforeach   
            </tbody>
        </table>

    </body>
</html>