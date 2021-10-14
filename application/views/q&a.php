<?php 
$session = $this->session->userdata('user');
//var_dump($session);
?>
<!DOCTYPE html>   
    <html>   
    <head>  
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title> MCQ  </title>  
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
        <center> <h1> MCQ </h1> </center>   
        <form id="login_form" >  
            <div class="container">   
            <div id="q&a">
                <center><label>Question <span id="con"><?php echo $session['current'];?></span></label> </center>
                <label id="qns">question number</label></br></br>
                <div id="answers"></div>                
                <input type="hidden" id="count" value="<?php echo $session['current'];?>"/>
            </div>
            <button type="button" id="skip" onclick="skip_qtn()">Skip</button>                   
            <button type="button" id="next" onclick="next_qtn()">Next</button>                   
            </div>   
        </form>     
    </body>        
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>    
    <script>
        $(document).ready(function(){
            qa();
        });
        function skip_qtn(){
            var qid = $("#qns_id").val();
            var user_id= "<?php echo $session['user_id'];?>";
            var session_id = "<?php echo $session['session_id'];?>";
            var type = "skipped";
            var current = $("#count").val();                        
            if(current >= 10){
                window.location.href = "<?php echo base_url();?>home/result";  
            }
            else{
            $.ajax({
                type: "POST",
                url : "<?php echo base_url();?>home/skip_qa",
                dataType : "json",
                data:"qid="+qid+"&user_id="+user_id+"&type="+type+"&current="+current+"&session_id="+session_id,
                success:function(html){    
                    
                    $("#count").val(html); 
                    $("#con").html(html);                    
                    qa();               
                 //   window.location.href = "<?php echo base_url();?>home/test";                    
                }
            });
            }        
        }

        function qa(){
            $("#answers").html("");
            var user_name = "<?php echo $session['user_name'];?>";
            var session_id = "<?php echo $session['session_id'];?>";
            var user_id = "<?php echo $session['user_id'];?>";
            var current = $("#count").val();
            $.ajax({
                type: "GET",
                url : "<?php echo base_url();?>home/get_qa",
                dataType : "json",
                data: "user="+user_name+"&session="+session_id+"&user_id="+user_id+"&current="+current,
                success:function(html){                    
                    //console.log(html);
                    $("#qns").html(html.question);
                    $("#answers").append('<input type="radio" class="res" name="answer" value="option_a">'+html.option_a+'</br>');
                    $("#answers").append('<input type="radio" class="res" name="answer" value="option_b">'+html.option_b+'</br>');
                    $("#answers").append('<input type="radio" class="res" name="answer" value="option_c">'+html.option_c+'</br>');
                    $("#answers").append('<input type="radio" class="res" name="answer" value="option_d">'+html.option_d+'</br>');
                    $("#answers").append('<input type="hidden"  id="crt_ans" name="crt_ans" value="'+html.cr_ans+'">');
                    $("#answers").append('<input type="hidden" id="qns_id" name="qns_id" value="'+html.q_id+'">');
                    //window.location.href = "<?php echo base_url();?>home/test";                    
                }
            });    
        }
        function next_qtn(){            
            
            var radioValue = $("input[name='answer']:checked").val();
            var qid = $("#qns_id").val();
            var user_id= "<?php echo $session['user_id'];?>";
            var session_id = "<?php echo $session['session_id'];?>";

            var current = $("#count").val();            
            var crc_ans = $("#crt_ans").val();
            if(crc_ans == radioValue){
                var type = "correct";
            }
            else{
                var type = "wrong";
            }
            if(current >= 10){
                window.location.href = "<?php echo base_url();?>home/result";  
            }
            else{
            if(radioValue){
                $.ajax({
                type: "POST",
                url : "<?php echo base_url();?>home/next_qa",
                dataType : "json",
                data:"qid="+qid+"&user_id="+user_id+"&type="+type+"&current="+current+"&session_id="+session_id,
                success:function(html){                        
                    $("#count").val(html); 
                    $("#con").html(html);                    
                    qa();                                               
                }
            });    
            }
            else{
                alert("Please select a option");
            }
            }
        }
    </script>
</html>