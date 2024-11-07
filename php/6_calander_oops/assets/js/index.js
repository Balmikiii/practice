let show_table = document.querySelector(".show_table");
let btn_click = document.querySelector(".btn_click");
let month = document.querySelector(".month");
let week = document.querySelector(".week");
let events_form = document.querySelector(".events-form");

const days_list = [];
let newarry = [];
var table = '';
var td = '';
div = '';
p = '';
var isToggling = false;

const header_month = ["January","February","March","April","May","June","July","August","September","October","November","December"];
const small_month = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
const d = new Date();
let str = d.getMonth();
let countyear = d.getFullYear();
let day = d.getDate(); 


/**weeks pages pages */
function weeks_page(){
    var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            show_table.innerHTML = this.responseText;
        }
      };
    xmlhttp.open("GET", "assets/module/week.php", true);      
    xmlhttp.send();
    month.style.display = 'none';
    week.style.display = 'block';
    document.getElementById('header-details').innerHTML = small_month[str] + " "+ (d.getDate()-d.getDay()) +" - "+ (d.getDate()-d.getDay()+6) +" " +",";
    document.getElementById('hearder_yers').innerHTML = countyear;
  }

  /**month pages */
function month_page(){
    var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            show_table.innerHTML = this.responseText;
        }
      };
    xmlhttp.open("GET", "assets/module/month.php?month="+(str+1)+"&year="+countyear, true);     
    xmlhttp.send();
    month.style.display = 'block';
    week.style.display = 'none';
    document.getElementById('header-details').innerHTML = header_month[str];
    document.getElementById('hearder_yers').innerHTML = countyear;
    setTimeout(selectable_td, 1000);
    
  }


// page move ***********************************************************************************
 
  function move_button(){
    if (str>10){
      str =  0 ;
      countyear = countyear + 1;
    }else{
      str = str + 1 ;
    }
    month_page();
    }

    function move_back_button(){
      if (str<1){
        str =  11 ;
        countyear = countyear - 1;
      }else{
        str = str - 1 ;
      }
      month_page();
      }
//************************page move end */

val = day;
function week_button(){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      show_table.innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET", "assets/module/week.php?page="+val, true);      
  xmlhttp.send();
  document.getElementById('header-details').innerHTML = header_month[str];
  document.getElementById('hearder_yers').innerHTML = countyear;
  val +=7;
}
function event_add(year,month,date){

  events_form.style.display = "block";
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      events_form.innerHTML = this.responseText;
    }
  };
  if(newarry.length != days_list.length){
    if (days_list.length>1){
      xmlhttp.open("GET", "assets/module/add_event.php?year="+year+"&month="+month+"&date="+days_list, true);      
    }else{ 
      xmlhttp.open("GET", "assets/module/add_event.php?year="+year+"&month="+month+"&date="+date, true);      
    }
  }else{
    xmlhttp.open("GET", "assets/module/add_event.php?year="+year+"&month="+month+"&date="+newarry, true);
  }
  xmlhttp.send();
}
function close_button(){
  events_form.style.display = "none";
}




// selectable td 
function enableToggle(e) {
  isToggling = true;

  if (e.target !== table) {
      toggle(e);
  }
}


function disableToggle() {
  isToggling = false;


  days_list.sort();
  for(i=0;i<days_list.length;i++){
    if((days_list[i+1])-(days_list[i])==1){
      newarry.push(days_list[i]);
    }else if(days_list[i]-days_list[i - 1]==1){
      newarry.push(days_list[i]);
    }else{
      break;
    }
  }
  let activeclass = document.getElementsByClassName("active");
  width = newarry.length * (11.6) ; 
  if(document.getElementsByClassName("active")[0].childNodes[1] != undefined){
    const node = document.createElement("p");
    const textnode = document.createTextNode(document.getElementsByClassName("active")[0].childNodes[1].innerHTML);
    
    node.appendChild(textnode);
    node.style.cssText = "width: "+ width +"%; position: absolute; background : red";
    activeclass[0].appendChild(node);
  }
  

  event_add(countyear,str+1,day);
}

function toggle(e) {
  if (isToggling === false) {
      return;
  }
  e.target.classList.toggle('active');
  if (e.target.classList == 'active'){
    days_list.push(e.target.children[0].innerHTML);
  }
  if (e.target.classList != 'active'){
    days_list.pop(e.target.children[0].innerHTML);
  }
}

function selectable_td() {
  table  = document.getElementById("table-select");
  td  = table.getElementsByTagName('td');
  div  = table.getElementsByTagName('div');
  p  = table.getElementsByTagName('p');
  table.onmousedown = enableToggle;
  for (var i = 0, il = td.length; i < il; i++) {
      td[i].onmouseenter = toggle; //changes color 
  }
  table.onmouseup = disableToggle;

  var count_repeat_valua = 1;
  for(var j=0; j<td.length; j++){
    if((td[j].childNodes[1])!=undefined){
      if((td[j-1].childNodes[1])!=undefined){
        if(td[j].childNodes[1].innerText == td[j-1].childNodes[1].innerText){
          if(count_repeat_valua <= 1){
            console.log(td[j-1].childNodes[1].innerText);
            console.log(td[j-1].innerHTML)
            count_repeat_valua += 1 ;
          }else{
            count_repeat_valua = 1;
          }
          continue;
        }
      }
    }
  }
}





// drag and drop functions

function allowDrop(ev) {
  ev.preventDefault();
}
function drag(ev) {
  ev.dataTransfer.setData("text", ev.target.id);
  // document.querySelectorAll("td p").style.display = "block";
  
}
function drop(ev) {
  ev.preventDefault();
  var data = ev.dataTransfer.getData("text");
  document.getElementById("drag3").style.cssText = "width: 23%; position: absolute";
  ev.target.appendChild(document.getElementById(data));

  console.log(ev.target.children[0].innerHTML);
  ev.target.children[1].style.display = "none";
}

