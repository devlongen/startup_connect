<!-- Sidebar -->
<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="../assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse"aria-expanded="true">
								<span>
									<?php echo $_SESSION['usuario']['nome'] ?>
									<span class="user-level"><?php echo $_SESSION['usuario']['status']?></span>
								</span>
							</a>
							<div class="clearfix"></div>
						</div>
					</div>
					
					<ul class="nav nav-primary">
						<li class="nav-item active">
							<a  class="collapsed" aria-expanded="false">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
							
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->