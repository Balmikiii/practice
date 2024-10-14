let search = document.querySelector("#search");
let update_form = document.querySelector(".update_form");
let editbtn = document.querySelector(".editbtn");
let pagination = document.querySelector(".pagination");
let first_data = document.querySelector(".first_data");
let show_data_search = document.querySelector(".show_data_search");
let table = document.getElementsByTagName("table");

function showdatas(str) {
    if (str.length == 0) {
      table[1].style.display = "none";
      first_data.style.display = "block";
      // window.location.reload();
      window.location.assign("index.php");
      return;
    } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementsByClassName("search")[0].innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET", "assets/module/show_datas.php?q=" + str, true);
      xmlhttp.send();
      table[0].style.display = "none";
      pagination.style.display = "none";
      show_data_search.style.display = "none";
    }
}

function formshow(str) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    update_form.style.display = "block";
    if (this.readyState == 4 && this.status == 200) {
      document.getElementsByClassName("update_form")[0].innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET", "assets/module/form.php?id="+str, true);
  xmlhttp.send(); 

}

function delete_func(str) {
  var result = confirm("Are you sure to delete data ?");
  if (result == true) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementsByClassName("update_form").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "assets/module/del.php?id="+str, true);
    xmlhttp.send(); 
    location.reload();
  }
}
function form_btn_close(){
  update_form.style.display= "none";
}