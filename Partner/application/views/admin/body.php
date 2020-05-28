<div class="main-container ace-save-state" id="main-container">
    <script type="text/javascript">
        try { ace.settings.loadState('main-container') } catch (e) { }
    </script>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
  //       $(document).ready(function () {
  //           $(document).on('click', '.has-sub .bbb', function () {
  //               $(this).closest('.has-sub').find('.ccc').toggle();
  //           });
  //       });
  //       $('.collapse').collapse();
  //       $('#myCollapsible').collapse({
		//   toggle: false
		// });
    </script>

    <style type="text/css">
        .main-nav a {
            text - decoration: none;
            display: block;
            letter-spacing: .01em;
            border-bottom: solid 1px gray;
            padding: 10px 0px 10px 10px;
            color: #FFFFFF;
        }

        nav a:hover {
            background - color: #505F74;
        }

        .ccc {
            display: none;
        }

        .mot {
            width: 100%;
            background - color: #2a3a51;
            /*padding: 0px;
            margin: 0px;*/
        }

        /*
	.main-nav{
            background - color: #2a3a51;
	}
	.main-nav li{
            list - style: none;
	}

	.main-nav-ul ul{
            display: none;
	}

	.main-nav-ul ul li.tap ul{
            display: none;
		display: block;
	}
*/
        /*
	.main-nav li.tap .sub-arrow:after{
            content: '\2039';
	}
*/
        /*.main-nav-ul li:hover ul{
            display: block;
	}*/
        /*
	.main-nav .sub-arrow:after{
            content: '\203A';
		color: #FFFFFF;
		float: right;
		margin-right: 20px;
		transform: rotate(90deg);
		-webkit-transform: rotate(90deg);
		-moz-transform: rotate(90deg);
	}


	.main-nav li:hover .sub-arrow:after{
            content: '\2039';
	}

	.main-nav-ul ul a:berfore{
            content: '\203A';
	}
*/
    </style>

    <div id="sidebar" class=" sidebar responsive ace-save-state">
        <script type="text/javascript">
            try { ace.settings.loadState('sidebar') } catch (e) { }
        </script>

        <nav class="main-nav">
           
				
			<div class="accordion" id="accordionExample">
				<!-- <div class="card"> -->
				    <div id="headingOne">
				        <button class="btn btn-block text-left mot" type="button" aria-expanded="true" aria-controls="collapseOne">
				          Tổng quan
				        </button>
				    </div>

				  <!-- <div class="card"> -->
				    <div id="headingOne">
				        <button class="btn btn-block text-left mot" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
				          Đơn hàng
				        </button>
				    </div>

				    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
				      <!-- <div class="card-body"> -->
				        <button type="button" class="btn btn-primary">Danh sách đơn hàng</button>
						<button type="button" class="btn btn-secondary">Thống kê đơn hàng</button>
				      <!-- </div> -->
				    </div>
				  </div>
				  <div class="card">
				    <div id="headingTwo">
				        <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
				          Chi nhánh
				        </button>
				    </div>
				    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
				      <!-- <div class="card-body"> -->
				       	<button type="button" class="btn btn-primary">Danh sách cửa hàng</button>
						<button type="button" class="btn btn-secondary">Danh sách món ăn</button>
				    <!-- </div> -->
				  </div>
				  <div class="card">
				    <div id="headingThree">
				        <button class="btn btn-block text-left " type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
				          Cửa hàng
				        </button>
				    </div>
				    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
				      <!-- <div class="card-body"> -->
				       	<button type="button" class="btn btn-primary">Primary</button>
						<button type="button" class="btn btn-secondary">Secondary</button>
				      <!-- </div> -->
				    </div>
				  <!-- </div> -->
				</div>
			</nav>

		 <!-- <ul class="main-nav-ul">
                <li class="has-sub">
                    <a href="#">Tổng quan</a>
                </li>
                <li class="has-sub">
                    <a class="bbb" href="#">Đơn hàng</a>
                    <ul>
                        <li class="ccc"><a href="<?php echo base_url();?>/Donhang/Danhsach_donhang">Danh sách đơn hàng</a></li>
                        <li class="ccc"><a href="<?php echo base_url();?>/Donhang/Thongke_donhang"">Thống kê đơn hàng</a></li>
						</ul>
					</li>
                    <li class="has-sub"><a href="#">Cửa Hàng</a>
                        <a href="#">Cửa Hàng<span class="sub-arrow"></span></a>
                        <ul>
                            <li><a href="<?php echo base_url();?>/Donhang/Danhsach_donhang"">Cửa Hàng</a></li>
                                <li><a href="#">Cửa Hàng</a></li>
                                <li><a href="#">Cửa Hàng</a></li>
                                <li><a href="#">Cửa Hàng</a></li>
						</ul>
					</li>
                        <li><a href="#">Cửa Hàng</a></li>
                        <li><a href="#">Cửa Hàng</a></li>
                        <li><a href="#">Cửa Hàng</a></li>
				</ul> -->
        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
            <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>
    </div>