<?php 
$this->session->set_userdata("locations", $locations);
$this->session->set_userdata("locationsReturn", $locationsReturn);
$this->session->set_userdata("all_locations", $all_locations);
$this->session->set_userdata("cars", $cars);
$this->session->set_userdata("all_profiles", $all_profiles);

?>

<div class="container border">
    <div class="row">
        <div class="col-2 border">
            <div class="row justify-content-center my-5">
                <input type="button" class="lien btn btn-light my-3" value="location" onclick="hide_location()">
                <input type="button" class="lien btn btn-light my-3" value="car" onclick="hide_car()">
                <input type="button" class="lien btn btn-light my-3" value="profile" onclick="hide_profile()">
                <?php if(isset($this->session->page)){ echo "oui"; }else{ echo "non"; } ?>
            </div>
        </div>
        <div class="col-10 border" style="min-height: 100vh; max-height:100vh; ">
            <div id="test" style="width: 100%;">
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<script>

    

    function hide_location()
    {
        $("#test").load("adminLocation");
        $.session.set("page", "Location");

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
