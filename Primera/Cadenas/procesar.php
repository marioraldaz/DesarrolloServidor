<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
    <?php
        function buscar($aguja,$pajar){
            $pajar=str_replace(",","",$pajar);
            $pajar=str_replace(";","",$pajar);

            $arrayPajar=explode(" ",$pajar);
            $posiciones=[];
            for($i=0;$i<count($arrayPajar);$i++){
                if($arrayPajar[$i]==$aguja)
                array_push($posiciones, $i);
            }

            return $posiciones;
        }


        function replace($texto,$palabra,$palabraNueva){
            return str_replace($palabra,$palabraNueva,$texto);
        }

        function remove($texto,$palabra){
        return str_replace($palabra,"",$texto);
        }
        
        function countWords($texto){
            return str_word_count($texto,0);
        }

        function countVowels($texto){
            $cnt=0;
            $cnt+=substr_count($texto,'a');
            $cnt+=substr_count($texto,'e');
            $cnt+=substr_count($texto,'i');
            $cnt+=substr_count($texto,'o');
            $cnt+=substr_count($texto,'u');
            return $cnt;
        }

        function lowerCase($texto){
            return strtolower($texto);
        }

        function upperCase($texto){
            return strtoupper($texto);
        }

        function remark($texto,$palabra){
            $texto =  str_replace($palabra,'<mark>'.$palabra.'</mark>',$texto);
            echo $texto;
        }

        function printForm($option){
        
            echo '<form method="post" action="">';
            if($option == 'REMARK' || $option == 'REMOVE' || $option == 'REPLACE'){
                echo 'Introduzca la palabra: <input type="text" name="palabra" maxlength="60"/><br/>';
            }
            if($option=="REPLACE"){
                echo  'Introduzca la palabra para reemplazar: <input type="text" name="palabra2" maxlength="60"/><br/>';
            }
            echo <<<FORM
                    <input type="text" class="cuadro-texto" name="texto" value='$_POST[texto]'/><br/>
                    <input type="hidden" name="option" value='$option'/>
                    <input type="submit" name="submit" value="$option"/>
                </form>
            FORM;
        }

        $option=$_POST['option'];

        if(isset($_POST['palabra'])){
            switch($option){
            case 'REMARK':
                remark($_POST['texto'],$_POST['palabra']);
                break;
            case 'REMOVE':
                remove($_POST['texto'],$_POST['palabra']);
                break;
            case 'REPLACE':
                echo replace($_POST['texto'],$_POST['palabra'],$_POST['palabra2']);
                break;
            case 'count vowels':
                remove($_POST['texto'],$_POST['palabra']);
                break;
            case 'lower-case':
                remove($_POST['texto'],$_POST['palabra']);
                break;
            case 'upper-case':
                remove($_POST['texto'],$_POST['palabra']);
                break;
            }
        } else{
            switch($option){        

                case 'REMARK':
                    printForm($option);
                    break;

                case 'REMOVE':
                    printForm($option);
                    break;
                case 'REPLACE':
                    printForm($option);
                    break;
                case 'COUNT WORDS':
                    echo countWords($_POST['texto']);
                    break;
                case 'COUNT VOWELS':
                    echo countVowels($_POST['texto']);
                    break;
                case 'LOWER CASE':
                    echo lowerCase($_POST['texto']);
                    break;
                case 'UPPER CASE':
                    echo upperCase($_POST['texto']);
                    break;
            }
        }

  

       
    ?>
</body>

</html>