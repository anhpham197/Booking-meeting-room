// dùng ở file inforRoom.html và roomList.html tại nút chọn tất cả 
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
// num là để chọn chiều lọc data
var num = 1;
// sort data
// sort cho dạng string
function sort_row_string(col, table_name){
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById(table_name);
  switching = true;
  num *=-1;
  while (switching) {
   
    switching = false;
    rows = table.rows;
   
    for (i = 1; i < (rows.length - 1); i++) {
     
      shouldSwitch = false;
      
      x = rows[i].getElementsByTagName("TD")[col];
      y = rows[i + 1].getElementsByTagName("TD")[col];
      
      if(num == -1) {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          shouldSwitch = true;
          break;
        }
      } else {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}

// sort cho dạng int
function sort_row_int(col, table_name){
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById(table_name);
  switching = true;
  num *=-1;
  while (switching) {
   
    switching = false;
    rows = table.rows;
   
    for (i = 1; i < (rows.length - 1); i++) {
     
      shouldSwitch = false;
      
      x = rows[i].getElementsByTagName("TD")[col];
      y = rows[i + 1].getElementsByTagName("TD")[col];
      
      if(num == -1) {
        if (parseInt(x.innerHTML) > parseInt(y.innerHTML)) {
          shouldSwitch = true;
          break;
        }
      } else {
        if (parseInt(x.innerHTML) < parseInt(y.innerHTML)) {
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}

// vẫn là sort nhưng mà dùng cho bảng có tbodies
function sort_data(col, table_name){
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById(table_name);
  switching = true;
  num *=-1;
  while (switching) {
   
    switching = false;
    rows = table.tBodies;
   
    for (i = 0; i < (rows.length - 1); i++) {
     
      shouldSwitch = false;
      
      x = rows[i].getElementsByTagName("TD")[col];
      y = rows[i + 1].getElementsByTagName("TD")[col];
      
      if(num == -1) {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          shouldSwitch = true;
          break;
        }
      } else {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          shouldSwitch = true;
          break;
        }
      }
      
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}
document.getElementById("th-id").addEventListener("click", function(){
  sort_data("0","dtOrderExample");
});
document.getElementById("th-name").addEventListener("click", function(){
    sort_data("1","dtOrderExample");
});

 





