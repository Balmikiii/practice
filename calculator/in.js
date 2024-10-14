document.getElementById("equalto").addEventListener("click", additioin);
add = document.querySelector(".addd");
sub = document.querySelector(".sub");
mul = document.querySelector(".mul");
divisi = document.querySelector(".divisi");
pointst = document.querySelector(".point");
zero = document.querySelector(".zero");
bac = document.querySelector(".bac");
dis = document.querySelector("#dis");
disd = document.querySelector("#disd");
let input = document.querySelectorAll("input");

add.addEventListener("click", addd);
sub.addEventListener("click", subb);
mul.addEventListener("click", mull);
divisi.addEventListener("click", divisii);
pointst.addEventListener("click", points);
bac.addEventListener("click", back);
zero.addEventListener("click", zeros);

let isstart =1;
let pointval = 0;
operator = "";
numbvalu = "";
function addd(){
    values = dis.value;
    // temval = disd.value + values
    // disd.value = eval(temval)+"+";
    let check_lenght = values.toString().length; //lenght checking
    let tostring_conevert = String(values); //convert to string for last sybol
    let lastvalu = (tostring_conevert[check_lenght-1]); // last value get
    if(lastvalu != "+"){
        dis.value += "+";
    }
    if((dis.value == "+") ||(dis.value == "0+")){
        disd.value = "0+";
        dis.value = "0";
    }
    if ((lastvalu == "-")||(lastvalu == "*")||(lastvalu == "/")){
        let poplat = values.slice(0, -1);
        dis.value = poplat;
        dis.value += "+";
    }
    if(lastvalu=="."){
        let poplat = values.slice(0, -1);
        dis.value = poplat;
        dis.value += "+";
    }
    
    isstart = 1;
    pointval = 0;
}
function subb(){
    values = dis.value;
    let check_lenght = values.toString().length; //lenght checking
    let tostring_conevert = String(values); //convert to string for last sybol
    let lastvalu = (tostring_conevert[check_lenght-1]); // last value get
    if(lastvalu != "-"){
        dis.value += "-";
    }
    if((dis.value == "-") ||(dis.value == "0-")){
        disd.value = "0-";
        dis.value = "0";
    }
    if ((lastvalu == "+")||(lastvalu == "*")||(lastvalu == "/")){
        let poplat = values.slice(0, -1);
        dis.value = poplat;
        dis.value += "-";
    }
    if(lastvalu=="."){
        let poplat = values.slice(0, -1);
        dis.value = poplat;
        dis.value += "-";
    }
    isstart = 1;
    pointval = 0 ;
}
function mull(){
    values = dis.value;
    let check_lenght = values.toString().length; //lenght checking
    let tostring_conevert = String(values); //convert to string for last sybol
    let lastvalu = (tostring_conevert[check_lenght-1]); // last value get
    if(lastvalu != "*"){
        dis.value += "*";
    }
    if((dis.value == "*") ||(dis.value == "0*")){
        dis.value = "0";
        disd.value = "0*";
    }
    if ((lastvalu == "-")||(lastvalu == "+")||(lastvalu == "/")){
        let poplat = values.slice(0, -1);
        dis.value = poplat;
        dis.value += "*";
    }
    if(lastvalu=="."){
        let poplat = values.slice(0, -1);
        dis.value = poplat;
        dis.value += dis.value;
    }
    isstart = 1;
    pointval = 0 ;
}
function divisii(){
    values = dis.value;
    let check_lenght = values.toString().length; //lenght checking
    let tostring_conevert = String(values); //convert to string for last sybol
    let lastvalu = (tostring_conevert[check_lenght-1]); // last value get
    if(lastvalu != "/"){
        dis.value += "/";
    }
    if((dis.value == "/") ||(dis.value == "0/")){
        dis.value = "0";
        disd.value = "0/";
    }
    if ((lastvalu == "-")||(lastvalu == "*")||(lastvalu == "+")){
        let poplat = values.slice(0, -1);
        dis.value = poplat;
        dis.value += "/";
    }
    if(lastvalu=="."){
        let poplat = values.slice(0, -1);
        dis.value = poplat;
        dis.value += "/";
    }
    isstart = 1;
    pointval = 0 ;
}

function points(){
    values = dis.value;
    let check_lenght = values.toString().length; //lenght checking
    let tostring_conevert = String(values); //convert to string for last sybol
    let lastvalu = (tostring_conevert[check_lenght-1]); // last value get
    if(lastvalu != "."){
        if (pointval==0){
            dis.value += ".";
            pointval = 1;
        };
    }
    if((dis.value == ".")||(lastvalu=="/")||(lastvalu=="+")||(lastvalu=="*")||(lastvalu=="-")){
        if ((dis.value.endsWith("*."))||(dis.value.endsWith("/."))||(dis.value.endsWith("+."))||dis.value.endsWith("-.")){
            dis.value = values+"0.";
        }else{
            dis.value = "0.";
        }
    }
    if (isstart==0){
        dis.value = "0.";
    }
    isstart = 1;
    
}
function zeros(){
    values = dis.value;
    if(dis.value != "0"){
        dis.value += "0";
    }else{
        dis.value = "0";
    }
    if (isstart==0){
        dis.value = "0";
    }

    isstart = 1;
}
function back(){
    values = dis.value;
    let check_lenght = values.toString().length; //lenght checking
    let tostring_conevert = String(values); //convert to string for last sybol
    let lastvalu = (tostring_conevert[check_lenght-1]); // last value get
    if ((lastvalu==".") && (pointval==1)){
        pointval = 0;
    }
    let poplat = values.slice(0, -1);
    dis.value = poplat;
    isstart = 1;

}
function additioin() {
    if ((disd.value.startsWith("0-"))||(disd.value.startsWith("0+"))||(disd.value.startsWith("0-"))||(disd.value.startsWith("0-"))){
        calculate = eval(disd.value+dis.value);
        dis.value = calculate;
    }
    let values = dis.value;
    checking =(eval(values));
    if(eval(values)==checking){

    }
    console.log(checking);
    console.log(eval(values));
    console.log(operator);
    console.log(numbvalu);

    disd.value = values;
    let check_lenght = values.toString().length; //lenght checking
    let tostring_conevert = String(values); //convert to string for last sybol
    let lastvalu = (tostring_conevert[check_lenght-1]); // last value get
    let lastvalua = (tostring_conevert[check_lenght-2]); // last value get

    if ((lastvalu=="0") && (lastvalua=="/")){
        let poplat = values.slice(0, -1);
        dis.value = poplat;
        dis.value = "Cannot divide by zero";
    }else{
        let calculate = eval(values);
        if ((calculate%1)!=0){
            let fixed_number = calculate.toFixed(4);
            dis.value = fixed_number;
        }else{
            dis.value = calculate;
        }
    }
    pointval = 0 ;
    isstart = 0;
}
input[0].addEventListener('click', () =>{
    values = dis.value;
    check_lenght = values.toString().length; //lenght checking
    tostring_conevert = String(values); //convert to string for last sybol
    lastvalu = (tostring_conevert[check_lenght-1]); // last value get
    if ((dis.value.endsWith("zero"+lastvalu))||(values.startsWith("0"))||(isstart==0)){
        if(values.startsWith("0.")){
            if(check_lenght>2){
                dis.value = dis.value;
            }else{
                dis.value = "0.7";
            }
        }else{
            dis.value = input[0].value;
        }
    }
    isstart = 1;
    
});
input[1].addEventListener('click', () =>{
    values = dis.value;
    check_lenght = values.toString().length; //lenght checking
    tostring_conevert = String(values); //convert to string for last sybol
    lastvalu = (tostring_conevert[check_lenght-1]); // last value get
    if ((dis.value.endsWith("zero"+lastvalu))||(values.startsWith("0"))||(isstart==0)){
        if(values.startsWith("0.")){
            if(check_lenght>2){
                dis.value = dis.value;
            }else{
                dis.value = "0.8";
            }
        }else{
            dis.value = input[1].value;
        }
    }
    isstart = 1;
});
input[2].addEventListener('click', () =>{
    values = dis.value;
    check_lenght = values.toString().length; //lenght checking
    tostring_conevert = String(values); //convert to string for last sybol
    lastvalu = (tostring_conevert[check_lenght-1]); // last value get
    if ((dis.value.endsWith("zero"+lastvalu))||(values.startsWith("0"))||(isstart==0)){
        if(values.startsWith("0.")){
           if(check_lenght>2){
                dis.value = dis.value;
            }else{
                dis.value = "0.9";
            }
        }else{
            dis.value = input[2].value;
        }
    }
    isstart = 1;
});
input[4].addEventListener('click', () =>{
    values = dis.value;
    check_lenght = values.toString().length; //lenght checking
    tostring_conevert = String(values); //convert to string for last sybol
    lastvalu = (tostring_conevert[check_lenght-1]); // last value get
    if ((dis.value.endsWith("zero"+lastvalu))||(values.startsWith("0"))||(isstart==0)){
        if(values.startsWith("0.")){
            if(check_lenght>2){
                dis.value = dis.value;
            }else{
                dis.value = "0.4";
            }
        }else{
            dis.value = input[4].value;
        }
    }
    isstart = 1;
});
input[5].addEventListener('click', () =>{
    values = dis.value;
    check_lenght = values.toString().length; //lenght checking
    tostring_conevert = String(values); //convert to string for last sybol
    lastvalu = (tostring_conevert[check_lenght-1]); // last value get
    if ((dis.value.endsWith("zero"+lastvalu))||(values.startsWith("0"))||(isstart==0)){
        if(values.startsWith("0.")){
            if(check_lenght>2){
                dis.value = dis.value;
            }else{
                dis.value = "0.5";
            }
        }else{
            dis.value = input[5].value;
        }
    }
    isstart = 1;
});
input[6].addEventListener('click', () =>{
    values = dis.value;
    check_lenght = values.toString().length; //lenght checking
    tostring_conevert = String(values); //convert to string for last sybol
    lastvalu = (tostring_conevert[check_lenght-1]); // last value get
    if ((dis.value.endsWith("zero"+lastvalu))||(values.startsWith("0"))||(isstart==0)){
        if(values.startsWith("0.")){
            if(check_lenght>2){
                dis.value = dis.value;
            }else{
                dis.value = "0.6";
            }
        }else{
            dis.value = input[6].value;
        }
    }
    isstart = 1;
});
input[8].addEventListener('click', () =>{
    values = dis.value;
    check_lenght = values.toString().length; //lenght checking
    tostring_conevert = String(values); //convert to string for last sybol
    lastvalu = (tostring_conevert[check_lenght-1]); // last value get
    if ((dis.value.endsWith("zero"+lastvalu))||(values.startsWith("0"))||(isstart==0)){
        if(values.startsWith("0.")){
            if(check_lenght>2){
                dis.value = dis.value;
            }else{
                dis.value = "0.1";
            }
        }else{
            dis.value = input[8].value;
        }
    }
    isstart = 1;
});
input[9].addEventListener('click', () =>{
    values = dis.value;
    check_lenght = values.toString().length; //lenght checking
    tostring_conevert = String(values); //convert to string for last sybol
    lastvalu = (tostring_conevert[check_lenght-1]); // last value get
    if ((dis.value.endsWith("zero"+lastvalu))||(values.startsWith("0"))||(isstart==0)){
        if(values.startsWith("0.")){
            if(check_lenght>2){
                dis.value = dis.value;
            }else{
                dis.value = "0.2";
            }
        }else{
            dis.value = input[9].value;
        }
    }
    isstart = 1;
});
input[10].addEventListener('click', () =>{
    values = dis.value;
    check_lenght = values.toString().length; //lenght checking
    tostring_conevert = String(values); //convert to string for last sybol
    lastvalu = (tostring_conevert[check_lenght-1]); // last value get
    if ((dis.value.endsWith("zero"+lastvalu))||(values.startsWith("0"))||(isstart==0)){
        if(values.startsWith("0.")){
            if(check_lenght>2){
                dis.value = dis.value;
            }else{
                dis.value = "0.3";
            }
        }else{
            dis.value = input[10].value;
        }
    }
    isstart = 1;
});
input[13].addEventListener('click', () =>{
    values = dis.value;
    check_lenght = values.toString().length; //lenght checking
    tostring_conevert = String(values); //convert to string for last sybol
    lastvalu = (tostring_conevert[check_lenght-1]); // last value get
    if ((dis.value.endsWith("zero"+lastvalu))||(values.startsWith("0"))||(isstart==0)){
        if(values.startsWith("0.")){
            if(check_lenght>2){
                dis.value = dis.value;
            }else{
                dis.value = "0.0";
            }
        }else{
            dis.value = input[13].value;
        }
    }
    isstart = 1;
});


window.addEventListener('keydown', (event) => {
    if (event.key === '1') {
        event.preventDefault();
        numbvalu = "1";
        dis.value += 1;
        values = dis.value;
        check_lenght = values.toString().length; //lenght checking
        tostring_conevert = String(values); //convert to string for last sybol
        lastvalu = (tostring_conevert[check_lenght-1]); // last value get
        if ((dis.value.endsWith("zero"+lastvalu))||(values.startsWith("0"))||(isstart==0)){
            if(values.startsWith("0.")){
                if(check_lenght>2){
                    dis.value = dis.value;
                }else{
                    dis.value = "0.1";
                }
            }else{
                dis.value = input[8].value;
            }
        }
        isstart = 1;
        }
})

window.addEventListener('keydown', (event) => {
    if (event.key === '2') {
        event.preventDefault();
        numbvalu = "2";
        dis.value += 2;
        values = dis.value;
        check_lenght = values.toString().length; //lenght checking
        tostring_conevert = String(values); //convert to string for last sybol
        lastvalu = (tostring_conevert[check_lenght-1]); // last value get
        if ((dis.value.endsWith("zero"+lastvalu))||(values.startsWith("0"))||(isstart==0)){
            if(values.startsWith("0.")){
                if(check_lenght>2){
                    dis.value = dis.value;
                }else{
                    dis.value = "0.2";
                }
            }else{
                dis.value = input[9].value;
            }
        }
        isstart = 1;
    }
})

window.addEventListener('keydown', (event) => {
    if (event.key === '3') {
        event.preventDefault();
        numbvalu = "3";
        dis.value += 3;
        values = dis.value;
        check_lenght = values.toString().length; //lenght checking
        tostring_conevert = String(values); //convert to string for last sybol
        lastvalu = (tostring_conevert[check_lenght-1]); // last value get
        if ((dis.value.endsWith("zero"+lastvalu))||(values.startsWith("0"))||(isstart==0)){
            if(values.startsWith("0.")){
                if(check_lenght>2){
                    dis.value = dis.value;
                }else{
                    dis.value = "0.3";
                }
            }else{
                dis.value = input[10].value;
            }
        }
        isstart = 1;
    }
})

window.addEventListener('keydown', (event) => {
    if (event.key === '4') {
        event.preventDefault();
        numbvalu = "4";
        dis.value += 4;
        values = dis.value;
        check_lenght = values.toString().length; //lenght checking
        tostring_conevert = String(values); //convert to string for last sybol
        lastvalu = (tostring_conevert[check_lenght-1]); // last value get
        if ((dis.value.endsWith("zero"+lastvalu))||(values.startsWith("0"))||(isstart==0)){
            if(values.startsWith("0.")){
                if(check_lenght>2){
                    dis.value = dis.value;
                }else{
                    dis.value = "0.4";
                }
            }else{
                dis.value = input[4].value;
            }
        }
        isstart = 1;
    }
})

window.addEventListener('keydown', (event) => {
    if (event.key === '5') {
        event.preventDefault();
        numbvalu = "5";
        dis.value += 5;
        values = dis.value;
        check_lenght = values.toString().length; //lenght checking
        tostring_conevert = String(values); //convert to string for last sybol
        lastvalu = (tostring_conevert[check_lenght-1]); // last value get
        if ((dis.value.endsWith("zero"+lastvalu))||(values.startsWith("0"))||(isstart==0)){
            if(values.startsWith("0.")){
                if(check_lenght>2){
                    dis.value = dis.value;
                }else{
                    dis.value = "0.5";
                }
            }else{
                dis.value = input[5].value;
            }
        }
        isstart = 1;
    }
})

window.addEventListener('keydown', (event) => {
    if (event.key === '6') {
        event.preventDefault();
        numbvalu = "6";
        dis.value += 6;
        values = dis.value;
        check_lenght = values.toString().length; //lenght checking
        tostring_conevert = String(values); //convert to string for last sybol
        lastvalu = (tostring_conevert[check_lenght-1]); // last value get
        if ((dis.value.endsWith("zero"+lastvalu))||(values.startsWith("0"))||(isstart==0)){
            if(values.startsWith("0.")){
                if(check_lenght>2){
                    dis.value = dis.value;
                }else{
                    dis.value = "0.6";
                }
            }else{
                dis.value = input[6].value;
            }
        }
        isstart = 1;
    }
})

window.addEventListener('keydown', (event) => {
    if (event.key === '7') {
        event.preventDefault();
        numbvalu = "7";
        dis.value += 7;
        values = dis.value;
        check_lenght = values.toString().length; //lenght checking
        tostring_conevert = String(values); //convert to string for last sybol
        lastvalu = (tostring_conevert[check_lenght-1]); // last value get
        if ((dis.value.endsWith("zero"+lastvalu))||(values.startsWith("0"))||(isstart==0)){
            if(values.startsWith("0.")){
                if(check_lenght>2){
                    dis.value = dis.value;
                }else{
                    dis.value = "0.7";
                }
            }else{
                dis.value = input[0].value;
            }
        }
        isstart = 1;
    }
})

window.addEventListener('keydown', (event) => {
    if (event.key === '8') {
        event.preventDefault();
        numbvalu = "8";
        dis.value += 8;
        values = dis.value;
        check_lenght = values.toString().length; //lenght checking
        tostring_conevert = String(values); //convert to string for last sybol
        lastvalu = (tostring_conevert[check_lenght-1]); // last value get
        if ((dis.value.endsWith("zero"+lastvalu))||(values.startsWith("0"))||(isstart==0)){
            if(values.startsWith("0.")){
                if(check_lenght>2){
                    dis.value = dis.value;
                }else{
                    dis.value = "0.8";
                }
            }else{
                dis.value = input[1].value;
            }
        }
        isstart = 1;
    }
})

window.addEventListener('keydown', (event) => {
    if (event.key === '9') {
        event.preventDefault();
        numbvalu = "9";
        dis.value += 9;
        values = dis.value;
        check_lenght = values.toString().length; //lenght checking
        tostring_conevert = String(values); //convert to string for last sybol
        lastvalu = (tostring_conevert[check_lenght-1]); // last value get
        if ((dis.value.endsWith("zero"+lastvalu))||(values.startsWith("0"))||(isstart==0)){
            if(values.startsWith("0.")){
                if(check_lenght>2){
                    dis.value = dis.value;
                }else{
                    dis.value = "0.9";
                }
            }else{
                dis.value = input[2].value;
            }
        }
        isstart = 1;
    }
})

window.addEventListener('keydown', (event) => {
    if (event.key === '0') {
        event.preventDefault();
        numbvalu = "0";
        zeros();
    }
})

window.addEventListener('keydown', (event) => {
    if (event.key === '+') {
        event.preventDefault();
        operator = "+";
        addd();
    }
})

window.addEventListener('keydown', (event) => {
    if (event.key === '-') {
        event.preventDefault();
        operator = "-";
        subb();
    }
})

window.addEventListener('keydown', (event) => {
    if (event.key === '*') {
        event.preventDefault();
        operator = "*";
        mull();
    }
})

window.addEventListener('keydown', (event) => {
    if (event.key === '/') {
        event.preventDefault();
        operator = "/";
        divisii();
    }
})

window.addEventListener('keydown', (event) => {
    if (event.key === '.') {
        event.preventDefault();
        points();
    }
})

window.addEventListener('keydown', (event) => {
    if (event.key === 'Enter') {
        event.preventDefault();
        additioin();
    }
});

window.addEventListener('keydown', (event) => {
    if (event.key === 'Backspace') {
        event.preventDefault();
        back();
    }
});

window.addEventListener('keydown', (event) => {
    if (event.key === 'Delete') {
        event.preventDefault();
        dis.value = "";
        isstart =1;
        pointval = 0;
    }
});


