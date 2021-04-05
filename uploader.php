<? 

function getPaths()
{
    $tags = array();
    $dir = getcwd() . "/images";
    $paths = glob($dir . '/*' , GLOB_ONLYDIR);
    return $paths;
}


// Get tags
function getTags($paths)
{
    foreach ($paths as $path) {
        foreach ($paths as $path) {
            $dirs = explode("/",$path);
            $tags_dirs = end($dirs);
            $tags_arr = explode("_",$tags_dirs); 
            for($i = 0; $i < count($tags_arr); $i++)
            {
                if($tags_arr[$i] != "wallpaper" )
                {
                    $tags[] = $tags_arr[$i];
                }
            }
        }
        return $tags;
    }
    
}



function getImagesPaths($path)
{
    $files = scandir($path);
    $paths = array();
    foreach($files as $file)
    {
        $paths[] = $path . "/" . $file; 
    }
    return array_slice($paths,2);
}

function readImage($path)
{
    $fp = fopen($path,'rb');
    $content = fread($fp,filesize($path));
    fclose($fp);
    // $content = imagecreatefrompng($path);
    return $content;
}

function getPdo()
{
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "wallpaperbg";
    $pdo = new PDO('mysql:host='.$host.';dbname='.$db, $user, $pass);   
    return $pdo; 
}



function reduce_quality($blob,$nwidth = 640,$nheight = 480)
{
    $data = $blob;
    $img = imagecreatefromstring($data);
    $width = imagesx($img);
    $height = imagesy($img);
    $thumb = imagecreatetruecolor($nwidth,$nheight);
    imagecopyresized($thumb,$img,0,0,0,0,$nwidth, $nheight, $width, $height);
    
    ob_start (); 

    imagejpeg($thumb);
    $image_data = ob_get_contents ();

    ob_end_clean (); 
    return base64_decode(base64_encode($image_data));
}


// Insert image in db
function insertBlob($blob,$tags)
{

    // Pdo and sql injection preparing
    $pdo = getPdo();
    $sql = "INSERT INTO images_db(tags, image, compressed_image) 
    VALUES(:tags,:image,:compressed_image)";
    $stmt = $pdo->prepare($sql);
    // Get tags
    $tags = implode(" ",$tags);
    $stmt->bindParam(':tags', $tags,PDO::PARAM_STR,0);
    $comp_blob = reduce_quality($blob,1280 ,740);
    $stmt->bindParam(':image', $blob, PDO::PARAM_LOB);
    $stmt->bindParam(':compressed_image', $comp_blob , PDO::PARAM_LOB);
    $stmt->execute();
    return $stmt->errorInfo();
}

// Insert tag in db
function insertTag($tag)
{
    $pdo = getPdo();
    $sql = "INSERT IGNORE INTO tags_db(tag) 
    VALUES(:tag)"; 
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':tag',$tag);
    $stmt->execute();
    return $stmt->errorInfo();
}

function main()
{
    $paths = getPaths();
    $tags = getTags($paths);
    // Insert tags
    foreach($tags  as $tag)
    {
        insertTag($tag);
    }

    // Insert images
    foreach($paths as $path)
    {
        $images = getImagesPaths($path);
        foreach($images as $image)
        {
            $blob = readImage($image);
            insertBlob($blob,getTags([$path]));
        }
    }
}
main();

?>
