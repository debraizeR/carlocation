<?php 
$this->session->set_userdata("locations", $locations);
$this->session->set_userdata("locationsReturn", $locationsReturn);
$this->session->set_userdata("all_locations", $all_locations);
$this->session->set_userdata("cars", $cars);
$this->session->set_userdata("all_profiles", $all_profiles);

?>

<div class="container border" style="overflow: hidde; min-width: 100vw; max-width:100vw">
    <div class="row">
        <div class="col-2 border" style="min-height: 100vh; max-height:100vh;">
            <div class="row justify-content-center my-5">
                <input type="button" class="lien btn btn-light my-2" value="location" onclick="hide_location()">
                <input type="button" class="lien btn btn-light my-2" value="car" onclick="hide_car()">
                <input type="button" class="lien btn btn-light my-2" value="profile" onclick="hide_profile()">
            </div>
        </div>
        <div class="col-10 border" style="overflow: auto; max-height:100vh;">
            <div id="test" style="width: 100%;">
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<script>

$(document).ready(function(){
        $("body").css("overflow", "hidden");

    });

    function hide_location()
    {
        $("#test").load("adminLocation");
        
    }

    function hide_car()
    {
        $("#test").load("adminCar");
    }

    function hide_profile()
    {
        $("#test").load("adminProfile");
    }
</script>
