<?php include_once ("./includes/connection.php"); ?>
<?php if (isset($_SESSION['username'])) {
} else {
    echo "<meta http-equiv=\" refresh\" content=\"0; url=index.php\">";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher</title>
</head>

<body>
    <div class="flex flex-col sm:flex-row h-screen">
        <?php include_once ("./includes/header.php"); ?>
        <div class="flex-1 overflow-y-auto">
            <div class="mt-5 m-auto max-w-[800px] shadow-lg border-[1px] rounded-lg">
                <div class="p-6 px-8">
                    <?php
                    $qID = @$_GET['id'];
                    //Getting The Question
                    $sql = "SELECT * FROM `questions` WHERE `id`='$qID'";
                    $query = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($query);
                    $id = $row['id'];
                    $qmedia = $row['media'];
                    if($qmedia == "") {
                        $size2 = "hidden";
                    } else {
                        $size2 = "w-full";
                    }
                    $question = $row['question'];
                    //End Of Getting The Question
                    
                    //Getting The Answer
                    $sql2 = "SELECT * FROM `answers` WHERE `qID`='$id'";
                    $query2 = mysqli_query($conn, $sql2);
                    $rows = mysqli_fetch_assoc($query2);
                    $answer = $rows['answer'];
                    $amedia = $rows['media'];
                    if($amedia == "") {
                        $size = "hidden";
                    } else {
                        $size = "w-full";
                    }
                    $categoryID = $rows['categoryID'];
                    //End Of Getting The Answer
                    
                    //Getting The Category
                    $sql3 = "SELECT * FROM `config_subject` WHERE id='$categoryID'";
                    $query3 = mysqli_query($conn, $sql3);
                    $rowss = mysqli_fetch_assoc($query3);
                    $value = $rowss['value'];
                    //End Of Getting The Category
                    ?>
                    <a href="teacher.php" class="border-[1px] py-2 px-4 rounded-full font-semibold"><i class="bi bi-arrow-left"></i> Back To Dashboard</a>
                    <br /><br />
                    <span class="font-regular text-xs text-gray-400">Home <i class="bi bi-chevron-right"></i> <?=$value?></span>
                    <h3 class="mt-4 font-bold text-xl">Question</h3>
                    <div class="w-full mt-2">
                    <img src="../uploads/<?=$qmedia?>" class="<?=$size2?> mt-4 mb-4">    
                    <?=$question?>
                    </div>
                    <div class="mt-4 bg-green-100 rounded-sm p-2 border-[1px] border-green-200">
                    <img src="../answer_uploads/<?=$amedia?>" class="<?=$size?> mt-4 mb-4">    
                    <?=$answer?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>