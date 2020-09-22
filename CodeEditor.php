<?php
  if(isset($_POST['RequestNewFlie'])) {
    $fileNameing = $_POST["newFileRequest"];
    $myfile = fopen($fileNameing, "w") or die("Unable to open file!");
    fclose($myfile);
  }
  if(isset($_POST['RequestNewFolder'])) {
    mkdir($_POST['newFolderRequest']);
  }
  if(isset($_POST['RequestDelete'])) {
    if (unlink($_POST['DeleteRequest'])) {  
      echo "<script>alert('Success');</script>";
    }  
    else {  
      echo "<script>alert('Please Try Again (404)');</script>";
    }
  }
  if(isset($_POST['save'])) {
    if(isset($_GET['file'])) {

      $nameFile = $_GET['file'];
      $sourceCode = $_POST['textareaCode'];

      $myfiles = fopen($nameFile, "w") or die("Unable to open file!");
      fwrite($myfiles, $sourceCode);
      fclose($myfiles);
    } else {
      echo "<script>alert('ERROR (404)');</script>";
    }
  }
  if(isset($_GET['searchFile'])) {
    if(isset($_GET['folder'])) {
      $myfile = fopen($_GET["folder"] . $_GET['searchFile'], "w") or die("Unable to open file!");
      fclose($myfile);
      if( !copy($_GET['searchFile'], $_GET['folder'] . $_GET['searchFile']) ) {  
            header("Location: html/CodeEditor.php");
        }  
        else {  
          header("Location: html/CodeEditor.php");
        }  
    } else {
      header("Location: ?dir=.");
    }
  } else {
    if(isset($_GET['dir'])) {
      $dir    = $_GET['dir'];
      $files1 = scandir($dir);
      $files2 = scandir($dir, 1);
    } else {
      header("Location: ?dir=.");
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
      #editor {
        position: absolute;
        right: 0;
        width: 80vw;
        height: 95vh;
        bottom: 0;
      } 
      .sidebar {
        position: absolute;
        color: #fff !important;
        left: 0;
        background: #282a36;
        width: 20vw;
        height: 100vh;
        overflow: scroll;
      }
      ::-webkit-scrollbar {
        width: 5px;               /* width of the entire scrollbar */
      }
      ::-webkit-scrollbar-track {
        background: #44475a;        /* color of the tracking area */
      }
      ::-webkit-scrollbar-thumb {
        background-color: blue;
        border-radius: 20px;
      }
      .folders {
        font-weight: bold;
        margin-left: 1%;
      }
      .navigation {
        position: absolute;
        top: 0;
        right: 0;
        background: #252525;
        width: 80vw;
        height: 5vh;
      }
      .product {
        cursor: grab;
        transition: 2s;
        margin-left: 10px;
      }
      .product:before {
        content: '';
        transition: 2s;
      }
      .product::before:hover {
        border-bottom: 2px solid #fff;
        width: 50%;
      }
      a {
        cursor: alias;
      }
      .dropdown-menu {
        color: black !important;
      }
    </style>
    <title>MySite</title>
  </head>
  <body>
    <div>
      <div class="sidebar">
        <span class="folders" style="border-bottom: 1px solid #fff;">
          <i class="fa fa-folder"></i> Folders
        </span>
        <br />
        <br />
        <span class="folders">Make new</span><br />
        <form method="POST">
          <textarea name="textareaCode" class="TempArea" style="display: none;"></textarea>
          <button name="save" type="submit"><i class="folders fa fa-save"></i>Save</button> <br />
        </form>
        <a data-toggle="modal" data-target="#newFile"><i class="folders fa fa-file"></i> New</a> <br />
        <!-- Modal -->
        <div class="modal fade" id="newFile" tabindex="-1" aria-labelledby="newFileLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="newFileLabel" style="color: black !important;">new Files</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" style="color: black !important;">
                <form method="POST">

                <div class="input-group mb-3">
                  <input type="text" name="newFileRequest" class="form-control" placeholder="New File" aria-label="Recipient's username" aria-describedby="button-addon2">
                  <div class="input-group-append">
                    <button name="RequestNewFlie" class="btn btn-outline-secondary" type="submit" id="button-addon2">Make</button>
                  </div>
                </div>

                </form>
              </div>
            </div>
          </div>
        </div>
        <a data-toggle="modal" data-target="#newFolder"><i class="folders fa fa-folder"></i> Folder</a> <br />
        <!-- Modal -->
        <div class="modal fade" id="newFolder" tabindex="-1" aria-labelledby="newFolderLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="newFolderLabel" style="color: black !important;">new Folder</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" style="color: black !important;">
                <form method="POST">

                <div class="input-group mb-3">
                  <input type="text" name="newFolderRequest" class="form-control" placeholder="new Folder" aria-label="Recipient's username" aria-describedby="button-addon2">
                  <div class="input-group-append">
                    <button name="RequestNewFolder" class="btn btn-outline-secondary" type="submit" id="button-addon2">Make</button>
                  </div>
                </div>

                </form>
              </div>
            </div>
          </div>
        </div>
        <br />
        <a data-toggle="modal" data-target="#DeleteFolder"><i class="folders fa fa-trash"></i> Delete</a> <br />
        <!-- Modal -->
        <div class="modal fade" id="DeleteFolder" tabindex="-1" aria-labelledby="DeleteFolderLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="DeleteFolderLabel" style="color: black !important;">Delete (File/Folder)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" style="color: black !important;">
                <form method="POST">

                <div class="input-group mb-3">
                  <input type="text" name="DeleteRequest" class="form-control" placeholder="Delete (File/Folder)" aria-label="Recipient's username" aria-describedby="button-addon2">
                  <div class="input-group-append">
                    <button name="RequestDelete" class="btn btn-outline-secondary" type="submit" id="button-addon2">Make</button>
                  </div>
                </div>

                </form>
              </div>
            </div>
          </div>
        </div>
        <br />
        <div class="contentNULL">

        </div>
      </div>
      <div>
        <div class="navigation">
        <div class="dropdown">
            <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Menu
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <div class="container">
              <div class="row">
                <div class="col-sm">
                  <a class="product" onclick="html();" style="color: red;">
                    <i class="fab fa-html5"></i> <span style="color: black !important;">HTML</span>
                  </a>
                </div>
                <div class="col-sm">
                  <a class="product" onclick="css();" style="color: blue;">
                    <i class="fab fa-css3"></i> <span style="color: black !important;">CSS</span>
                  </a>
                </div>
                <div class="col-sm">
                  <a class="product" onclick="js();" style="color: black;">
                    <i class="fab fa-js"></i> <span style="color: #black !important;">Javascript</span>
                  </a>
                </div>
                <div class="col-sm">
                  <a class="product" onclick="php();" style="color: purple;">
                    <i class="fab fa-php"></i> <span style="color: purple; !important">php</span>
                  </a>
                </div>
                <div class="col-sm">
                  <a class="product" onclick="cpp();" style="color: yellow;">
                  <i class="fab fa-cuttlefish"></i><i class="fas fa-plus fa-xs"></i><i class="fas fa-plus fa-xs"></i> <span style="color: black !important;">C++</span>
                  </a>
                </div>
                <div class="col-sm">
                  <a class="product" onclick="cPrograming();" style="color: yellow;">
                    <i class="fab fa-cuttlefish"></i> <span style="color: black !important;">C</span>
                  </a>
                </div>
                <div class="col-sm">
                  <a class="product" onclick="python();" style="color: blue;">
                    <i class="fab fa-python"></i> <span style="color: blue !important;">Python</span>
                  </a>
                </div>
              </div>

            </div>
          </div>
            
            </div>
        </div>
      </div>
        <div id="editor"></div>
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ace.js" integrity="sha512-GZ1RIgZaSc8rnco/8CXfRdCpDxRCphenIiZ2ztLy3XQfCbQUSCuk8IudvNHxkRA3oUg6q0qejgN/qqyG1duv5Q==" crossorigin="anonymous"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script>
        var editor = ace.edit("editor");
        editor.setTheme("ace/theme/dracula");
        editor.session.setMode("ace/mode/html");

        function html() {
          editor.session.setMode("ace/mode/html");
        }
        function css() {
          editor.session.setMode("ace/mode/css");
        }
        function js() {
          editor.session.setMode("ace/mode/javascript");
        }
        function php() {
          editor.session.setMode("ace/mode/php");
        }
        function cpp() {
          editor.session.setMode("ace/mode/c_cpp");
        }
        function cPrograming() {
          editor.session.setMode("ace/mode/c");
        }
        function python() {
          editor.session.setMode("ace/mode/python");
        }

        let Navigation = [];
        <?php foreach($files1 as $ri) : ?>
          <?php
              if($ri != "..") {
                if(is_dir($ri)) {
                  echo "Navigation.push('folder');";
                  echo "Navigation.push('" . $ri . "');";
                } else {
                  echo "Navigation.push('file');";
                  echo "Navigation.push('" . $ri . "');";
                }
              }
          ?>
        <?php endforeach ?>

        for(let i = 2; i < Navigation.length; i+= 2) {
          let isFoleder = false;

          if(Navigation[i] == "folder") {
            isFolder = true;
          } else {
            isFolder = false;
          }

          if(isFolder == true) {
            document.querySelector(".contentNULL").innerHTML += `<a href="?searchFile=CodeEditor.php&folder=${Navigation[i + 1]}/" style="margin-left: 5px; margin-top: 5px;"><i class="fa fa-folder"></i> ${Navigation[i + 1]}</a> <br />`;
          } else {
            document.querySelector(".contentNULL").innerHTML += `<a href="?file=${Navigation[i + 1]}&dir=." style="margin-left: 5px; margin-top: 5px;"><i class="fa fa-code"></i> ${Navigation[i + 1]}</a> <br />`;
          }
        }
        editor.autoIndent = false;
        editor.autoComplete = false;
        <?php if(isset($_GET['file'])) : ?>
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              editor.setValue(this.responseText);
            }
          };
          xhttp.open("GET", "<?= $_GET['file']; ?>", true);
          xhttp.send();
        <?php endif; ?>
        editor.session.on('change', function(delta) {
            document.querySelector(".TempArea").value = editor.getValue();
        });
    </script>
  </body>
</html>
