$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });
});

function funct_all(type){
  // type =1 => select all|| type =0 => deselect all
  var a = document.getElementsByClassName('tb-row');
  
  for(var i =0; i<a.length; i ++) {
    var b = a[i].cells[0];
    if(type == 1){
      b.firstElementChild.checked = true;
      a[i].style.backgroundColor = "#1e90ff";
    } else {
      b.firstElementChild.checked = false;
      a[i].style.backgroundColor = null;
    }
  }  
}

function sort_name(col, table_name){
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById(table_name);
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
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}
document.getElementById("th-name").addEventListener("click", function(){
    sort_name("0","dtOrderExample");
});
document.getElementById("th-mail").addEventListener("click", function(){
    sort_name("1","dtOrderExample");
});
document.getElementById("th-office").addEventListener("click", function(){
    sort_name("2","dtOrderExample");
});

 





