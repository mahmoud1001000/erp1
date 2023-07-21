<style>

    @page {
        margin: 10px !important;
    }

    body {

        justify-content: center;
        padding: 1px !important;
        margin: 0 !important;
        width: 100% !important;
    }

    .container {
        padding: 0 !important
    }

    #company {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #invoice-num {
        margin-top: 4px;
    }

    #invoice-num>div {
        text-align: center
    }

    #datetime {
        margin-top: 0px;
        display: flex;
    }

    #datetime>div {
        /* text-align: center; */
        padding: 0 2px;
    }

    #datetime {
        margin: 6px 0;
    }

    .items-table {
        margin-top: 10px;
    }

    .items-table table th,
    .items-table table td {
        padding: 4px;
        text-align: center;
    }

    #totals {
        display: flex;
        margin-top: 10px;
        direction: rtl;
    }

    #totals>div:nth-of-type(2) {
        width: 100%;
        margin-inline-start: 4px;
        padding-inline-start: 4px;
        border-right: 1px solid rgba(146, 146, 146, 0.152);
    }

    #totals>div>div {
        padding: 4px;
    }

    #totals div {
        /* white-space: nowrap; */
    }

    #totals>div:nth-of-type(1) table {
        white-space: nowrap;
    }

    #totals>div:nth-of-type(2)>tr>td:nth-of-type(2) {
        width: 100%;
    }


    #totals>div:nth-of-type(2) table tr td:nth-of-type(2) {
        white-space: nowrap;
    }

    #total_row>td {
        padding-top: 5px;
    }

    #total_row>td>div {
        border-top: 1px dotted rgba(146, 146, 146, 0.152);
        padding-top: 5px !important;
    }

    #top-table {
        /* margin-bottom: 10px; */
    }

    table {
        width: 100%;
    }
    #logo-wrapper {
        width: 100%;
        text-align: center;
        margin: 10px auto;
    }

    #logo-wrapper img {
        max-height: 60px;
    }

    .text-center {
        text-align: center;
    }

    .ticket {
        width: 98%;
        max-width: 98%;
        margin-left: 6px;
        font-weight: 800;
        color: black;

    }


    #header-text {
        padding-top: 10px;
    }



    #installmentTable {
        font-size: 24px;
        margin: 15px 0 !important;
    }

    #installment_calculations tr>td:nth-of-type(1) {
        padding-inline-end: 10px;

    }

    #installmentTable td {
        font-size: 20px;
    }

    #gurantor-receipt {
        width: calc(100% - 100px);
        margin: auto;
    }

    #gurantor-receipt h1 {
        text-align: center;
    }

    #gurantor-receipt p {
        font-size: 20px;
    }

    #commodity-sale-statement p,
    #commodity-sale-statement div {
        font-size: 20px;
    }
    .f-8 {
        font-size: 8px !important;
    }
    @media print {
        * {
            font-size: 12px;
            font-family: 'Times New Roman';
            word-break: break-all;
        }
        .f-8 {
            font-size: 8px !important;
        }

        .headings{
            font-size: 16px;
            font-weight: 700;
            text-transform: uppercase;
            white-space: nowrap;
        }

        .sub-headings{
            font-size: 15px !important;
            font-weight: 700 !important;
        }

        .border-top{
            border-top: 1px solid #242424;
        }
        .border-bottom{
            border-bottom: 1px solid #242424;
        }

        .border-bottom-dotted{
            border-bottom: 1px dotted darkgray;
        }

        td.serial_number, th.serial_number{
            width: 5%;
            max-width: 5%;
        }

        td.description,
        th.description {
            width: 35%;
            max-width: 35%;
        }

        td.quantity,
        th.quantity {
            width: 15%;
            max-width: 15%;
            word-break: break-all;
        }
        td.unit_price, th.unit_price{
            width: 25%;
            max-width: 25%;
            word-break: break-all;
        }

        td.price,
        th.price {
            width: 20%;
            max-width: 20%;
            word-break: break-all;
        }

        .centered {
            text-align: center;
            align-content: center;
        }

        .ticket {
            width: 100%;
            max-width: 100%;
        }

        img {
            max-width: inherit;
            width: auto;
        }

        .hidden-print,
        .hidden-print * {
            display: none !important;
        }
    }
    .table-info {
        width: 100%;
    }
    .table-info tr:first-child td, .table-info tr:first-child th {
        padding-top: 8px;
    }
    .table-info th {
        text-align: left;
    }
    .table-info td {
        text-align: right;
    }
    .logo {
        float: left;
        width:35%;
        padding: 10px;
    }

    .text-with-image {
        float: left;
        width:65%;
    }
    .text-box {
        width: 100%;
        height: auto;
    }

    .textbox-info {
        clear: both;
    }
    .textbox-info p {
        margin-bottom: 0px
    }
    .flex-box {
        display: flex;
        width: 100%;
    }
    .flex-box p {
        width: 50%;
        margin-bottom: 0px;
        white-space: nowrap;
    }

    .table-f-12 th, .table-f-12 td {
        font-size: 12px;
        word-break: break-word;
    }

    .bw {
        word-break: break-word;
    }

    .text-right{
        text-align: left;
    }

</style>