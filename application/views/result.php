<!DOCTYPE html>   
    <html>   
    <head>  
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title> Result  </title>  
    <style>   
    Body {  
      font-family: Calibri, Helvetica, sans-serif;  
      background-color: pink;  
    }  
    button {   
           background-color: #4CAF50;   
           width: 100%;  
            color: orange;   
            padding: 15px;   
            margin: 10px 0px;   
            border: none;   
            cursor: pointer;   
             }   
     form {   
            border: 3px solid #f1f1f1;   
        }   
     input[type=text], input[type=password] {   
            width: 100%;   
            margin: 8px 0;  
            padding: 12px 20px;   
            display: inline-block;   
            border: 2px solid green;   
            box-sizing: border-box;   
        }  
     button:hover {   
            opacity: 0.7;   
        }   
      .cancelbtn {   
            width: auto;   
            padding: 10px 18px;  
            margin: 10px 5px;  
        }   
            
         
     .container {   
            padding: 25px;   
            background-color: lightblue;  
        }   
    </style>   
    </head>    
    <body>    
        <center> <h1> result </h1> </center>   
        <?php
        $skip = array();
        $correct = array();
        $wrong = array();
        foreach($data as $val){
            if($val['status'] == "skipped"){
                array_push($skip,"skipped");
            }
            else if($val['status'] == "correct"){
                array_push($correct,"correct");
            }
            else{
                array_push($wrong,"wrong");
            }
        }
        ?>
        <form id="login_form" >  
            <div class="container">   
                <label>Correct Answer : <?php echo count($correct);?></label>  </br>                 
                <label>Wrong Answer : <?php echo count($wrong);?></label>         </br>          
                <label>Skipped : <?php echo count($skip);?></label>                   </br>
            </div>   
        </form>     
        <?php $this->session->unset_userdata('user');?>
    </body>    
</html>