<?php
/**
 * programm To create Theme.
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Theme Generator</title>
        <style>
            h1{
                color: #F26322;
                text-align: center;
                max-width: 1230px;
                width: 100%;
                margin: auto;
                padding-bottom: 20px;
            }
            div{
                width: 100%;
                max-width: 1230px;
                border-radius: 5px;
                background-color: #f2f2f2;
                padding: 20px;
                margin: auto;
            }
            input[type=text], select {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }

            input[type=submit] {
                width: 100%;
                background-color: #F26322;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            input[type=submit]:hover {
                background-color: #F26322;
            }
            .alert {
                padding: 20px;
                background-color: #f44336;
                color: white;
            }

            .closebtn {
                margin-left: 15px;
                color: white;
                font-weight: bold;
                float: right;
                font-size: 22px;
                line-height: 20px;
                cursor: pointer;
                transition: 0.3s;
            }

            .closebtn:hover {
                color: black;
            }

        </style>
    </head>
    <body>
        <div>
            <h1>
                Auto Theme generator 1.0
            </h1>
            <form method="post" ACTION=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
                <label for="vendor">
                    Vendor Name:
                </label>
                <input type="text" name="vendor" class="vendor" id="vendor" placeholder="For e.g - Magento" required><br>
                <label for="tname">
                    Theme Name:
                </label>
                <input type="text" name="tname" class="tname" id="tname" placeholder="For e.g - luma" required><br>
                <label for="ptname">
                    Parent Theme Name:
                </label>
                <input type="text" name="ptname" class="ptname" id="ptname" placeholder="For e.g - Magento/blank" required><br>
                <input type="submit" name="submit" value="Submit"><br>
            </form>
        </div>
    </body>
</html>
<?php
    //If user hit the Enter Button
    if (isset($_POST['vendor']) and isset($_POST['tname'])){
        //Getting all the Variables from the user input
        $basedir = "app/design/frontend";
        $tname = strtolower($_POST['tname']);
        $parent = ucfirst($_POST['ptname']);
        $vendor = ucfirst($_POST['vendor']);

        //Creating Directory Structure Folder
        $dir = $basedir."/".$vendor."/".$tname;

        //Making parent theme name to composer friendly
        $parent_theme_explode = explode("/",$parent);
        $parent_theme = implode("-",$parent_theme_explode);
        $parent_theme_for_composer = strtolower($parent_theme_explode[0])."/theme-frontend-".strtolower($parent_theme_explode[1]);

        //Making Current theme name to composer friendly
        $current_theme_for_composer =strtolower($vendor)."/theme-frontend-".$tname;

        //If the Theme with same name Already Exist
        if(is_dir($dir) === true){
            echo"<div class=\"alert\">
                  <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                  <strong>Error!</strong> Theme name already exist.
                </div>";
        }
        else{
            //Check the directory one by one and create it if not found
            if (!is_dir("app")){mkdir("app");}
            if (!is_dir("app/design")){mkdir("app/design");}
            if (!is_dir("app/design/frontend")){mkdir("app/design/frontend");}
            if (!is_dir("app/design/frontend/".$vendor)){mkdir("app/design/frontend/".$vendor);}
            mkdir($dir);

            //Creating the theme.xml file and putting content.
            $myTheme = fopen($dir."/theme.xml", "w") or die("Unable to open file!");
            $theme = ' <theme xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="urn:magento:framework:Config/etc/theme.xsd">
                          <title>'.$tname.'</title>
                          <parent>'.$parent.'</parent>
                     </theme>';
            fwrite($myTheme, $theme);
            fclose($myTheme);

            //Creating the Registration.php file and putting content.
            $myReg = fopen($dir."/registration.php", "w") or die("Unable to open file!");
            $reg = "<?php
                        /**
                         * Copyright © 2015 Magento. All rights reserved.
                         * See COPYING.txt for license details.
                         */
                        \Magento\Framework\Component\ComponentRegistrar::register(
                            \Magento\Framework\Component\ComponentRegistrar::THEME,
                            'frontend/".$vendor."/".$tname."',
                            __DIR__
                        );";
            fwrite($myReg, $reg);
            fclose($myReg);

            //Creating the Composer.json file and putting content.
            $composer_file = fopen($dir."/composer.json", "w") or die("Unable to open file!");
            $composer_file_content ='{
                                        "name": "'.$current_theme_for_composer.'",
                                        "description": "N/A",
                                        "require": {
                                            "php": "~5.5.0|~5.6.0|~7.0.0",
                                            "'.$parent_theme_for_composer.'": "100.0.*",
                                            "magento/framework": "100.0.*"
                                        },
                                        "type": "magento2-theme",
                                        "version": "100.0.1",
                                        "license": [
                                            "OSL-3.0",
                                            "AFL-3.0"
                                        ],
                                        "autoload": {
                                            "files": [
                                                "registration.php"
                                            ]
                                        }
                                    }';
            fwrite($composer_file, $composer_file_content);
            fclose($composer_file);

            //Creating Other directories.
            mkdir($dir."/etc");
            mkdir($dir."/web");
            mkdir($dir."/web/css");
            mkdir($dir."/web/css/source");
            mkdir($dir."/web/fonts");
            mkdir($dir."/web/images");
            mkdir($dir."/web/js");

            //Message after operation Complete
            echo "Successful, Thanks For using This Script!";
        }
    }
?>