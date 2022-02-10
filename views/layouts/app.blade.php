<style>
    body {
        background-image: linear-gradient(to bottom, #4d73e8 , #12296e);
        background-attachment: fixed;
        margin: 0px;
        font-family: tahoma;
    }
    .navbar {
        border-bottom: 1px solid black;
        height: 3%;
        background-color: black;
        font-size: 16px;
        overflow: auto;
        text-align: center;
        color: white;
        font-weight: bold;
    }
    .navbar a:hover {
        background-color: white;
        overflow: auto;
        color: black;
    }
    .navbar  a  {
        text-decoration: none;
        color: white;
        padding: 27px;
        overflow: auto;
    }
    .banner {
        height: 15%;
        border-bottom: 1px solid black;
        background-color: white;
        background-color: darkgrey;
        background-image: url("https://img.pokemondb.net/sprites/sun-moon/normal/scizor-f.png");
        background-repeat: no-repeat;
        background-position: 10%;
    }
    .container {
        margin-left: 2%;
        margin-right: 2%;
        border: 1px solid black;
        height: 100%;
        background-color: white;
    }
    .contentarea {
        text-align: center;
        background-color: white;
    }
    .disclaimer {
        overflow: auto;
        bottom: 0px;
        position: absolute;
        font-weight: bold;
        background-color: white;
        width: 80%;
        overflow: auto;
    }

    .leftmenu {
        float: left;
    }
</style>

<div class='navbar'>
<a href='/'>Home</a>  
    <a href='/login'>Login</a> 
    <a href='/register'>Register</a> 
</div>
<div class='container'>
<div class='banner'>
   <center style='font-size: 30px;'> Pokemon Grand Universe</center>
</div>
<div class='contentarea'> @yield('content') </div>
</div>