let search = document.querySelector("#search");
let showup = document.querySelector("#showup");
let update_form = document.querySelector(".update_form");
let alerttt = document.querySelector("#alerttt");
let btnlight = document.querySelector(".btnlight");


// datasa show 
if (search.value == '') {
  if(alerttt.innerHTML == 0){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("showup").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "assets/module/all_datas.php", true);
    xmlhttp.send();
    document.getElementById("all_data_show").style.display = "none";
  }else{
    document.getElementById("all_data_show").style.display = "block";
  }
}


// after search data show 
function showdatas(str,str2) {
  if (str.length == 0) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("showup").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "assets/module/all_datas.php", true);
    xmlhttp.send();
    alerttt.innerHTML = "1";
  } else { 
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("showup").innerHTML = this.responseText;
      }
    };
    // xmlhttp.open("GET", "assets/module/ajax_search.php?search=" + str +"&pages=" + str2, true);

    xmlhttp.open("GET", "assets/module/ajax_search.php?search=" + str +"&pages=0", true);
    // xmlhttp.open("GET", "assets/module/ajax_search.php?search=" + str +"&pages=" + pages, true);
    xmlhttp.send();
    document.getElementById("showup").style.display = "block";
    document.getElementById("all_data_show").style.display = "none";
    
  }
}
// after search data show 
function showdatass(str,str2) {
  if (str.length == 0) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("showup").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "assets/module/all_datas.php?pages="+str2, true);
    xmlhttp.send();
  } else { 
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("showup").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "assets/module/ajax_search.php?search=" + str +"&pages=" + str2, true);

    // xmlhttp.open("GET", "assets/module/ajax_search.php?search=" + str +"&pages=0", true);
    // xmlhttp.open("GET", "assets/module/ajax_search.php?search=" + str +"&pages=" + pages, true);
    xmlhttp.send();
    document.getElementById("showup").style.display = "block";
    document.getElementById("all_data_show").style.display = "none";
    alerttt.innerHTML = str2+1;
  }
}

// form show 
function formshow(str,page) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("form").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET", "assets/module/form.php?id="+str+"&pages="+page, true);
  xmlhttp.send(); 
  document.getElementById("form").style.display = "block";

}
function delete_func(str,pages,search){
// function delete_func(str,pages){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("delete").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET", "assets/module/del.php?id="+str, true);
  xmlhttp.send(); 
  document.getElementById("all_data_show").style.display = "none";
  showdatass(search,pages);
}

// close form 
function form_btn_close(){
  document.getElementById("form").style.display = "none";
  
}


