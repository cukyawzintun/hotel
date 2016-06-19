<head>
<style>
/*		body {
			width: 100%;
		}*/
/* Toggle Styles */
@font-face{
    font-family:"TheAntiquaSun";
    src:url("../font/TheAntiquaSun.otf");
}

#wrapper-sidebar {
    padding-left: 0;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

#sidebar-wrapper {
    z-index: 1000;
    position: absolute;
    left: 250px;
    top: 150px;
    min-height: 400px;
    margin-left: -220px;
    overflow-y: auto;
    background: #424F5A;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

h1 {
	font-size: 30px;
	margin-bottom: 20px;
}
/* Sidebar Styles */

.sidebar-nav {
    position: absolute;
    top: 0;
    width: 200px;
    padding: 0;
    list-style: none;
}

.sidebar-nav li {
    text-indent: 20px;
    line-height: 40px;
}

.sidebar-nav li a {
    display: block;
    text-decoration: none;
    color: #fff;
}

.sidebar-list:hover {
    text-decoration: none;
    color: #fff;
    background: rgba(255,255,255,0.2);
}

.sidebar-nav li a:active,
.sidebar-nav li a:focus {
    text-decoration: none;
}
.sidebar-brand {
    background-color: #3E2723;
    width: 250px;
}
.sidebar-nav > .sidebar-brand {
    height: 65px;
    font-size: 18px;
    line-height: 60px;
}

.sidebar-nav > .sidebar-brand a {
    color: #fff;
    font-family: "TheAntiquaSun";
    font-weight: 400;
    font-size: 20px;
}

@media(min-width:768px) {
    #wrapper-sidebar {
        padding-left: 250px;
    }
    #sidebar-wrapper {
        width: 250px;
    }

    #wrapper-sidebar#sidebar-wrapper {
        width: 0;
    }
}

.clear {
	clear: both;
}
</style>
</head>
<body>
<div id="wrapper-sidebar">
		<!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Admin Categories
                    </a>
                </li>
                <li class='sidebar-list'>
                    <a href="show_hotel.php">Hotel List</a>
                </li>
                <li class='sidebar-list'>
                    <a href="room_list.php">Room List</a>
                </li>
                <li class='sidebar-list'>
                    <a href="roomtype_list.php">Room Type</a>
                </li>
                <li class='sidebar-list'>
                    <a href="show_location.php">Hotel Location</a>
                </li>
                <li class='sidebar-list'>
                    <a href="show_user.php">User List</a>
                </li>
                <li class='sidebar-list'>
                    <a href="booking_list.php">Booking List</a>
                </li>
                <li class='sidebar-list'>
                    <a href="feedback.php">User Feedback</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->        
</div>
<div class="clear"></div>
</body>