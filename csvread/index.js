let search = document.querySelector("#search");
let datas = document.querySelector(".datas");
let tables_data = document.querySelector(".tables_data");
let filbut = document.querySelector("#filbut");
let alerts = document.querySelector("#alerttt");
let lastarea = document.querySelector(".lastarea");
let seab = document.querySelector(".serch");
let tab = document.querySelector("#tab");
let tabb = document.querySelector("#tabb");
let highlight_text = document.querySelector(".highlight_text");
let withname = document.querySelector(".withname");
let texthint = document.getElementById("txtHint");
let editbtn = document.getElementById("editbtn");
let table = document.getElementsByTagName("table");
let display_form = document.getElementById("display_form");
let form = document.querySelectorAll(".form");

function showHint(str) {
  if (str.length == 0) {
    texthint.innerHTML = "";
    datas.style.display = "block";
    tables_data.style.display = "block";
    lastarea.style.display = "none";
    alerts.innerHTML = "Page No. = 0";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "b.php?q=" + str, true);
    xmlhttp.send();
    lastarea.style.display = "none";
    datas.style.display = "none";
    alerts.innerHTML = "Page No. = 0";  
  }
}


function formshow(str) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("display_form").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET", "edit.php?id=" + str, true);
  xmlhttp.send(); 
  display_form.style.display= "block";
}

search.addEventListener("change", ()=>{
  datas.style.display = "none";
});

function form_btn_close(){
  display_form.style.display= "none";
}

function delete_func(str){
  var result = confirm("Are you sure to delete data ?");
  if (result == true) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("display_form").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "delete.php?id=" + str, true);
    xmlhttp.send();
    datas.style.display = "none";
    
  } 
}





