

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>
     <script src="js/jquery.js"></script>
    <!-- <script src="//code.jquery.com/jquery-1.10.2.min.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/tableExport.js"></script>
    <script type="text/javascript" src="js/jquery.base64.js"></script>
    <script type="text/javascript" src="js/jspdf/libs/sprintf.js"></script>
    <script type="text/javascript" src="js/jspdf/jspdf.js"></script>
    <script type="text/javascript" src="js/jspdf/libs/base64.js"></script>
    <script type="text/javascript">
        window.alert = function(){};
        var defaultCSS = document.getElementById('bootstrap-css');
        function changeCSS(css){
            if(css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />'); 
            else $('head > link').filter(':first').replaceWith(defaultCSS); 
        }
        $( document ).ready(function() {
          var iframe_height = parseInt($('html').height()); 
          window.parent.postMessage( iframe_height, 'http://bootsnipp.com');
        });

        function delme(x)
        {
          $('#myModal').modal('toggle');
          $("#confirm").click(function(){
            var address = 'delete.php?i='+x;
            // alert(address);
            window.location = address;
          });
        }
    </script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Soding</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="createtask.php">Create Task</a></li>
            <li><a href="viewtask.php">View Task</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
<br><br><br><br><br>


<?php

include('functions.php'); 
include('connection.php');


    // $errorAlert=$packagename=$year=$hijri=$amount="";
    // get results from database
    $query = "SELECT * FROM `task`";
    $result = mysqli_query($conn,$query)

    or die(mysqli_error());

    ?>
    <div>
   
<style>

   body {
    background-color: #fff;
    font-size:14px;
    font-weight: bold;
    font-family:verdana;
        }

h1 {
    background-color: #34495E;
    color: white;
    }
input[type=text] {
    background-color: #42d7f4;
    color: black;
    font-size:16px;
    font-weight: bold;
    font-family:verdana;
                 }
</style>

  </div>
    <div class="container">
        <div class="row">
            <?php
                if (isset($_GET['alert'])) {
                    if ($_GET['alert'] == "success") { ?>
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <h4><strong>Success! </strong> সঠিক ভাবে সংরক্ষিত হয়েছে</h4>
                        </div> <?php
                    }
                }
                elseif (isset($_GET['edit'])) {
                    if ($_GET['edit'] == "success") { ?>
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <h4><strong>Success! </strong> সঠিক ভাবে সংরক্ষিত হয়েছে</h4>
                        </div> <?php
                    }
                }
                elseif (isset($_GET['delete'])) {
                    if ($_GET['delete'] == "success") { ?>
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <h4><strong>Success! </strong> ডিলিট সম্পন্ন হয়েছে</h4>
                        </div> <?php
                    }
                }
            ?>
        </div>

 <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">তথ্যটি মুছে ফেলতে আপনি কি নিশ্চিত ?</h4>
              </div>
              <div class="modal-body">
                <p>If yes, Press Confirm.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="confirm" data-dismiss="modal">Confirm</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <div class="row">            
            <div class="pull-right">                
               
            </div>
        </div>

      
        
        <div class="row">
            <div class="panel panel-primary filterable">
                <div class="panel-heading">
                    <h3 class="panel-title">Group Leader Info</h3>
                    <div class="pull-right">
                       
                    </div>
                </div>
                <table class="table table-bordered" id="groups">
                    <thead>
                       
                        <tr class="tcw">
                            <th>ID</th>
                            <th> Name</th>
                            <th>Description</th>
                            <th>Created Date</th>
                            <th>Last Updated</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if(mysqli_num_rows($result)>0)
                        {
                            while($row = mysqli_fetch_array( $result )) {
                                // echo out the contents of each row into a table
                                echo "<tr>";
                                    echo '<td>' . $row['id'] . '</td>';
                                    echo '<td>' . $row['name'] . '</td>';
                                    echo '<td>' . $row['des'] . '</td>';
                                    echo '<td>' . $row['cdate'] . '</td>';
                                    echo '<td>' . $row['udate'] . '</td>';
                                    ?>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
                                            <span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <li><a href="edit.php?g=<?php echo $row['id']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Edit</a></li>
                                                <li><a href="#" onClick="delme(<?php echo $row['id']; ?>);"><i class="fa fa-trash" aria-hidden="true"></i>  Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                <tr> <?php
                            }
                        }
                        else
                            echo "<td colspan='6'>No Data</td>";
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    /*
    Please consider that the JS part isn't production ready at all, I just code it to show the concept of merging filters and titles together !
    */
    $(document).ready(function(){
        $('.filterable .btn-filter').click(function(){
            var $panel = $(this).parents('.filterable'),
            $filters = $panel.find('.filters input'),


            $tbody = $panel.find('.table tbody');
            if ($filters.prop('disabled') == true) {
                $filters.prop('disabled', false);
                $filters.first().focus();
            } else {
                $filters.val('').prop('disabled', true);
                $tbody.find('.no-result').remove();
                $tbody.find('tr').show();
            }
        });



        $('.filterable .filters input').keyup(function(e){
            /* Ignore tab key */
            var code = e.keyCode || e.which;
            if (code == '9') return;
            /* Useful DOM data and selectors */
            var $input = $(this),
            inputContent = $input.val().toLowerCase(),
            $panel = $input.parents('.filterable'),
            column = $panel.find('.filters th').index($input.parents('th')),
            $table = $panel.find('.table'),
            $rows = $table.find('tbody tr');
            /* Dirtiest filter function ever ;) */
            var $filteredRows = $rows.filter(function(){
                var value = $(this).find('td').eq(column).text().toLowerCase();
                return value.indexOf(inputContent) === -1;
            });
            /* Clean previous no-result if exist */
            $table.find('tbody .no-result').remove();
            /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
            $rows.show();
            $filteredRows.hide();
            /* Prepend no-result row if all rows are filtered */
            if ($filteredRows.length === $rows.length) {
                $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
            }
        });
    });
    </script>

   
        </ul>
    </div>

