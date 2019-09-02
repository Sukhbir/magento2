
<?php

/**
 * Theme Functions
 */

/*if(isset($_POST['ready'])){
    ?>
    <input type="button" name="thememaker" id="thememaker" value="Want To make Theme?" onclick="thememaker();">
    <input type="button" name="directory" id="directory" value="Want To Copy Files?" onclick="directorymaker();">
    <?php
}*/
if(isset($_POST['body_theme_data']))
{
        echo '
    <div id="loading-image">
        <img src="assets/images/loader.gif" class="img-responsive" alt="Loader,gif"/>
    </div>
    <div class="main_div">
        <h1>
            Auto Theme generator 1.0
        </h1>
        <form enctype="multipart/form-data" id="main_form">
            <label for="vendor">
                Vendor Name:
            </label>
            <input type="text" name="vendor" class="vendor" id="vendor" placeholder="For e.g - Magento" required><br>
            <label for="tname">
                Theme Name:
            </label>
            <input type="text" name="tname" class="tname" id="tname" placeholder="For e.g - luma" required><br>
            <label for="ptname">
                Parent Theme Name (Optional, default: Magento/luma):
            </label>
            <input type="text" name="ptname" class="ptname" id="ptname" placeholder="For e.g - Magento/luma"><br>
            <label for="file">Preview Image For Theme (Optional, default: Magento/luma/preview.img)</label><br>
            <input id="file" name="file" type="file" /><br>
        </form>
        <form id="path_sheet">
        </form>
        <input type="button" name="submit" value="Submit" onclick="sendform();"><br>
    </div>
 ';}

    /*
     * If user hit the Enter Button
     */
    function unserializeForm($str) {
        $returndata = array();
        $strArray = explode("&", $str);
        foreach ($strArray as $item) {
            $array = explode("=", $item);
            $returndata[$array[0]] = $array[1];
        }

        return $returndata;
    }


    if (isset($_POST['main_form']) and isset($_POST['filepaths'])) {
        ?>
        <script>
            $('html, body').animate({
                scrollTop: $(".alert").offset().top
            }, 500);
        </script>
        <?php
        $data = $_POST['filepaths'];
        $data1 = unserializeForm($_POST['main_form']);

        //Getting all the Variables from the user input
        $basedir = "../app/design/frontend";
        $vendor = ucfirst($data1['vendor']);
        $tname = strtolower($data1['tname']);
        $parent = ucfirst($data1['ptname']);

        if (empty($parent)) {
            $parent = "Magento/blank";
        }

        //Creating Directory Structure Folder
        $dir = $basedir . "/" . $vendor . "/" . $tname;

        //Making parent theme name to composer friendly
        $parent_theme_explode = explode("/", $parent);
        $parent_theme = implode("-", $parent_theme_explode);
        $parent_theme_for_override = implode("_", $parent_theme_explode);
        $parent_theme_for_composer = strtolower($parent_theme_explode[0]) . "/theme-frontend-" . strtolower($parent_theme_explode[1]);

        //Making Current theme name to composer friendly
        $current_theme_for_composer = strtolower($vendor) . "/theme-frontend-" . $tname;

        //If the Theme with same name Already Exist

            //Check the directory one by one and create it if not found
            if (!is_dir("../app")) {
                mkdir("../app");
            }
            if (!is_dir("../app/design")) {
                mkdir("../app/design");
            }
            if (!is_dir("../app/design/frontend")) {
                mkdir("../app/design/frontend");
            }
            if (!is_dir("../app/design/frontend/" . $vendor)) {
                mkdir("../app/design/frontend/" . $vendor);
            }
            if(!is_dir($dir)){
                mkdir($dir);
            }


            //Creating Other directories.
        if(!is_dir($dir . "/etc")){
            mkdir($dir . "/etc");
        }
        if(!is_dir($dir . "/media")){
            mkdir($dir . "/media");
        }
        if(!is_dir($dir . "/web")){
            mkdir($dir . "/web");
        }
        if(!is_dir($dir . "/web/css")){
            mkdir($dir . "/web/css");
        }
        if(!is_dir($dir . "/web/css/source")){
            mkdir($dir . "/web/css/source");
        }
        if(!is_dir($dir . "/web/fonts")){
            mkdir($dir . "/web/fonts");
        }
        if(!is_dir($dir . "/web/images")){
            mkdir($dir . "/web/images");
        }
        if(!is_dir($dir . "/web/js")){
            mkdir($dir . "/web/js");
        }

            //mkdir($dir . "/" . $parent_theme_explode[0]);
            //mkdir($dir . "/" . $parent);

            /*
             * Creating the theme.xml file and putting content.
             */
            if(!file_exists($dir . "/theme.xml")) {
                $myTheme = fopen($dir . "/theme.xml", "w") or die("Unable to open file!");
                $theme = '<theme xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="urn:magento:framework:Config/etc/theme.xsd">
    <title>' . $tname . '</title><!-- your theme\'s name -->
    <parent>' . $parent . '</parent><!-- the parent theme, in case your theme inherits from an existing theme -->
    <media>
        <preview_image>media/preview.jpg</preview_image><!-- the path to your theme\'s preview image -->
    </media>
</theme>';
                fwrite($myTheme, $theme);
                fclose($myTheme);
            }

            /*
             * Creating the Registration.php file and putting content.
             */
            if(!file_exists($dir . "/registration.php")){
                $myReg = fopen($dir . "/registration.php", "w") or die("Unable to open file!");
                $reg = "<?php
/**
 * Generated By ThemeGenerator v1.0
 * Thanks For Using.
 */
\Magento\Framework\Component\ComponentRegistrar::register(
    \Magento\Framework\Component\ComponentRegistrar::THEME,
    'frontend/" . $vendor . "/" . $tname . "',
    __DIR__
);";
                fwrite($myReg, $reg);
                fclose($myReg);

            }

            /*
             * Creating the Composer.json file and putting content.
             */
            //if(!file_exists($dir . "/composer.json")) {
                /*$composer_file = fopen($dir."/composer.json", "w") or die("Unable to open file!");
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
                fclose($composer_file);*/
           // }

            /*
             * calling Image upload Function Defined Below
             */

            if (isset($data1['file'])) {
                $filename = $_FILES["file"]["name"];
                $file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
                $file_ext = substr($filename, strripos($filename, '.')); // get file name
                $filesize = $_FILES["file"]["size"];
                $allowed_file_types = ".jpg";

                if (($file_ext == $allowed_file_types) && ($filesize < 2000000)) {
                    // Rename file
                    $newfilename = "preview" . $file_ext;

                    if (file_exists($dir . "/media/" . $newfilename)) {
                        // file already exists error
                        echo "You have already uploaded this file.";
                    } else {
                        move_uploaded_file($_FILES["file"]["tmp_name"], $dir . "/media/" . $newfilename);
                        echo "File uploaded successfully.";
                    }

                } elseif (empty($file_basename)) {
                    // file selection error
                    echo "<div class=\"alert\">
                  <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                  <strong>Error!</strong> Please select a file to upload.
                </div>";
                    exit;
                } elseif ($filesize > 2000000) {
                    // file size error
                    echo "<div class=\"alert\">
                  <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                  <strong>Error!</strong> The file you are trying to upload is too large.
                </div>";
                    exit;
                } else {
                    // file type error
                    unlink($_FILES["file"]["tmp_name"]);
                    echo "<div class=\"alert\">
                  <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                  <strong>Error!</strong> Only .jpg Image type are allowed for upload.
                </div>";
                    exit;
                }
            } else {
                $root_image = "vendor/magento/theme-frontend-luma/media/preview.jpg";
                $destination_path = $dir . "/media/preview.jpg";
                $preview_image_copy = copy($root_image, $destination_path);
            }

            /*
             * Path copier Function
             */

            $main_paths = array_column($data, 'value');
            $mkyourfolder = $dir /*. "/" . $parent_theme_for_override */;
            if(!is_dir($mkyourfolder)){
                mkdir($mkyourfolder);
            }


            foreach ($main_paths as $data1) {

                $data2 = explode("/", $data1);
                array_pop($data2);
                $fulldatapath = implode("/",$data2);
                $remove_array = array('vendor', 'magento', 'view', 'frontend');
                $data3 = array_diff($data2, $remove_array);

                //if there is any directory selected or not
                if (sizeof($data3) != 0) {
                    $data6 = implode("/",$data3);
                    //function of converion text for example = module-theme-luma to Magento_ThemeLuma
                    if(strpos($data6,"-")){
                        $data7 = explode("-", $data6);
                        $data8 = array_map('ucfirst', $data7);
                        array_shift($data8);
                        //for files
                        $data10 = implode("",$data8);
                        $data11 = 'Magento_'.$data10;
                        $data12 = explode("/",$data11);
                        if (strstr($data11,'.')){array_pop($data12);}
                        $data4 = implode("/", $data12);
                        //for folders
                        $data9 = implode("", $data8);
                        $data5 = 'Magento_'.$data9;

                    }
                    else{
                        $data5 = implode("/",$data3);
                        if (strstr($data5,'.')){array_pop($data3);}
                        $data4 = implode("/",$data3);
                    }

                    //Directory Creation Function
                    mkdir_r($mkyourfolder."/", $data4);

                    //Data copy function for files
                    if(strstr($fulldatapath,'.')){
                        $name_of_file2 = explode("/",$fulldatapath);
                        $name_of_file = end($name_of_file2);
                        if(!file_exists($mkyourfolder."/".$data4."/".$name_of_file)){
                            fopen($mkyourfolder."/".$data4."/".$name_of_file, "w");
                            $path_of_file = $mkyourfolder."/".$data4."/".$name_of_file;
                            copy($fulldatapath, $path_of_file);
                        }

                    }
                    //Data copy function for Complete Folders
                    else{
                        //if(!is_dir($mkyourfolder."/".$data4)) {
                            $path_of_file = $mkyourfolder . "/" . $data4;
                            recurse_copy($fulldatapath, $path_of_file);
                        //}
                    }
                }
                else {
                    echo "<div class=\"alert\">
                              <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                              <strong>Warning! </strong> No directories Selected!.
                            </div>";
                }
            }
            //Message after Image Upload operation Complete
            echo "<div class=\"alert\" style='background-color: green;'>
                  <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
                  <strong>Successful! </strong> Thanks For using This Script!.
                </div>";

    }

    /*
    * Directory Functions
    */

    if(isset($_POST['submit']))
    {
        $direc = $_POST['submit'];
        if(is_dir($direc)  and $direc != "" and !strstr($direc, '.')){
            copyfile($direc);
        }
        elseif (strstr($direc, '..')){
          $data1 = $_POST['submit'];
          $data2 = explode("/", $data1);
          array_pop($data2);
          array_pop($data2);
          $data = implode("/", $data2);
          copyfile($data);
        }
        else{
            ?>
            <option value="<?php echo $direc."/removable"; ?>"><?php echo $direc."--Selected"; ?></option>
            <option value="<?php echo $direc."/.."; ?>" onclick="dataget('<?php echo $direc."/.."; ?>',this);"><?php echo ".."; ?></option>
            <?php
        }
    }
    elseif(isset($_POST['firstform']))
    {
        ?>
        <input type="button" id="add_row" value="Add Another File" onclick="addrow();" style="width: 12%;"/>
        <?php
        copyfile("");
    }
    //If user Click On Add row Function
    if(isset($_POST['addrow'])){
        copyfile("");
    }

    /*
     * function to Create frontend Selection element
     */
function copyfile($dirs = "")
{
    if($dirs != "")
    {
        $dir = $dirs;
    }
    else
    {
        $dir = "../vendor/magento";
    }
    $files2 = scandir($dir);
    $file = array_diff($files2, ["."]);
    //$file = array_filter($file3, function ($var) { return (stripos($var, 'module') !== false); });
    //$file = $files2;
    //$div = explode("/",$dir);
    //$pathdiv = implode("", $div);
    if(sizeof($file) > 0)
    {
        ?>
        <div class="select_elements" style="padding: 6px 0px;">
            <label for="select">Select dir</label>
            <select name="pathsheet[]" id="<?php echo rand(); ?>">
                <?php
                foreach ($file as $key => $value)
                {
                    ?>
                    <option value="<?php echo $dir.'/'.$value; ?>" onclick="dataget('<?php echo $dir.'/'.$value; ?>',this);"><?php echo $dir.'/'.$value; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <?php
    }
}

    /*
     * function to copy entire directory selected
     */
function recurse_copy($src,$dst) {

    $dir = opendir($src);
    @mkdir($dst);
    while(false !== ( $file = readdir($dir)) ) {
        if (( $file != '.' ) && ( $file != '..' )) {
            if ( is_dir($src . '/' . $file) ) {
                recurse_copy($src . '/' . $file,$dst . '/' . $file);
            }
            else {
                copy($src . '/' . $file,$dst . '/' . $file);
            }
        }
    }
    closedir($dir);
}
/*
 * Create directories in Directories
 */
function mkdir_r($dir, $dirName, $rights=0777){
    $dirs = explode('/', $dirName);
    foreach ($dirs as $part) {
        $dir.=$part.'/';
        if (!is_dir($dir) && strlen($dir)>0)
            mkdir($dir, $rights);
    }
}
?>

