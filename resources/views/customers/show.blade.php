@extends('app')
@section('content')
@if(Auth::check())
    <h1>Customer </h1>

    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr class="bg-info">
            <tr>
                <td>Name</td>
                <td><?php echo ($customer['name']); ?></td>
            </tr>
            <tr>
                <td>Customer ID</td>
                <td><?php echo ($customer['cust_number']); ?></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><?php echo ($customer['address']); ?></td>
            </tr>
            <tr>
                <td>City </td>
                <td><?php echo ($customer['city']); ?></td>
            </tr>
            <tr>
                <td>State</td>
                <td><?php echo ($customer['state']); ?></td>
            </tr>
            <tr>
                <td>Zip </td>
                <td><?php echo ($customer['zip']); ?></td>
            </tr>
            <tr>
                <td>Home Phone</td>
                <td><?php echo ($customer['home_phone']); ?></td>
            </tr>
            <tr>
                <td>Cell Phone</td>
                <td><?php echo ($customer['cell_phone']); ?></td>
            </tr>


            </tbody>
        </table>
    </div>


    <?php
    $stockprice=null;
    $stotal = 0;
    $svalue=0;
    $itotal = 0;
    $ivalue=0;
    $iportfolio = 0;
    $cportfolio = 0;

    $tot_stock_old=0;
    $tot_stock_cur=0;
    ?>
    <br>
    <h2>Stocks </h2>
    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr class="bg-info">
                <th> Symbol </th>
                <th>Stock Name</th>
                <th>No. of Shares</th>
                <th>Purchase Price</th>
                <th>Purchase Date</th>
                <th>Original Value</th>
                <th>Current Price</th>
                <th>Current Value</th>
            </tr>
            </thead>

            <tbody>




            @foreach($customer->stocks as $stock)
                <tr>
                    <td>{{ $stock->symbol }}</td>
                    <td>{{ $stock->name }}</td>
                    <td>{{ $stock->shares }}</td>
                    <td>{{ $stock->purchase_price }}</td>
                    <td>{{ $stock->purchased }}</td>
                    <!--insert original value-->
                    <?php
                        $org_val_fac_one = $stock->shares;
                        $org_val_fac_two = $stock->purchase_price;
                        $org_val = $org_val_fac_one*$org_val_fac_two;
                        $tot_stock_old=$tot_stock_old+$org_val;
                    ?>
                    <td>{{ "$" . $org_val }}</td>
                    <!--insert current price-->
                    <?php
                        $cur_symbol=$stock->symbol;
                        $URL = "http://www.google.com/finance/info?q=NSE:" . $cur_symbol;
                        $file = fopen("$URL", "r");
                        $r = "";
                        do {
                            $data = fread($file, 500);
                            $r .= $data;
                        } while (strlen($data) != 0);
                        //Remove CR's from ouput - make it one line
                        $json = str_replace("\n", "", $r);

                        //Remove //, [ and ] to build qualified string
                        $data = substr($json, 4, strlen($json) - 5);

                        //decode JSON data
                        $json_output = json_decode($data, true);
                        //echo $sstring, "<br>   ";
                        $current_price = "\n" . $json_output['l'];
                        //var_dump(json_decode($data));
                        //var_dump($current_price);
                        //echo "<br><br>";

                    ?>
                    <td>{{ "$" . $current_price }}</td>
                    <!--insert current value-->
                    <?php
                        $cur_val_fac_one = $stock->shares;
                        $cur_val_fac_two = $current_price;
                        $cur_val = $cur_val_fac_one*$cur_val_fac_two;
                        $tot_stock_cur=$tot_stock_cur+$cur_val;
                    ?>
                    <td>{{ "$" . $cur_val }}</td>
                </tr>

            @endforeach

            </tbody>
        </table>
        Total of Initial Stock Portfolio {{ "$" . $tot_stock_old }} </br>
        Total of Current Stock Portfolio {{ "$" . $tot_stock_cur }} </br>
        </br><br>
    </div>





















    <?php
    $stockprice=null;
    $stotal = 0;
    $svalue=0;
    $itotal = 0;
    $ivalue=0;
    $iportfolio = 0;
    $cportfolio = 0;

    $tot_investment_old=0;
    $tot_investment_cur=0;
    ?>
    <br>
    <h2>Investments </h2>
    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr class="bg-info">
                <th> Category </th>
                <th>Description</th>
                <th>Acquired Value</th>
                <th>Acquired Date</th>
                <th>Recent Value</th>
                <th>Recent Date</th>
            </tr>
            </thead>

            <tbody>




            @foreach($customer->investments as $investment)
                <tr>
                    <td>{{ $investment->category }}</td>
                    <td>{{ $investment->description }}</td>
                    <td>{{ $investment->acquired_value }}</td>
                    <td>{{ $investment->acquired_date }}</td>
                    <td>{{ $investment->recent_value }}</td>
                    <td>{{ $investment->recent_date }}</td>
                    <!--insert original value-->
                </tr>
                <?php
                    $org_val = $investment->acquired_value;
                    $tot_investment_old=$tot_investment_old+$org_val;

                    $cur_val = $investment->recent_value;
                    $tot_investment_cur=$tot_investment_cur+$cur_val;
                ?>
            @endforeach

            </tbody>
        </table>
        Total of Initial Investment Portfolio {{ "$" . $tot_investment_old }} </br>
        Total of Current Investment Portfolio {{ "$" . $tot_investment_cur }} </br>
        </br><br>
    </div>




    <h2>Summary of Portfolio </h2>
    <?php
        $tot_port_old=$tot_stock_old+$tot_investment_old;
        $tot_port_cur=$tot_stock_cur+$tot_investment_cur;
    ?>
    <div class="container">
        Total of Initial Portfolio Value {{ "$" . $tot_port_old }} </br>
        Total of Current Portfolio Value {{ "$" . $tot_port_cur }} </br>
    </div>





@endif
@if(Auth::guest())
    <a class="btn btn-info" href="{{ url('/login') }} ">You need to LOGIN.</a>
@endif
@stop

