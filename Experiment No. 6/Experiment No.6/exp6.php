<!DOCTYPE html>
<html>
<head>
  <title>jQuery autocomplete</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <style type="text/css">
    #search_container {
      text-align: center;
      font-family: Arial, Helvetica, sans-serif;
      margin: 15% 10% 15% 10%;
    
    }

    h1{
      font-size: xxx-large;;
    }

    #search_container input{
        border :none;
        padding:1%;
      width:50%;
      outline:none;
      border:2px solid #bbb;
      border-radius:10%;
      display:inline-block;
      -webkit-box-sizing:border-box;
        -moz-box-sizing:border-box;
              box-sizing:border-box;
        -webkit-transition:0.2s ease all;
        -moz-transition:0.2s ease all;
          -ms-transition:0.2s ease all;
          -o-transition:0.2s ease all;
              transition:0.2s ease all;

    }

  
    #results {text-align: left; border: solid 1px #777; display: none; margin: 0 auto; width: 180px;}
  </style>
</head>
<body>

<div id="search_container">
   <h1>Search for country</h1>
   <input type="text" name="country" id="country" autocomplete="off" id = "search-input">
   <div id="results" style=" font-size: x-large;"></div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $("#country").keyup(function(){
      var query = $(this).val();
      if (query != "") {
        $.ajax({
                url: 'query.php',
                method: 'POST',
                data: {query:query},
                success: function(data)
                {
                  $('#results').html(data);
                  $('#results').css('display', 'block');

                    $("#country").focusout(function(){
                        $('#results').css('display', 'none');
                    });
                    $("#country").focusin(function(){
                        $('#results').css('display', 'block');
                    });

                }
        });
      } else {
             $('#results').css('display', 'none');
      }
    });
  });
</script>

</body>
</html>