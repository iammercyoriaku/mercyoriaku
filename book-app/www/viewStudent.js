<html>

  <head>

    <title>View Student</title>

  </head>
  <body>

    <form id="register">
      <h1>View Student</h1>

 

    </form>
    <script type="text/javascript">

      function result() {
          var name  = document.getElementById("name").value;
          var email = document.getElementById("email").value;
          var dept  = document.getElementById("dept").value;

          document.write("<h2>Student Data</h2>");
          document.write(name + "</br>");
          document.write(email + "</br>");
          document.write(dept + "</br>");
      }

    </script>

  </body>
  </html> 