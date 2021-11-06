$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });
});

function sort_name(col){
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("dtOrderExample");
  switching = true;
  
  while (switching) {
   
    switching = false;
    rows = table.rows;
   
    for (i = 1; i < (rows.length - 1); i++) {
     
      shouldSwitch = false;
      
      x = rows[i].getElementsByTagName("TD")[col];
      y = rows[i + 1].getElementsByTagName("TD")[col];
      
      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
       
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}
document.getElementById("th-name").addEventListener("click", function(){
    sort_name("0");
});
document.getElementById("th-mail").addEventListener("click", function(){
    sort_name("1");
});
document.getElementById("th-office").addEventListener("click", function(){
    sort_name("2");
});