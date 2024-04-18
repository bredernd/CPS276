<?php

require_once('classes/StickyForm.php');
$stickyForm = new StickyForm();

function init()
{
    if($_SESSION['access'] !== "accessGranted" || $_SESSION['status'] !== "admin")
    {
        header('Location: index.php?page=login');
    }

    global $elementsArr, $stickyForm;

    if(isset($_POST['submit']))
    {
        $postArr = $stickyForm->validateForm($_POST, $elementsArr);

        if($postArr['masterStatus']['status'] == "noerrors")
        {
            return addData($_POST);

        }
        else
        {
            return getForm("",$postArr);
        }
    }
    else 
    {
        return getForm("", $elementsArr);
    } 
}

$elementsArr = 
[
    "masterStatus"=>
    [
        "status"=>"noerrors",
        "type"=>"masterStatus"
    ],
	"name"=>
    [
        "errorMessage"=>"<span style='color: red; margin-left: 15px;'>Name cannot be blank and must be a standard name</span>",
        "errorOutput"=>"",
        "type"=>"text",
        "value"=>"Scott Shaper",
        "regex"=>"name"
	],
    "email"=>
    [
        "errorMessage"=>"<span style='color: red; margin-left: 15px;'>Email cannot be blank and must be written as a proper email</span>",
        "errorOutput"=>"",
        "type"=>"text",
        "value"=>"sshaper@admin.com",
        "regex"=>"email"
	],
    "password"=>
    [
        "errorMessage"=>"<span style='color: red; margin-left: 15px;'>Password cannot be blank</span>",
        "errorOutput"=>"",
        "type"=>"text",
        "value"=>"password",
        "regex"=>"password"
	],
    "status"=>
    [
        "type"=>"select",
        "options"=>["staff"=>"Staff", "admin"=>"Admin"],
        "selected"=>"admin",
        "regex"=>"name"
    ]
];

Function checkEmail($email)
{
    require_once "classes/Db_conn.php";
    $dbconn = new DatabaseConn();
    $db = $dbconn->dbOpen();
    $STH = $db->prepare('SELECT email FROM admins');
    $STH->execute();
        
    while($row = $STH->fetch()) 
    {
        if($email == ($row['email']))
        {
            return 0;
        }
    }
    return 1;
}

function addData($post)
{
    global $elementsArr;  

    if(checkEmail($post['email']) == 0)
    {
        return getForm("That email already exists", $elementsArr);
    }
    else
    {
        require_once('classes/Pdo_methods.php');
        $pdo = new PdoMethods();
        $password = password_hash($post['password'], PASSWORD_DEFAULT);
        $sql = "INSERT INTO admins (name, email, password, status) VALUES (:name, :email, :password, :status)";
        $bindings = 
        [
            [':name',$post['name'],'str'],
            [':email',$post['email'],'str'],
            [':password', $password,'str'],
            [':status',$post['status'],'str']
        ];
        $result = $pdo->otherBinded($sql, $bindings);

        if($result == "error")
        {
            return getForm("<p>There was a problem processing your form</p>", $elementsArr);
        }
        else 
        {
            return getForm("<p>Admin has been added</p>", $elementsArr);
        }  
    }
}
function getForm($acknowledgement, $elementsArr)
{

    global $stickyForm;
    $options = $stickyForm->createOptions($elementsArr['status']);

    $form = <<<HTML
       
        <p>$acknowledgement</p>
        <form method="post" action="index.php?page=addAdmin">
            <div class="form-group">
                <label for="name">Name (letters only){$elementsArr['name']['errorOutput']}</label>
                <input type="text" class="form-control" id="name" name="name" value="{$elementsArr['name']['value']}" >
            </div>
            <div class="form-group">
                <label for="email">Email{$elementsArr['email']['errorOutput']}</label>
                <input type="text" class="form-control" id="email" name="email" value="{$elementsArr['email']['value']}" >
            </div>
            <div class="form-group">
                <label for="password">Password{$elementsArr['password']['errorOutput']}</label>
                <input type="password" class="form-control" id="password" name="password" value="{$elementsArr['password']['value']}" >
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">$options</select>
            </div>
            <div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    HTML;
    
    return [$acknowledgement, $form];
}
?>