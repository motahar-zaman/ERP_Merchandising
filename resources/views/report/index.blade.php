
<!DOCTYPE>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="shortcut icon" href="{{ asset('fav-logo.png') }}">
<title>@yield('title')</title>
<style>
    .header_table{
        width: 100%;
        margin-bottom: 10px;
        background-color: #eee;
    }
    .table{
        width: 100%;
        border:1px solid #999;
        margin-bottom: 10px
    }
    .border-none{
        border:none !important;
    }
    .bold{
        font-weight: bold;
    }
    .border-bottom{
        border-bottom: 1px solid #999;
    }
    .border-bottom-none{
        border-bottom: none !important;
    }
    .text-center{
        text-align: center !important;
    }
    .text-left{
        text-align: left !important;
    }
    .text-left{
        text-align: left !important;
        padding-left: 5px !important;
    }
    .text-right{
        text-align: right  !important;
        padding-right: 5px !important;
    }
    .header_span{
        /* Nueva Std */
        font-size: 28px; font-family:Nueva Std; 
    }

    .th{
        border-bottom: 1px solid #999;border-right: 1px solid #999;
    }
    .td{
        text-align: center;height: 20px;border-right: 1px solid #999;border-bottom: 1px solid #999
    }
    .border-right-none{
        border-right: none !important;
    }
    
    .btn-print{
        background-color:#B80C4D;
        border: #2e6da4;
        color: #fff;
        padding: 8px 12px;
        font-size: 14px;
        font-weight: bold;
        border-radius: 5px;
        text-decoration:none;
        cursor: pointer;
    }

    .signature {
        margin-top: 80px;
        position: relative;
        bottom: 0;
    }
    
    @media print {
      .print-none {
        display: none;
      }
    }
      
</style>

 <style type="text/css">/*! normalize.css v7.0.0 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}body{margin:0}article,aside,footer,header,nav,section{display:block}h1{font-size:2em;margin:.67em 0}figcaption,figure,main{display:block}figure{margin:1em 40px}hr{box-sizing:content-box;height:0;overflow:visible}pre{font-family:monospace,monospace;font-size:1em}a{background-color:transparent;-webkit-text-decoration-skip:objects}abbr[title]{border-bottom:none;text-decoration:underline;text-decoration:underline dotted}b,strong{font-weight:inherit}b,strong{font-weight:bolder}code,kbd,samp{font-family:monospace,monospace;font-size:1em}dfn{font-style:italic}mark{background-color:#ff0;color:#000}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}audio,video{display:inline-block}audio:not([controls]){display:none;height:0}img{border-style:none}svg:not(:root){overflow:hidden}button,input,optgroup,select,textarea{font-family:sans-serif;font-size:100%;line-height:1.15;margin:0}button,input{overflow:visible}button,select{text-transform:none}[type=reset],[type=submit],button,html [type=button]{-webkit-appearance:button}[type=button]::-moz-focus-inner,[type=reset]::-moz-focus-inner,[type=submit]::-moz-focus-inner,button::-moz-focus-inner{border-style:none;padding:0}[type=button]:-moz-focusring,[type=reset]:-moz-focusring,[type=submit]:-moz-focusring,button:-moz-focusring{outline:1px dotted ButtonText}fieldset{padding:.35em .75em .625em}legend{box-sizing:border-box;color:inherit;display:table;max-width:100%;padding:0;white-space:normal}progress{display:inline-block;vertical-align:baseline}textarea{overflow:auto}[type=checkbox],[type=radio]{box-sizing:border-box;padding:0}[type=number]::-webkit-inner-spin-button,[type=number]::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}[type=search]::-webkit-search-cancel-button,[type=search]::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}details,menu{display:block}summary{display:list-item}canvas{display:inline-block}template{display:none}[hidden]{display:none}/*# sourceMappingURL=normalize.min.css.map */ 

@page { margin: 10 }


body { margin: 0 }
.sheet {
  margin: 0;
  overflow: hidden;
  position: relative;
  box-sizing: border-box;
  page-break-after: always;
}

/** Paper sizes **/
body.A3               .sheet { width: 297mm; height: 419mm }
body.A3.landscape     .sheet { width: 420mm; height: 296mm }
body.A4               .sheet { width: 210mm; height: 296mm }
body.A4.landscape     .sheet { width: 297mm; height: 209mm }
body.A5               .sheet { width: 148mm; height: 209mm }
body.A5.landscape     .sheet { width: 210mm; height: 147mm }
body.letter           .sheet { width: 216mm; height: 279mm }
body.letter.landscape .sheet { width: 280mm; height: 215mm }
body.legal            .sheet { width: 216mm; height: 356mm }
body.legal.landscape  .sheet { width: 357mm; height: 215mm }

/** Padding area **/
.sheet.padding-10mm { padding: 10mm }
.sheet.padding-15mm { padding: 15mm }
.sheet.padding-20mm { padding: 20mm }
.sheet.padding-25mm { padding: 25mm }

/** For screen preview **/
@media screen {
  body { background: white }
  .sheet {
    background: white;
    box-shadow: 0 .5mm 2mm rgba(0,0,0,.3);
    margin: 5mm auto;
  }
}

/** Fix for Chrome issue #273306 **/
@media print {
  body.A3.landscape { width: 420mm }
  body.A3, body.A4.landscape { width: 297mm }
  body.A4, body.A5.landscape { width: 210mm }
  body.A5                    { width: 148mm }
  body.letter, body.legal    { width: 216mm }
  body.letter.landscape      { width: 280mm }
  body.legal.landscape       { width: 357mm }
}


</style>
  <style type="text/css">
    /*Arial*/
    /*Courier New*/
    body { font-family: Arial, ‘Times New Roman’, serif; }
    .clear{width: 100; display: block; clear: both; height: 1px;}
   .threecol{width: 25%; float: left; }
   .twocol{width: 50%; float: left;  }
   #t3{background-color: #000; border:1px solid black; box-sizing: border-box; color: #fff; min-height: 20px; margin-top: 5pt; margin-bottom: 3pt; font-size: 10pt; line-height: 15pt;}
   #t4{border:1px solid black; box-sizing: border-box; min-height: 20px; margin-top: 5pt; margin-bottom: 3pt; font-size: 10pt; line-height: 15pt;  }
   #t3 strong{padding: 5pt; } 
   #t4 strong{padding: 5pt ;  }

   #docname h3 { font-size: 14pt; line-height: 16pt; font-style: italic; text-align: right; margin: 0;  }
   #companyname h3{ font-size: 14pt; line-height: 16pt;  margin: 0; margin-top: 4pt; }
   #companydetails{ font-size: 8pt; }
   #note { font-size: 8pt; }

   @page { }



  </style>


</head>

<body class="A4.landscape">

  @yield('content')

</body>

</html>
