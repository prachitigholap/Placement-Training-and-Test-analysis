<?php
include_once 'database.php';
include 'demo.html';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="examp.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>   
<div class="col-lg-9 container">
            <div class="card">

                <div class="card-header">
                    
                </div>


                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover table-striped">
  
  <thead>
      <tr>
          <th scope="col">Test Number</th>
          <th scope="col">Test Name</th>
          <th scope="col">Test Subject</th>
          <th scope="col">Difficulty Level</th>
          <th scope="col">Duration</th>
          <th scope="col">Due Date</th>
          <th scope="col">Total Marks</th>
          <th scope="col"></th>
          

      </tr>
  </thead>
  <tbody>
  <?php
      $count=0;
      $res=mysqli_query($con, "select * from add_tests");
      while($row=mysqli_fetch_array($res))
      { 
          $id = $row['id'];
          $total=$row['total'];
          $totalmark=$row["testmarks"];
          $totalm=$row["testmarks"];
          $count=$count+1;
          $user_date = $row["testdate"];
          $Currentdate=date("Y M D");
          ?>
          <tr>
              <th scope="row">
                  <?php echo $count; ?>
              </th>
              <td>
                  <?php echo $row["testname"];?></td>
              <td><?php echo $row["testsubject"];?></td>
              <td><?php echo $row["testdifficulty"];?></td>
              <td><?php echo $row["testtime"];?></td>
              <td><?php echo $row["testdate"];?></td>
              <td><?php echo $row["testmarks"];?></td>
              
              <td>  
              <?php  
              $email='xyz@gmail.com'; 
              $q12=mysqli_query($con,"SELECT score FROM history WHERE id='$id' AND email_id='$email'" )or die('Error98');
              $rowcount=mysqli_num_rows($q12);	
              if($rowcount == 1){
                  echo '<a href="result.php?id='.$id.'&tm='.$totalmark.'" class="btn sub1" style="color:black;margin:0px;background:#a3a375"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1"><b>View Result</b></span></a></b></center></td></tr>';
              }
              else
                    {
                        {
                            if (strtotime(date("Y-m-d")) > strtotime( $user_date))
                            {
                                echo'<a  href="" class="btn sub1" style="color:black;margin:0px;background: #ff1a1a"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Expired</b></span></a> ';
                               
                            }
                            else{
                                echo'<a  href="show_test.php?id='.$id.'&question_no=1&t='.$total.'" class="btn sub1" style="color:black;margin:0px;background:#198754"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Start</b></span></a> ';
                                
                            }
        
                          }
                        }
        

                 
              ?>
           </td>
          </tr>

          <?php
      }

      ?>

  </tbody>
                    </table>
                </div>

            </div>
