@extends('layouts.print')

@section('title', 'Invoice detail')

@section('content')



    <style>
        html, body {
            font-family: 'DejaVu Sans', sans-serif;
            font-weight: 400;
            font-size:14px;
            background: #fff;
            color: #000;
        }
        h1{
            font-size: 12px;
            padding: 9px 0;
            margin:  0 0 0 0;
            border-top:1px solid black;
            border-bottom:1px solid black;
        }
        .mainTable.last{
            margin-top: 60px;
        }
        .mainTable, .itemsTable{
            width: 100%;
            vertical-align: top;
        }
        .mainTable td.main{
            width: 50%;
        }
        .itemsTable{
            margin-top: 32px;
        }
        .itemsTable td {
            padding: 6px;
            border-bottom: 1px solid black;
        }
        .itemsTable tfoot, .itemsTable thead{
            font-weight: 700;
        }
        td.price{
            width: 20%;
            text-align: right;
        }
        td.name{
            text-align: left;
            width: 80%;
        }
    </style>

    <h1>Faktúra č. {{$invoices->code}}</h1>
    <table class="mainTable">
        <tr>
            <td class="main">
                <h2>Dodávateľ:</h2>
                    Roman Balogh<br>
                Vlastenecké námestie 10<br>
                85101 Bratislava<br><br>
                IČO: 47099054<br>
                DIČ: 1083548202
                <br><br>
                <table >
                    <tr>
                        <td>
                            Peňažný ústav:
                        </td>
                        <td>
                            mBank
                        </td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td>
                            IBAN:
                        </td>
                        <td>
                            SK28 8360 5207 0042 0551 0424
                        </td>
                    </tr>
                </table>
            </td>
            <td class="main">
                <h2>Odberateľ</h2>
                {{$invoices->nameCustomer}}<br>
                {{$invoices->street}}<br>
                {{$invoices->city}}, {{$invoices->zip}}<br>
                {{$invoices->state}}<br>
                <br><br>
                <table>
                    <tr>
                        <td>Variabilný symbol: </td>
                        <td>{{$invoices->code}}</td>
                    </tr>
                    <tr>
                        <td>Konštatný symbol: </td>
                        <td>{{$invoices->symbol}}</td>
                    </tr>
                    <tr>
                        <td>Dátum vystavenia: </td>
                        <td>{{$invoices->date_of_invoicing}}</td>
                    </tr>
                    <tr>
                        <td>Dátum splatnosti: </td>
                        <td>{{$invoices->due_date}}</td>
                    </tr>
                    <tr>
                        <td>Spôsob úhrady: </td>
                        <td>prevodným príkazom</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>


    <table class="itemsTable">
        <thead>
        <tr>
            <td class="name">Názov služby</td>

            <td>Cena</td>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="name">

                @foreach ($items as $value)
                    {{$value}} <br>
                @endforeach

            </td>

            <td class="price">
                @foreach ($price as $value)
                {{$value}} &euro; <br>
                @endforeach
                </td>
        </tr>
        </tbody>
        <tfoot>
        <tr>
            <td class="name">K úhrade celkom</td>

            <td class="price">{{$priceSum}} &euro;</td>
        </tr>
        </tfoot>
    </table>
    <p>
    Nie som platca DPH.
    </p>
    <table class="mainTable last">
        <tr>
            <td class="main">
                Faktúru vystavil: Roman Balogh
            </td>
            <td class="main">
                Podpis
            </td>
        </tr>
    </table>







    @endsection