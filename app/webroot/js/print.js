function printData(sourceId){
    var prtHead = '<html>\n\
                    <head><style>@page{size:auto;margin:0mm;}\n\
                    html{margin:20px;padding:0px;}body{margin:20px;padding:0px;}\n\
                    fieldset{border:0px dotted silver;}\n\
                    table{width:100%;font-family:Segoe UI;}td{font-size:12px;}\n\
                    table.list{border-left:1px dotted black;border-top:1px dotted black;}\n\
                    table.list th{font-size:13px;font-weight:bold;}\n\
                    table.list td,table.list th{border-right:1px dotted black;border-bottom:1px dotted black;}\n\
                    td.value{border-bottom:1px dotted black;font-weight:bold;}\n\
                    table.prtlist{border-top:1px dotted silver;border-left:1px dotted silver;} \n\
                    table.prtlist td{border-bottom:1px dotted silver;border-right:1px dotted silver;} .noprint{display:none;}</style>\n\
                    </head>\n\
                    <body style="font:11px Segoe UI">';
    var con = document.getElementById(sourceId).innerHTML;
    var prtFoot = '</body></html>';
    var w = window.open();
    w.document.write(prtHead+con+prtFoot);
    w.print();
    w.close();
}