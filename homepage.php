<html>
<head>
    <title>
        User's Home Page
    </title>
    <link rel="stylesheet" href="UHomepage2.css">
    <style>
        table{
            border:1px solid white;
        }
        td{
            text-align:center;
        }
        tr{
            outline:thin solid;
        }
        
    </style>
</head>

<body style="color:white">
<form action="" method="GET">
    <div class="topbox">
        <b id="websiteName">Bibliophile</b>
        <input type="text" value="<?php if(isset($_GET['search'])){ echo $_GET['search'];}?>" name="search" id="searchBar" placeholder="Search Data">
        <button type="submit" id="searchbtn"><img src="search.png" id="searchimg"></button>
        <a class="link" href="profile.html">Profile</a>
    </div>
    </form>
<br><br><br><br><br>
    <?php
    // Include the database configuration file
    include 'dbconnection.php';

    // Get images from the database
    $query = "SELECT * FROM upload";
        $result = mysqli_query($conn, $query);
        if (isset($_GET['search'])) {
            # code...
            $filtervalue = $_GET['search'];
            $query = "SELECT * from upload where concat(bookName,price,author,genre) like '%$filtervalue%'";
            $search = mysqli_query($conn, $query);
        if($search->num_rows > 0){
            ?>      
            <a href="homepage.php">Home</a>
            <?php
            # code...
            while ($row = mysqli_fetch_assoc($search)) {
                $id = $row['id'];
                $imageURL = 'uploads/'.$row["bookCover"];
                $bookName = $row['bookName'];
                $price = $row['price'];
                $author = $row['author'];
?>
<form method="GET">
<table>
    <tr>
            <td><a href="order.php?id=<?php echo $id; ?>"><img class="book" src="<?php echo $imageURL; ?>" alt="" />
            <p class="title"><?php echo $bookName ?></p>
            <p class="title"><?php echo $author ?></p>
            <p class="title">₱<?php echo $price ?></p></a></td>
    </tr>
</table>
            </form>
<?php
            
        }
    }
        else{
?>
            <p>No Record/s Found.</p>
<?php
        }
    }
    else if($result -> num_rows > 0){
        {
        $query1 = "SELECT * from upload where concat(genre) like 'Comedy'";
        $comedy = mysqli_query($conn, $query1);
        $query2 = "SELECT * from upload where concat(genre) like 'Romance'";
        $romance = mysqli_query($conn, $query2);
        $query3 = "SELECT * from upload where concat(genre) like 'Horror'";
        $horror = mysqli_query($conn, $query3);
        $query4 = "SELECT * from upload where concat(genre) like 'Thriller'";
        $thriller = mysqli_query($conn, $query4);
        $query5 = "SELECT * from upload where concat(genre) like 'Self Help'";
        $selfHelp = mysqli_query($conn, $query5);
        $query6 = "SELECT * from upload where concat(genre) like 'Cookbook'";
        $cookbook = mysqli_query($conn, $query6);
        $query7 = "SELECT * from upload where concat(genre) like 'Fantasy'";
        $fantasy = mysqli_query($conn, $query7);
        ?>     
<table class="books">
    <?php
            while ($row = mysqli_fetch_assoc($comedy)) {
                $id = $row['id'];
                $imageURL = 'uploads/'.$row["bookCover"];
                $bookName = $row['bookName'];
                $price = $row['price'];
                $author = $row['author'];
?>
    <br>
    <tr><td>Comedy</td></tr>
    <form method="GET">
    <tr>
        <td><a href="order.php?id=<?php echo $id; ?>"><img class="book" src="<?php echo $imageURL; ?>" alt="" />
        <p class="title"><?php echo $bookName ?></p>
        <p class="title"><?php echo $author ?>
        </p><p class="title">₱<?php echo $price ?></p></a></td>
    </tr>
            </form>
<?php
        }
        ?>
    <?php
            while ($row = mysqli_fetch_assoc($romance)) {
                $id = $row['id'];
                $imageURL = 'uploads/'.$row["bookCover"];
                $bookName = $row['bookName'];
                $price = $row['price'];
                $author = $row['author'];
?>
<tr><td>Romance</td></tr>
<form method="GET">
    <tr>
        <td><a href="order.php?id=<?php echo $id; ?>"><img class="book" src="<?php echo $imageURL; ?>" alt="" />
        <p class="title"><?php echo $bookName ?></p>
        <p class="title"><?php echo $author ?></p>
        <p class="title">₱<?php echo $price ?></p></a></td>
    </tr>
            </form>
<?php
            }
        ?>
        <?php
            while ($row = mysqli_fetch_assoc($horror)) {
                $id = $row['id'];
                $imageURL = 'uploads/'.$row["bookCover"];
                $bookName = $row['bookName'];
                $price = $row['price'];
                $author = $row['author'];
?>
<tr><td>Horror</td></tr>
<form method="GET">
    <tr>
            <td><a href="order.php?id=<?php echo $id; ?>"><img class="book" src="<?php echo $imageURL; ?>" alt="" />
            <p class="title"><?php echo $bookName ?></p>
            <p class="title"><?php echo $author ?></p>
            <p class="title">₱<?php echo $price ?></p></a></td>
    </tr>
            </form>
<?php
            }
            ?>
        
        <?php
                while ($row = mysqli_fetch_assoc($thriller)) {
                    $id = $row['id'];
                    $imageURL = 'uploads/'.$row["bookCover"];
                    $bookName = $row['bookName'];
                    $price = $row['price'];
                    $author = $row['author'];
    ?>
    <tr><td>Thriller</td></tr>
    <form method="GET">
        <tr>
                <td><a href="order.php?id=<?php echo $id; ?>"><img class="book" src="<?php echo $imageURL; ?>" alt="" />
                <p class="title"><?php echo $bookName ?></p>
                <p class="title"><?php echo $author ?></p>
                <p class="title">₱<?php echo $price ?></p></a></td>
        </tr>
                </form>
    <?php
                }
            
            ?>
        <?php
                while ($row = mysqli_fetch_assoc($selfHelp)) {
                    $id = $row['id'];
                    $imageURL = 'uploads/'.$row["bookCover"];
                    $bookName = $row['bookName'];
                    $price = $row['price'];
                    $author = $row['author'];
    ?>
    <tr><td>Self Help</td></tr>
    <form method="GET">
        <tr>
                <td><a href="order.php?id=<?php echo $id; ?>"><img class="book" src="<?php echo $imageURL; ?>" alt="" />
                <p class="title"><?php echo $bookName ?></p>
                <p class="title"><?php echo $author ?></p>
                <p class="title">₱<?php echo $price ?></p></a></td>
        </tr>
                </form>
    <?php
                }
            
            ?>
            
        <?php
                while ($row = mysqli_fetch_assoc($cookbook)) {
                    $id = $row['id'];
                    $imageURL = 'uploads/'.$row["bookCover"];
                    $bookName = $row['bookName'];
                    $price = $row['price'];
                    $author = $row['author'];
    ?>
    <tr><td>Cookbook</td></tr>
    <form method="GET">
        <tr>
                <td><a href="order.php?id=<?php echo $id; ?>"><img class="book" src="<?php echo $imageURL; ?>" alt="" />
                <p class="title"><?php echo $bookName ?></p>
                <p class="title"><?php echo $author ?></p>
                <p class="title">₱<?php echo $price ?></p></a></td>
        </tr>
                </form>
    <?php
                }
            
            ?>
        <?php
                while ($row = mysqli_fetch_assoc($fantasy)) {
                    $id = $row['id'];
                    $imageURL = 'uploads/'.$row["bookCover"];
                    $bookName = $row['bookName'];
                    $price = $row['price'];
                    $author = $row['author'];
    ?>
    <tr><td>Fantasy</td></tr>
    <form method="GET">
        <tr>
                <td><a href="order.php?id=<?php echo $id; ?>"><img class="book" src="<?php echo $imageURL; ?>" alt="" />
                <p class="title"><?php echo $bookName ?></p>
                <p class="title"><?php echo $author ?></p>
                <p class="title">₱<?php echo $price ?></p></a></td>
        </tr>
                </form>
        
    <?php
                }
        }
    }
    else{ 
?>
</table>
    <p>No image(s) found...</p>
<?php 
    } 
?>

    
</body>

</html>