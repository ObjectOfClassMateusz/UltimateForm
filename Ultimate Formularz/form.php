<html>
    <head>
        <style>
            *{margin:0;padding:0;}
            hr{margin:10px;}
            #main{
                display:flex;
                width:100%;
                min-height:1000px;
            }
  
            #form{
                border:10px black solid;
                padding:10px;
                width:50%;
            }

            .result{
                border:10px red solid;
                padding:10px;
                width:50%;
                background-color:pink;
            }
        </style>
    </head>
<body>
    <div id="main">
        <div id="form"> <?php   /* input [id=js,label][name=php][type=...][value=Cośtam] */ ?>
            <form method="post" enctype="multipart/form-data">
                <label for="f2">Checkbox:    </label> <input type="checkbox"       id="f2" name="_f2" value="Yes!" checked>                                 <br><hr>
                <label for="f3">Kolor:       </label> <input type="color"          id="f3" name="_f3" value="#a500ff">                                      <br><hr>
                <label for="f4">Data:        </label> <input type="date"           id="f4" name="_f4" value="1917-06-11">                                   <br><hr>
                <label for="f5">Data-godzina:</label> <input type="datetime-local" id="f5" name="_f5" value="2000-06-22T00:48">                             <br><hr>
                <label for="f6">Email:       </label> <input type="email"          id="f6" name="_f6" value="xd@wp.pl">                                     <br><hr>
                <label for="f7">Plik:        </label> <input type="file"           id="f7" name="file">                                                     <br><hr>
                <label for="f10">Miesiąc:    </label> <input type="month"          id="f10"name="_f10" value="2000-02">                                     <br><hr>
                <label for="f12">Number:     </label> <input type="number"         id="f12"name="_f12" value="0.0"    step="0.1"> <!--min max placeholder--><br><hr>
                <label for="f11">Hasło:      </label> <input type="password"       id="f11"name="_f11">                                                     <br><hr>
                <label for="f13">Radio:      </label> <input type="radio"          id="f13"   name="_f13" value="radiojeden"> 
                                                      <input type="radio"          id="f13m1" name="_f13" value="radiodwa">
                                                      <input type="radio"          id="f13m2" name="_f13" value="radiotrzy">                                <br><hr>
                <label for="f14">Suwak:      </label> <input type="range"          id="f14" name="_f14" min="0" max="200" list="tickmarks" value="155" oninput="this.nextElementSibling.value = this.value">     
                <output>155</output>
                <datalist id="tickmarks">
                <option value="0"></option>
                <option value="10"></option>
                <option value="20"></option>
                <option value="30"></option>
                <option value="40"></option>
                <option value="50"></option>
                <option value="60"></option>
                <option value="70"></option>
                <option value="80"></option>
                <option value="90"></option>
                <option value="200"></option>
                </datalist>              
                                                                                                                                                            <br><hr>
                <label for="f15">Reset:      </label> <input type="reset">                                                                                  <br><hr>
                <label for="f17">Submit:     </label> <input type="submit"         id="f17" name="_f17">                                                    <br><hr>
                <label for="f18">Text:       </label> <input type="text"           id="f18" name="_f18" value="zxc">                                        <br><hr>
                <label for="f19">Godzina:    </label> <input type="time"          id="f19" name="_f19"    >                                                 <br><hr>
                <label for="f20">URL:        </label> <input type="url"            id="f20" name="_f20">                                                    <br><hr>
                <label for="f25">Select:     </label> 
                <select name="_f25" id="f25">
                    <option value="">CHOOSE A OPTION</option>
                    <option value="volvo">Volvo</option>
                    <option value="saab">Saab</option>
                    <option value="mercedes">Mercedes</option>
                    <option value="audi">Audi</option>
                <select>                                                                                                      <br><hr>
            </form>
        </div>
        <div class="result">
            <h1>Wyniki</h1><br><hr style="border:purple 1px solid;">
            <?php 
            if(isset($_POST['_f2']))
            {
                echo "<b>CheckBox:</b>  ".$_POST['_f2']."<br><hr>";
            }
            else{}
            //
            if(isset($_POST['_f18']) && $_POST['_f18'] != "")
            {
                echo "<b>Text:</b>  ".$_POST['_f18']."<br><hr>";
            }
            else{}
            //
            if(isset($_POST['_f4']) && $_POST['_f4'] != NULL)//check atribute value
            {
                echo '<b>Data:</b>'.$_POST['_f4'].'<br><hr>';
            }
            else{}
            //
            if(isset($_POST['_f3']))
            {
                echo "<b>Color:</b>";
                echo '<div style="width:100px; height:100px; background-color:'.$_POST['_f3'].';"></div>';
                echo "<br><hr>";
            }
            else{}
            //
            if(isset($_POST['_f5']))
            {
               echo '<b>Date-local:</b>'.$_POST['_f5']; 
               echo "<br><hr>";
            }
            else{}
            //
            if(isset($_POST['_f6']) && $_POST['_f6'] != "")
            {
                echo '<b>Email:</b>';
                echo $_POST['_f6'];
                echo "<br><hr>";
            }
            else{}
            //  
            if(isset($_POST['_f17']))
            {
                echo "<b>File:</b>";
                $file = $_FILES['file'];

                $fileTName = $_FILES['file']['tmp_name'];//php456.tmp
                $fileSize = $_FILES['file']['size'];// 5678Kb
                $fileError = $_FILES['file']['error'];//no error?
                $fileType = $_FILES['file']['type'];//png jpg gif

                $fileExt = explode('.',$_FILES['file']['name']);
                $fileActualExt = strtolower(end($fileExt));// JPG -> jpg

                $allowed = array('jpg','png','jpeg','mp4');

                if($fileError === 0)
                {   
                    if(in_array($fileActualExt,$allowed))
                    {   if($fileSize < 100000000000000)//kilo bit
                        // upload_max_filesize    post_max_size
                        {
                            $newName = uniqid('',true).".".$fileActualExt;
                            $fileDestination = 'up/'.$newName;
                            move_uploaded_file($fileTName,$fileDestination);
                            //header('Location: form.php?uploadsucces');
                        }else{
                            echo "Too big";
                        }
                    }else{
                        echo 'Wrong type bro';
                    }
                }else{
                    echo 'errore!';
                    echo $_FILES['file']['error'];
                }
                echo "<br><hr>";
            }
            else{}
            //
            echo "<b>up Directory:</b><br><br>";
            $katalog = dir("./up");
            print_r($katalog);echo'<br>';
            while($n = $katalog->read())
            {
                if($n == '..')
                {continue;}
                if($n == '.')
                {continue;}
                if($n[strlen($n)-1] == '4' && $n[strlen($n)-2] == 'p' && $n[strlen($n)-3] == 'm' && $n[strlen($n)-4] == '.')
                {
                    echo "_".$n."_<br>";
                    echo'<video width="520" height="440" controls>';
                        echo'<source src="./up/'.$n.'" type="video/mp4">';
                        echo'no video';
                    echo'</video>';
                }
                else
                {
                    echo $n."<br>";
                    echo '<img style="width:200px;height:200px;" src="./up/'.$n.'" alt="no image">';
                }
                echo"<br>";}

            echo "<br><hr>";
            //
            if(isset($_POST['_f10']))
            {
                echo "<b>Rok Miesiąc:</b>";
                echo $_POST['_f10'];
                echo "<br><hr>";
            }
            else{}
            // 
            if(isset($_POST['_f12']) && $_POST['_f12'] != NULL)
            {
                echo "<b>Number:</b>";
                echo $_POST['_f12'];
                echo "<br><hr>";
            }
            else{}
            //
            if(isset($_POST['_f11']) && $_POST['_f11'] != "")
            {
                echo "<b>Password:</b>  ".$_POST['_f11']."<br><hr>";
            }
            else{}
            //
            if(isset($_POST['_f14']))
            {
                echo "<b>Suwak:</b>  ".$_POST['_f14']."<br><hr>";
            }
            //
            if(isset($_POST['_f20']) && $_POST['_f20'] != "")
            {
                echo '<b>URL:</b>  <a href="'.$_POST['_f20'].'">link</a>    <br><hr>';
            }
            else{}
            //
            if(isset($_POST['_f19']) && $_POST['_f19'] != NULL)
            {
                echo '<b>Time:</b>'.$_POST['_f19']."<br><hr>";
            }
            else{}
            //
            //$car = filter_input(INPUT_POST, '_f25', FILTER_SANITIZE_STRING);
            if(isset($_POST['_f25']) && $_POST['_f25'] != NULL)
            {
                echo '<b>Select:</b>'.$_POST['_f25']."<br><hr>";
            }
            else{}
            //
            if(isset( $_POST['_f13']))
            {
            echo '<b>radio:</b> '.$_POST['_f13']."  <br><hr>";
            }
            else{}
            
            
            
            
            
            
            

            
            
            
            
            print_r($_POST);echo"<br><br>";
            print_r($_FILES);echo"<br><br>";
            
            //phpinfo();
            ?>
        </div>
    </div>
</body>
</html>