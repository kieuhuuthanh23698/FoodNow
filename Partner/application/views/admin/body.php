<div class="main-container ace-save-state" id="main-container">
		<script type="text/javascript">
			try{ace.settings.loadState('main-container')}catch(e){}
		</script>

		<div id="sidebar" class="sidebar responsive ace-save-state">
			<script type="text/javascript">
				try{ace.settings.loadState('sidebar')}catch(e){}
			</script>
			<ul class="nav nav-list">
				<li class="active open">
					<a href="#" class="dropdown-toggle">
						<i class="fas fa-bars fa-lg"></i>
						<span class="menu-text"> Menu </span>
						<b class="arrow fa fa-angle-down"></b>
					</a>

					<b class="arrow"></b>

					<ul class="submenu">
						<li class="<?php echo isset($hang)? $hang : '';?>">
							<a href="<?php echo base_url();?>">

								<span class="menu-text"> Hãng</span>
							</a>

							<b class="arrow"></b>
						</li>
						<li class="<?php echo isset($sanpham)? $sanpham : '';?>">
							<a href="<?php echo base_url();?>sanpham">
								<span class="menu-text"> Sản phẩm</span>
							</a>

							<b class="arrow"></b>
						</li>
					</li>
					<li class="<?php echo isset($banner)? $banner : '';?>">
						<a href="<?php echo base_url();?>banner">
							<span class="menu-text"> Banner</span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="<?php echo isset($tintuc)? $active : '';?>">
						<a href="<?php echo base_url();?>">
							<span class="menu-text"> Tin tức</span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="<?php echo isset($dathang)? $dathang : '';?>">
						<a href="<?php echo base_url();?>">
							<span class="menu-text"> Đặt hàng</span>
						</a>

						<b class="arrow"></b>
					</li>
				</ul>
			</li> 

		</ul>

		<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
			<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
		</div>
	</div>