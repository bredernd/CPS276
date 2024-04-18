<?php

    require_once('classes/StickyForm.php');

    $stickyForm = new StickyForm(); 
    
    class Login {
      public function login($post) {
          $pdo = new PdoMethods();
  
          $sql = "SELECT status, name, email, password FROM admins WHERE email = :email";
  
          $bindings = array(
            array(':email', $post['email'], 'str')
          );
      
          $records = $pdo->selectBinded($sql, $bindings);
      
          if($records == 'error'){
              return "There was an error logging in";
          }
          else {
              if(count($records) != 0){
                  if(password_verify($post['password'], $records[0]['password'])){
                      session_start();
                      $_SESSION['access'] = "accessGranted";
                      $_SESSION['status'] = $records[0]['status'];
                      $_SESSION['name'] = $records[0]['name'];
            
                      return "success";
                  }
                  else {
                      return "There was a problem logging in with those credentials";
                  }
              }
              else {
                  return "There was a problem logging in with those credentials";
              }
          }
      }
  }
  
  
    
    function init(){
        global $elementsArr, $stickyForm;
      
        if(isset($_POST['login'])){ 
            $postArr = $stickyForm->validateForm($_POST, $elementsArr);
            $loginOutput = $stickyForm->Login($_POST);

            if($postArr['masterStatus']['status'] == "noerrors"){
                if($loginOutput === 'success'){header('Location: index.php?page=welcome');}
                return getForm($loginOutput, $postArr);
            }
            else{
               return getForm("",$postArr);
            }
        }
        else {
            return getForm("", $elementsArr);
        } 
    }

   $elementsArr = [
	"masterStatus"=>[
	  "status"=>"noerrors",
	  "type"=>"masterStatus"
	],
	"email"=>[
      "errorMessage"=>"<span class='errorMsg'>Please enter in a valid email</span>",
      "errorOutput"=>"",
	  "type"=>"text",
	  "value"=>"dbredernitz@admin.com",
      "regex"=>"email" 
	],
	"password"=>[
      "errorMessage"=>"<span class='errorMsg'>Password must not be blank</span>",
      "errorOutput"=>"",
	  "type"=>"text",
	  "value"=>"password",
      "regex"=>"nonBlank"
	]
   ];


    function getForm($acknowledgement, $elementsArr){
        //global $stickyForm;

        $loginForm=<<<HTML
            <form name="login" action="index.php?page=login" method="post">
                <div class="form-group">
                    <label for="email">Email {$elementsArr['email']['errorOutput']}</label>
                    <input type="text" class="form-control" name="email" id="email" value="{$elementsArr['email']['value']}">
                </div>
                <div class="form-group">
                    <label for="password">Password {$elementsArr['password']['errorOutput']}</label>
                    <input type="password" class="form-control" name="password" id="password" value="{$elementsArr['password']['value']}">
                </div>
                <div class="form-group padtop">
                    <input type="submit" class="btn btn-primary" name="login" id="login" value="Log In">
                </div> 
            </form>
        HTML;   
        return [$acknowledgement, $loginForm];
    }

?>    