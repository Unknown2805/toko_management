
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
            <h6>{{ date('d M Y', strtotime($tgl1)) }} - {{ date('d M Y', strtotime($tgl2)) }}</h6>
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
                @foreach ($transactions as $transaction)
                    
                    <tr>
                        <td>{{ date('d-m-Y H:i', strtotime($transaction->history_out->created_at))}}</td>
                        <td>{{ $transaction->history_out->product_out->product->category->name }}</td>
                        <td>{{ $transaction->history_out->product_out->product->name }}</td>
                        <td>{{ $transaction->history_out->qty_k }}</td>  
                        <td>Rp. @money((float)$transaction->history_out->price_k)</td>   
                        <td>Rp. @money((float)$transaction->total)</td>
                        <td class="text-success">Rp. @money((float)$transaction->profit)</td>
                        <td class="text-danger">Rp. @money((float)$transaction->loss)</td>
                        <td class="text-success">Rp. @money((float)$transaction->netto)</td>
                    </tr> 
                @endforeach                                                                                            
            </tbody>
        </table>

    </body>
</html>