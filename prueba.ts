$('#example').dataTable( {<font></font>
  "columnDefs": [ {<font></font>
    "targets": 0,<font></font>
    "data": function ( row, type, val, meta ) {<font></font>
      if (type === 'set') {<font></font>
        row.price = val;<font></font>
        // Store the computed display and filter values for efficiency<font></font>
        row.price_display = val=="" ? "" : "$"+numberFormat(val);<font></font>
        row.price_filter  = val=="" ? "" : "$"+numberFormat(val)+" "+val;<font></font>
        return;<font></font>
      }<font></font>
      else if (type === 'display') {<font></font>
        return row.price_display;<font></font>
      }<font></font>
      else if (type === 'filter') {<font></font>
        return row.price_filter;<font></font>
      }<font></font>
      // 'sort', 'type' and undefined all just use the integer<font></font>
      return row.price;<font></font>
    }<font></font>
  } ]<font></font>
} )