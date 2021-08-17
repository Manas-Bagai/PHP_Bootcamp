<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    function arrayFlatten($input){
        $output=array();
        for ($i=0;$i<count($input);$i=$i+1){
            if (gettype($input[$i])=="array"){
                $output=array_merge($output,$input[$i]);
            }
            else{
                array_push($output,$input[$i]);
            }

        }
        foreach ($output as $values){
            echo ($values);
        }
    }

    function maskPhoneNumber($input){
        $s1=substr($input,0,2);
        $s2="******";
        $s3=substr($input,8,2);
        $output=$s1.$s2.$s3;
        echo($output);
    }

    function camelCase($input){
        
        $outputArray=array();
        for ($i=0;$i<count($input);$i=$i+1){
            $arrayOfStrings=explode("_",$input[$i]);
            $output=$arrayOfStrings[0];
            if (count($arrayOfStrings)==1){
                return;
            }
            for ($j=1;$j<count($arrayOfStrings);$j=$j+1){
                $output=$output.ucfirst($arrayOfStrings[$j]);
            }
            array_push($outputArray,$output);
        }
        foreach ($outputArray as $values){
            echo ($values." ");
    }
    }

    function loopJSON($input){
        $json_input=str_replace("/","",$input);
        $array1=(json_decode($input));
        $names = [];
        $age = [];
        $city = [];
        foreach($array1->{"players"} as $value){
            array_push($names,$value->{"name"});
            array_push($age,$value->{"age"});
            array_push($city,$value->{"address"}->{"city"});
        }
        print_r($names);
        echo("<br>");
        print_r($age);
        echo("<br>");
        print_r($city);
        echo("<br>");

        $uNames=[];
        
        foreach ($names as $keys => $values){
            array_push($uNames,$values);
        }
            
        echo("Unique name array ");
        print_r(array_unique($uNames));
        echo("<br>");
        
        $max_age = max($age);
        $oldestNames =[];
        for($i=0;$i<count($age);$i++){
            if($age[$i] == $max_age){
                array_push($oldestNames,$names[$i]);
            }
        }
        echo "Players with Maximum age\n";
        print_r($oldestNames);
    }



    arrayFlatten([2,3,[4,5],[6,7],8]);
    echo("<br>");
    maskPhoneNumber("9876543210");
    echo("<br>");
    camelCase(["camel_case","snake_case"]);
    echo("<br>");
    loopJSON("{\"players\":[{\"name\":\"Ganguly\",\"age\":45,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Dravid\",\"age\":45,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Dhoni\",\"Age\":37,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Virat\",\"age\":35,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Jadeja\",\"age\":35,\"address\":{\"city\":\"Hyderabad\"}},{\"name\":\"Jadeja\",\"age\":35,\"address\":{\"city\":\"Hyderabad\"}}]}");
    ?>
</body>
</html>