<!DOCTYPE html>
<!-- Created By CodingNepal - www.codingnepalweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>AdminDashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  </head>
  <body>
  <style>
        *{
        padding: 0;
        margin: 0;
        text-decoration: none;
        list-style: none;
        box-sizing: border-box;
        }
        body{
        font-family: montserrat;
        }
        nav{
        background: #0082e6;
        height: 80px;
        width: 100%;
        }
        label.logo{
        color: white;
        font-size: 35px;
        line-height: 80px;
        padding: 0 100px;
        font-weight: bold;
        }
        nav ul{
        float: right;
        margin-right: 20px;
        }
        nav ul li{
        display: inline-block;
        line-height: 80px;
        margin: 0 5px;
        }
        nav ul li a{
        color: white;
        font-size: 17px;
        padding: 7px 13px;
        border-radius: 3px;
        text-transform: uppercase;
        }
        a.active,a:hover{
        background: #1b9bff;
        transition: .5s;
        }
        .checkbtn{
        font-size: 30px;
        color: white;
        float: right;
        line-height: 80px;
        margin-right: 40px;
        cursor: pointer;
        display: none;
        }
        #check{
        display: none;
        }
        @media (max-width: 952px){
        label.logo{
            font-size: 30px;
            padding-left: 50px;
        }
        nav ul li a{
            font-size: 16px;
        }
        }
        @media (max-width: 858px){
        .checkbtn{
            display: block;
        }
        ul{
            position: fixed;
            width: 100%;
            height: 100vh;
            background: #2c3e50;
            top: 80px;
            left: -100%;
            text-align: center;
            transition: all .5s;
        }
        nav ul li{
            display: block;
            margin: 50px 0;
            line-height: 30px;
        }
        nav ul li a{
            font-size: 20px;
        }
        a:hover,a.active{
            background: none;
            color: #0082e6;
        }
        #check:checked ~ ul{
            left: 0;
        }
        }
        section{
        background: url(bg1.jpg) no-repeat;
        background-size: cover;
        height: calc(100vh - 80px);
        }
	</style>
    <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo">Admin</label>
      <ul>
        @guest
        <li><a class="active" href="#">Home</a></li>
        <li><a href="login">Login</a></li>
        <li><a href="register">Register</a></li>
        @endguest
        @auth
        <li><a href="admin">Home</a></li>
        <li><a href="{{ route('add.resort') }}">Add Resort</a></li>
        <li>
        <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
        </li>
        <li style="font-size: 23px;color: black;">
           <div>  {{ Auth::user()->name }} </div>
        </li>
        @endauth
      </ul>
    </nav>
    <section></section>
  </body>
</html>