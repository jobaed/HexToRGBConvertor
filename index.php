<?php

class RGB
{

    private $color;
    private $red;
    private $green;
    private $blue;

    function __construct($colorCode)
    {
        $this->color = ltrim($colorCode, '#');
        $this->parseColor();
    }
    function getRGB()
    {
        return array($this->red, $this->green, $this->blue);
    }
    function getRed()
    {
        return $this->red;
    }
    function getGreen()
    {
        return $this->green;
    }
    function getBlue()
    {
        return $this->blue;
    }

    function readRGB()
    {
        echo "Red = {$this->red}, Green = {$this->green}, Blue = {$this->blue}";
    }
    function showRGB()
    {
        if ($this->color) {
            echo "({$this->red}, {$this->green}, {$this->blue})";
        } else {
            echo "(0, 0, 0)";
        }
    }

    function parseColor()
    {
        if ($this->color) {
            list($this->red, $this->green, $this->blue) = sscanf($this->color, '%02x%02x%02x');
        } else {
            list($this->red, $this->green, $this->blue) = array(0, 0, 0);
        }
    }
}


if (isset($_POST['submit'])) {
    $hex = $_POST['hex'];

    if($hex[0] != "#"){
        echo "<script>alert('Invalid Code')</script>";
    }

}

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hex Code to RGB Converter</title>

    <style>
        body {
            background-color: <?php if (isset($hex)) echo $hex ?>;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="w-50 mx-auto mt-5">
            <div class="bg-dark w-100 p-5 rounded shadow">
                <h2 class="text-light mb-3">Hex to RGB Convator</h2>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                    <div class="mb-3 ">
                        <input type="text" name="hex" value="<?php if (isset($hex)) echo $hex ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter Your Hex Code ">
                        <div id="emailHelp" class="form-text">Include # Before Hex Code</div>
                    </div>
                    <input type="submit" name="submit" value="Convert" class="btn btn-primary btn-sm">
                </form>

                <div class="text-light">
                    <h4 class="text-light mt-4 mb-3">RGB Value</h4>
                    <hr class="text-light">
                    <h6 class="bg-light text-dark px-3 py-2">
                        <?php
                        if (isset($hex)) {
                            $obj = new RGB($hex);
                            $obj->showRGB();
                        }else{
                            echo "(0,0,0)";
                        }


                        ?>
                    </h6>
                    <p>
                        <?php
                            if(isset($hex)){
                                $obj->readRGB();
                            }else{
                                echo "(Red = 0, Green = 0, Blue = 0)";
                            }
                        ?>
                    </p>

                </div>

            </div>
        </div>
    </div>


</body>

</html>