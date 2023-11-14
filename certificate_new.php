<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>companies and categories</title>
    <style>
body {
background-color: #D8BFD8;
}
        #main_div {
            padding: 10px;
            display: grid;
            grid-template-columns: auto auto;
        }

        #main_div div {
            margin: 10px;
            border: 1px solid black;
            padding: 10px;
        }
        .detailsbtn{
            padding: 3px;
            background-color: grey;
            color: white;
            border-radius: 30%;
        } 

    </style>
</head>

<body>
    <div id="main_div">
        <div>
        <h2><B><U>CATEGORIES</U></B></h2>
            <?php
            include 'db_connection.php';

            $fetch_query = "SELECT * FROM category";
            $fetch_result = mysqli_query($conn, $fetch_query);

            while ($row = mysqli_fetch_array($fetch_result)) {; ?>
                <p onclick="getCompanies(<?php echo $row['id']; ?>)"><?php echo $row['name']; ?></p>

            <?php
            };
            ?>
        </div>
        <div id="companies">
        <h2><B><U>COMPANIES</U></B></h2>
       
        </div>


    </div>
    <script>
        function getCompanies(category) {
            var xhttp = new XMLHttpRequest();
            xhttp.open("GET", "companies.php?category_id="+category, true);
            xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {

                    // Response
                    var response = JSON.parse(this.responseText);
                     var companies=` <h2><B><U>COMPANIES</U></B></h2>`;
                    response.forEach(eachResponse=>{
                        companies+=`<p > <span id="detailsbtn${eachResponse.id}" class="detailsbtn" onclick="getDetails(${eachResponse.id})">+</span> ${eachResponse.name}</p>
                                    <p id="description${eachResponse.id}" style="display:none">
                                    ${eachResponse.email} <br>
                                    ${eachResponse.location} <br>
                                    ${eachResponse.description} <br>
                                    </p>
                                     `
                    })
                   document.getElementById("companies").innerHTML=companies;
                }
            };
            xhttp.send();
        }
        function getDetails(id){
            details_btn=document.getElementById("detailsbtn"+id)
            elem=document.getElementById("description"+id)
           console.log(elem.style.display)
            if(elem.style.display=="block"){
                elem.style.display="none"
                details_btn.innerHTML="+"
            }else{
                elem.style.display="block" 
                details_btn.innerHTML="-"
            }
        }
    </script>
</body>

</html>