<?php
    $backgroundImage = "./img/sea.jpg";
    
     if(isset($_GET['keyword']) && !empty($_GET['keyword']))
    {
        $keyword = $_GET['keyword'];
        include 'api/pixabayAPI.php';
        echo "<h1> You searched for </h1>";
        echo "<div id = 'word'>";
        echo  $_GET['keyword'];
        echo "</div>";
        $imageURLs = getImageURLs($_GET['keyword'], $_GET['layout']);
        $backgroundImage = $imageURLs[array_rand($imageURLs)];
    }
    else if(isset($_GET['category']) && !empty($_GET['category']))
    {
        echo "<h1> You searched for </h1>";
        echo "<div id = 'word'>";
            echo  $_GET['category'];
        echo "</div>";
        include 'api/pixabayAPI.php';
        $imageURLs = getImageURLs($_GET['category'], $_GET['layout']);
        $backgroundImage = $imageURLs[array_rand($imageURLs)];
    }
    else
    {
        $backgroundImage = "img/sea.jpg";
            
    }
        
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8"/>
        <title>Image Carousel</title>
        <link href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel = "stylesheet">
        <style>
            @import url("css/styles.css");
            body{
                background-image:url('<?=$backgroundImage?>');
            }
        </style>
    </head>
    
    <body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        </br></br>
        
        <?php
            
            
            if(!isset($imageURLs))
            {
                echo "<h2> You must type a keyword or select a category </h2>";
            
                
            }
            else 
            {
                //Display Carousel Here
                
                //do 4.2
                //when turned in pics need to be appropriately randomized
                
                
            
        
        ?>
        
        
        <div id  = "carousel-example-generic" class = "carousel slide" data-ride = "carousel" style = 'width:400px'>
            <ol class ="carousel-indicators">
                
            
            <?php
                for($i = 0; $i <7; $i++)
                {
                    echo "<li data-target ='#carousel-example-generic' data-slide-to='$i'";
                    echo ($i == 0) ? "class ='active'" : "";
                    echo "></li>";
                }
                ?>
            </ol>
            <div class = "carousel-inner" role = "listbox">
                
                <?php
                    for($i = 0; $i < 7; $i++)
                    {
                        do{
                            $randomIndex = rand(0,count($imageURLs));
                        }while(!isset($imageURLs[$randomIndex]));
                        echo '<div class="item ';
                        echo ($i ==0) ? "active" : "";
                        echo '">';
                        echo '<img src = "' . $imageURLs[$randomIndex] . '" width = "400">';
                        echo '</div>';
                        unset($imageURLs[$randomIndex]);
                    }
            }
                ?>
            </div>    
           
            
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
      
        </br></br>
        
        <form>
                <input type ="text" name ="keyword" placeholder="keyword" value="<?=$_GET['keyword']?>"/>
                <input type ="submit" value = "Search"/></br></br>
                
                  <select name = "category" id = "category1">
                      <option value = "">Select One</option>
                      <option value="Galaxies">Galaxies</option>
                      <option value="Love">Love</option>
                      <option value="Dog">Dog</option>
                      <option value="Cupcake">Cupcake</option>
                      <option value = "Flower">Flower</option>
                </select> </br></br>
                
                <input type = "radio" id = "lhorizontal" name = "layout" value = "horizontal">
                <label for = "Horizontal"></label><label for="lhorizontal"> Horizontal</label> </br>
                <input type = "radio" id = "lvertical" name = "layout" value = "vertical">
                <label for = "Vertical"></label><label for="lvertical">Vertical</label>
            </form>
        
        <br/>
        <br/>
        
    </body>
</html>