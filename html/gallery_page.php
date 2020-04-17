<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Батуліна, Лабораторна робота №6</title>
          <link rel="stylesheet" href="../css/main.css">
          <link rel="stylesheet" href="../css/gallery_page.css">    
    </head>
    
<body>
<header>         <!-- Шапка, первый блок -->        
        <h1>Батуліна Катерина Станіславівна</h1>  
        <div class="dropdown">
          <button class="mainmenubtn">Меню</button>
        <div class="dropdown-child">
         <a href="../index.html">Головна сторінка</a>  
         <a href="../html/resume_page.html">Резюме</a>
         <a href="../html/hobby_page.html">Хобі</a>
         <a href="../html/gallery_page.php">Галерея</a>
        </div>
        </div>                                                 
    </header>
        
        <div id="content">
        <img id="image" src="../gallery_images/1.jpg" onClick="imgsrc();" height="300" width="400" border="0">  
         <form name="imgChange">
            <p>Висота:<br>
            <input type="number" name="heightChange" value="300" title="Число должно быть положительным">
            </p>
            <p>Ширина:<br>
            <input type="number" name="widthChange" value="400" title="Число должно быть положительным">
            </p>
            <p>Кордони малюнку:<br>
            <input type="number" name="borderChange" value="0" title="Число должно быть положительным">
            </p>
            <input type="button" value="Змінити параметри" onclick="valueCheck();">
        </form>
        </div>
    
    <form action="../php/index.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
    </form>
    
	
        <script language="javascript">
            var currentImg=document.getElementById("image");
			var imgsArray=new Array( 
			<?php
		
			$dir = '../gallery_images/'; 
			$img_files = preg_grep('/^([^.])/',scandir($dir));
			$i = 1;
			foreach ($img_files as $f) {
				echo "'/gallery_images/" . $f . "'";
				if ($i++<count($img_files)) echo ",";
			}
			?> 
			);
			
            function imgsrc(){
                var i=getRandomInt(0,imgsArray.length);
                image.src=imgsArray[i];
            }
             
             function getRandomInt(min, max) {
                 var randNum =Math.floor(Math.random() * (max - min)) + min;
                 return randNum;
             }
        </script>
        
        <script language="javascript">
            var changeForm = document.forms["imgChange"];
            var img_height = changeForm.elements["heightChange"];
            var img_width = changeForm.elements["widthChange"];
            var img_border = changeForm.elements["borderChange"];
			
            function valueCheck(){
			if(img_height.value > 0 && img_width.value > 0 && img_border.value >= 0 ){
				valueChange();
			} else alert("Ошибка. Значение введено в неправильном формате");
			}
			
            function valueChange(){
				 currentImg.height=img_height.value; 
				 currentImg.width=img_width.value;
				 currentImg.border=img_border.value;
            }
        </script>
        
        <footer> </footer>
</body>
</html>