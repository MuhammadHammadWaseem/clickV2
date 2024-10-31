@extends('Website.Layouts.master')
<style>

    html,body{
        background-color: #F0F0F0;
    }
    .packages-single-card .box-subtitle {
color: #A9967D;
font-size: 16px;
font-family: revert-layer;
font-weight: 400;
background: rgba(169, 150, 125, 0.3);
border-radius: 15px;
padding: 10px;
width: max-content;
}

section.events-lists-sec-01 {
    margin: 0 !important;
}

.select-packages-boxes {
    padding: 0 44px !important;
}

.events-lists-sec-01 .text.text-center p {
    width: 100%;
}
.box-styling {
    height: fit-content !important;
    margin: 20px 20px !important;
}


.packages-single-card .box-unit-price {
font-size: 80px;
font-family: inherit;
font-weight: bold;
color: #A9967D;
margin: 10px 0;
}

.packages-single-card ul li {
list-style: unset;
color: #8B8B8B;
font-size: 16px;
font-weight: 500;
font-family: revert-layer;
}

.packages-single-card p {
color: #7A7A7A;
font-size: 16px;
font-weight: bold;
margin-bottom: 20px;
}

.site-navbar {
    border-bottom:none !important;
}

.footer {
    border-top: none !important;
}

.text-center {
    border-top: none !important;
}

.packages-single-card a.btn.t-btn {
width: 100%;
}


.events-lists-sec-01 {
    padding: 0px 0 50px !important;
}


.packages-single-card {
display: flex;
flex-direction: column;
row-gap: 10px;
}

.select-packages-boxes {
width: -webkit-fill-available;
padding: 0 43px;
display: flex;
flex-direction: row;
flex-wrap: wrap;
justify-content: center;
align-items: flex-start;
margin-top: 40px;
}
</style>
@section('title')
    About Us | Event Organization Tool | Click Invitation
@endsection
@section('description')
    Click Invitation is the all-in-one tool that simplifies every aspect of planning and managing your events with our
    intuitive platform. Learn more about us.
@endsection

@section('tags')
    <link rel="canonical" href="https://clickinvitation.com/about">
@endsection


@section('content')
<section class="events-lists-sec-01">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text text-center">
                    <h2>Select A Pakage</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing<br> and typesetting industry.</p>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid">
     <div class="row">
            <div class="select-packages-boxes">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="packages-single-card box-styling">
                        <div class="box-subtitle">Basic Package</div>
                        <div class="box-unit-price">$23</div>
                        <ul>
                            <li>General Info</li>
                            <li>Invitation</li>
                            <li>Guest List</li>
                            <li>Messaging</li>
                            <li>Gift Suggestions</li>
                        </ul>
                        <p>Purpose: For simple events where basic event management and gift suggestions are sufficient.</p>
                        <a href="#" class="btn t-btn">Buy Now</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="packages-single-card box-styling">
                        <div class="box-subtitle">Standard Package</div>
                        <div class="box-unit-price">$49</div>
                        <ul>
                            <li>Everything in the Basic Package</li>
                            <li>Webpage</li>
                            <li>Meals</li>
                            <li>Photos</li>
                        </ul>
                        <p>Purpose: Ideal for events requiring a webpage, meal options, and photo management.</p>
                        <a href="#" class="btn t-btn">Buy Now</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="packages-single-card box-styling">
                        <div class="box-subtitle">Premium Package</div>
                        <div class="box-unit-price">$69</div>
                        <ul>
                            <li>Everything in the Standard Package</li>
                            <li>Table Seating Arrangements</li>
                        </ul>
                        <p>Purpose: Designed for events needing additional features like seating arrangements.</p>
                        <a href="#" class="btn t-btn">Buy Now</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="packages-single-card box-styling">
                        <div class="box-subtitle">Comprehensive Package</div>
                        <div class="box-unit-price">$99</div>
                        <ul>
                            <li>Everything in the Premium Package</li>
                            <li>Acknowledgments</li>
                        </ul>
                        <p>Full access to all features.</p>
                        <a href="#" class="btn t-btn">Buy Now</a>
                    </div>
                </div>
            </div>
     </div>
    </div>

</section>

@endsection
<script>
     $(document).ready(function(){
        // Check if the current page is the target page
        if (window.location.pathname === '/Events-Lists.html') {
            $('#exampleModalCenter02').modal('show');
        }
    });
</script>
