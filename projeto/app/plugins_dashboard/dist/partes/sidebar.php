<!-- Sidebar -->
<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="../assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?php echo $_SESSION['usuario']['nome'] ?>
									<span class="user-level"><?php echo $_SESSION['usuario']['status']?></span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="#profile">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="#edit">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Settings</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					
					<ul class="nav nav-primary">
						<li class="nav-item active">
							<a  href="#dashboard" class="collapsed" aria-expanded="false">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
								<span class="caret"></span>
							</a>
							
						</li>
						
						
						<li class="nav-item">
							<a  href="usuarios.php">
								<i class="fas fa-th-list"></i>
								<p>Usuarios</p>
								<span class="caret"></span>
							</a>
							
						</li>
						<li class="nav-item">
							<a href="empresas.php">
								<i class="fas fa-pen-square"></i>
								<p>Empresas</p>
								<span class="caret"></span>
							</a>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->