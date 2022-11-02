<html>
    <head>
        <link rel="stylesheet" href={{asset('assets/css/main/app.css')}}>

    </head>
    <body>
        <table>
            <tbody>
                <tr></tr>
                <tr>
                    <td></td>
                    <td colspan="9" style="font-weight:bold;border:5px solid black;text-align:center">Transaction</td>
                </tr>
                <tr>
                    <td></td>
                    <td style="font-weight:bold;border:5px solid black;width:120px">Date time</td>
                    <td style="font-weight:bold;border:5px solid black;width:120px">Category</td>
                    <td style="font-weight:bold;border:5px solid black;width:120px">Product</td>
                    <td style="font-weight:bold;border:5px solid black">Quantity</td>
                    <td style="font-weight:bold;border:5px solid black;width:120px">Price</td>
                    <td style="font-weight:bold;border:5px solid black;width:120px">Total</td>
                    <td style="font-weight:bold;border:5px solid black;width:120px">Profit</td>
                    <td style="font-weight:bold;border:5px solid black;width:120px">Loss</td>
                    <td style="font-weight:bold;border:5px solid black;width:120px">Netto</td>

                </tr>
                @foreach($category as $c)
                    @foreach($c->products as $p)
                        @foreach($p->outs as $o)
                            @foreach($o->historyouts as $ho)
                                @foreach($ho->transactions as $t)
                                                            
                                <tr>
                                    <td></td>
                                    <td style="border:5px solid black">{{ date('d-m-Y H:i', strtotime($ho->created_at))}}</td>
                                    <td style="border:5px solid black">{{ $c->name }}</td>
                                    <td style="border:5px solid black">{{ $p->name }}</td>
                                    <td style="border:5px solid black">{{ $ho->qty_k }}</td>  
                                    <td style="border:5px solid black">Rp. @money((float)$ho->price_k)</td>   
                                    <td style="border:5px solid black">Rp. @money((float)$t->total)</td>
                                    <td style="border:5px solid black" class="text-success">Rp. @money((float)$t->profit)</td>
                                    <td style="border:5px solid black" class="text-danger">Rp. @money((float)$t->loss)</td>
                                    <td style="border:5px solid black" class="text-success">Rp. @money((float)$t->netto)</td>                              
                                
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