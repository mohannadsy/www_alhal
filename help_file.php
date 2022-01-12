<?php
include('include/nav.php');
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            text-align: right;
            background-color: #b0bec5;
        }

    </style>


</head>
<body>

<div class="row " style="padding-top: 10px;">
    <h2> المحتويات </h2>
</div>

<div class="container-fluid">
    <div class="row flex-xl-nowrap">
        <div class="col-12 col-md-3 col-xl-2 bd-sidebar">
            <nav class="collapse bd-links  show" id="bd-docs-nav" >
                <div class="bd-toc-item active ">
                    <a class="bd-toc-link" href=""> ملف </a>
                        
                            
                </div>
                <div class="bd-toc-item ">
                    <a class="bd-toc-link" href=""> حسابات </a>
                        
                </div>
                <div class="bd-toc-item ">
                    <a class="bd-toc-link" href=""> مواد </a>
                       
                </div>
                <div class="bd-toc-item ">
                    <a class="bd-toc-link" href=""> سندات </a>
                        
                </div>
                <div class="bd-toc-item ">
                    <a class="bd-toc-link" href=""> الأصناف </a>
                </div>
                
                <div class="bd-toc-item ">
                    <a class="bd-toc-link" href=""> النسخ الاحتياطي   </a>
                </div>
            </nav>
        </div>
        <main class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content" role="main">
            <textarea rows="20"  type="text" id="" class="form-control" name="notes"> 
            </textarea>


        </main>
    
        

    </div>

</div>





    

    


                    


</body>
</html>



<?php
include('include/footer.php');
?>