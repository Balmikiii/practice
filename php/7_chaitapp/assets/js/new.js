let chat_header = document.getElementsByClassName("chat-header")[0];
let chat_history = document.getElementsByClassName("chait_box_chiting")[0];

let receiver = '';

function chat_headerf(str) {
  receiver = str;
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      chat_header.innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET", "box_head.php?id=" + str, true);
  xmlhttp.send();
  chat(str);
}


function chat(str) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      chat_history.innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET", "box.php?receiver_id=" + str, true);
  xmlhttp.send();
}

// [[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[[// chat_load
var interval_condition = true;
var load = setInterval(chat_loder,1000);
function chat_loder(){
  if(interval_condition){
    chat(receiver);
  }
}

chat_history.addEventListener("wheel", function(){
  if (chat_history.scrollTop == 0) {
    interval_condition = false;
  }else{
    interval_condition = true;
  }
});

// chat_load end ]]]]]]]]]]]]]]]]]]]]]]


function people_list(str) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementsByClassName("chat-list")[0].innerHTML = this.responseText;
    }
  };
  if (str.length == 0) {
    xmlhttp.open("GET", "assets/module/chat_list_people.php", true);
  } else {
    xmlhttp.open("GET", "assets/module/chat_list_people.php?q=" + str, true);
  }
  xmlhttp.send();
}

function chat_open(str) {
  receiver = str;
  chat_headerf(str);
  chat(str);
}

// image upload
let file = '';
function filee(){
  file = document.querySelector("#file");
  file.addEventListener("change", function(){
    document.querySelector(".chat-header #form button").classList.remove("d-none");
  });
}
setTimeout(filee,100);



// camera head box 

