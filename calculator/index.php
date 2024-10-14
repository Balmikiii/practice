<html>
    <head>
        <title>calculator</title>
    </head>
    <link rel="stylesheet" href="style.css">
<body>
    <div class ="wrap">
        <form name ="cal">
            <textarea name="displayd" id="disd" cols="10" disabled></textarea>
            <textarea name="display" id="dis" cols="10" disabled></textarea>
            <div class="inputs">
                <input type="button" value="7" onclick="cal.display.value+='7'"><!-- 1 -->
                <input type="button" value="8" onclick="cal.display.value+='8'"><!-- 2 -->
                <input type="button" value="9" onclick="cal.display.value+='9'"><!-- 3 -->
                <input type="button" value="<" class="bac"><!-- 4 -->
                <input type="button" value="4" onclick="cal.display.value+='4'"><!-- 5 -->
                <input type="button" value="5" onclick="cal.display.value+='5'"><!-- 6 -->
                <input type="button" value="6" onclick="cal.display.value+='6'"><!-- 7 -->
                <input type="button" value="/" class="divisi">	<!-- 8 -->
                <input type="button" value="1" onclick="cal.display.value+='1'"><!-- 9 -->
                <input type="button" value="2" onclick="cal.display.value+='2'"><!-- 10 -->
                <input type="button" value="3" onclick="cal.display.value+='3'"><!-- 11 -->
                <input type="button" value="x" class="mul"><!-- 12 -->
                <input type="button" value="." class="point"><!-- 13 -->

                <input type="button" value="0" class="zero"><!-- 14 -->
                <input type="button" value="C" onclick="cal.display.value= ''"><!-- 15 -->
                <input type="button" value="+" class="addd"><!-- 16 -->
                <input type="button" value="=" id="equalto"><!-- 17 -->
                <input type="button" value="-"  class="sub"><!-- 18 -->
                
            </div>
        </form>
    </div>
    <!-- <script src="index.js"></script> -->
    <script src="in.js"></script>
</body>
</html>