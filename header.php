

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cinema Navbar</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <nav class="navbar">
    <div class="container">
      <div class="logo "><a  href="">Cinemas</a>
        <!-- <button></button> -->
        </div>
      <div class="content">
        <ul class="middle ">
          <li>
            <a href="index.php">Home</a>
          </li>
          <li>
            <a class="dropdown" onclick="myFunction()" href="#">Movie</a>
            <div class="dropdown-content">
                <a href="">Comming Soon</a>
                <a href="">Now Showing</a>
            </div>
          </li>
          <li>
            <a href="">Offers</a>
          </li>
          <li>
            <a href="">About</a>
          </li>
          <li>
            <a href="">Schedules</a>
          </li>
        </ul>
        <ul class="last">
          <li>
            <a href="registration.php">Register</a>
          </li>
          <li>
            <a href="login.php">Login</a>
          </li>
        </ul>
        <form class="search_box" role="search">
            <input class="search_text" type="search" placeholder="Search" aria-label="Search">
            <button class="btn_search"type="submit">Search</button>
          </form>
      </div>

    </div>
  </nav>
  <script>
    function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
  </script>

</body>
</html>