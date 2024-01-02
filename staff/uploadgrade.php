<?php
// Include your database connection logic here
$conn = mysqli_connect("localhost", "root", "", "fudsiwes");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $regnum = $_POST["regnum"];
      $studname = $_POST["studname"];
      $mark = $_POST["mark"];
      $grade = $_POST["grade"];

    // Replace with your actual SQL query to insert data into the 'grade' table
    $sql = "INSERT INTO grade (regnum, studname, mark, grade) VALUES ('$regnum', '$studname', '$mark', '$grade')";

    if (mysqli_query($conn, $sql)) {
        echo "
              <script>
                  alert('Thank you Sir, The Student SIWES Result was Successfully Submitted.');
                  document.location.href = 'index.html';
              </script>
            ";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
