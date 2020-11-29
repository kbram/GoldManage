@extends('layouts.app')

@section('content')
<div class="row" style="background-color:#373947;">
    <div class="col-lg-2 col-sm-2" style="color:#fff;">
        
        <div class="container" style="background-color:#373947; font-size: 30px; overflow-wrap: break-word;word-wrap: break-word;hyphens: auto;">
        @if(!Auth::guest())
                <br>
                <ul class="" style="list-style: none;padding-left:0px;spacing:0px;line-height: 1.5;margin: 0;">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre style="position:relative;color:#fff;" href="/employees" style="color:#fff;" onMouseOver="this.style.color='#659EC7'" onMouseOut="this.style.color='#fff'" >
                        <strong>Employees</strong> <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="/employees/create"><strong>Add Employee</strong></a></li>
                        <li><a href="/employees"><strong>Employee Details</strong></a></li>
                    </ul>
                </li>
                <br>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre style="position:relative;color:#fff;" href="/suppliers" style="color:#fff;" onMouseOver="this.style.color='#659EC7'" onMouseOut="this.style.color='#fff'">
                        <strong>Suppliers</strong><span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="/suppliers/create"><strong>Add Supplier</strong></a></li>
                        <li><a href="/suppliers"><strong>Suppliers Details</strong></a></li>
                    </ul>
                </li>
                <br>
                 <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre style="position:relative;color:#fff;" href="/products" style="color:#fff;" onMouseOver="this.style.color='#659EC7'" onMouseOut="this.style.color='#fff'" >
                        <strong>Products</strong> <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="/products/create"><strong>Add Products</strong></a></li>
                        <li><a href="/products"><strong>Products Details</strong></a></li>
                    </ul>
                </li>
                <br>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre style="position:relative;color:#fff;" href="/dashboard" style="color:#fff;" onMouseOver="this.style.color='#659EC7'" onMouseOut="this.style.color='#fff'" >
                        <strong>Task</strong> <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="/tasks/create"><strong>Add Task</strong></a></li>
                        <li><a href="/tasks"><strong>tasks Details</strong></a></li>
                    </ul>
                </li>
                <br>
                <li class="dropdown">
                    <a href="/deliveries" style="color:#fff;" onMouseOver="this.style.color='#659EC7'" onMouseOut="this.style.color='#fff'" >
                        <strong>Delivery</strong>
                    </a>
                   
                </li>
                <br>
                <li class="dropdown">
                    <a href="/accounts"  style="color:#fff;" onMouseOver="this.style.color='#659EC7'" onMouseOut="this.style.color='#fff'" >
                        <strong>Salary Paysheet</strong>
                    </a>
                    
                </li>
                </ul>
        @endif
        </div>
    </div>
    <div class="col-lg-10 col-sm-10">
        <div id="carousel" class="carousel slide" data-ride="carousel" style="margin-top:1px;">
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="/storage/admin/Banner6.jpg" alt="Construction">
                    <div class="overlay">
                        <div class="carousel-caption">
                            <h3><?php echo $title; ?></h3>
                            <h1>Personal Manage Website</h1>
                            <!--<h1 class="second_heading">Innovative</h1>
                            <p></p>
                            <a href="/login" class="btn know_btn">Login</a>-->
                        </div>					
                    </div>
                </div>
                <div class="item">
                    <img src="/storage/admin/Banner3.jpg" alt="Construction">
                    <div class="overlay">
                        <div class="carousel-caption">
                            <h3><?php echo $title; ?></h3>
                            <h1>Personal Manage Website</h1>
                        </div>					
                    </div>
                </div>
                <div class="item">
                    <img src="/storage/admin/Banner2.jpg" alt="Construction">
                    <div class="overlay">
                        <div class="carousel-caption">
                            <h3><?php echo $title; ?></h3>
                            <h1>Personal Manage Website</h1>
                        </div>					
                    </div>
                </div>
                <div class="item">
                    <img src="/storage/admin/Banner4.jpg" alt="Construction">
                    <div class="overlay">
                        <div class="carousel-caption">
                            <h3><?php echo $title; ?></h3>
                            <h1>Personal Manage Website</h1>
                        </div>					
                    </div>
                </div>
                <div class="item">
                    <img src="/storage/admin/Banner5.jpg" alt="Construction">
                    <div class="overlay">
                        <div class="carousel-caption">
                            <h3><?php echo $title; ?></h3>
                            <h1>Personal Manage Website</h1>
                        </div>					
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

